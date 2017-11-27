<?php


//  ROUTER: Need to do 3 things
//  1. Match URL with regular expressions
//  2. Extract arguments from the URL
//  3. Choose wich controller to run based on the routes we defined.


namespace Teorihandbok\Core;

use Teorihandbok\Controllers\ErrorController;
use Teorihandbok\Controllers\PostController;
use Teorihandbok\Controllers\DefaultController;

class Router {
                                          // regex = regular expressions. Rules for fetching 
                                          // and matching things.    
    private $routeMap;                    // Key values. (Defined in routes.json)
    private static $regexPatters = [      // Depending on these charachters:
        'number' => '\d+',                // -> get all that is the type of nr
        'string' => '\w'                  // -> get all that is the type of string    
    ];



    public function __construct() {
        $json = file_get_contents(__DIR__ . '/../../config/routes.json'); 
        $this->routeMap = json_decode($json, true);


    }


    public function route(Request $request): string 
    {
        $path = $request->getPath();

        foreach ($this->routeMap as $route => $info) {
            $regexRoute = $this->getRegexRoute($route, $info);
            if (preg_match("@^/$regexRoute$@", $path)) {
                return $this->executeController($route, $path, $info, $request);
            }
        }
        
         $errorController = new ErrorController($request);
         return $errorController->notFound();
    }


    // Accepts the route and the array of info if there is any. 
    private function getRegexRoute(string $route, array $info): string {
        if (isset($info['params'])) {
            foreach ($info['params'] as $name => $type) {
                $route = str_replace(':' . $name, self::$regexPatters[$type], $route);
            }               // remove :    $name -> name on key. . Check the type in routes.json
                                                 
        }

        return $route;
    }

    private function executeController(
        string $route,                  // wich route?
        string $path,                   // wich path?
        array $info,                    // wich parameters?
        Request $request        
    ): string {
        $controllerName = '\Teorihandbok\Controllers\\' . $info['controller'] . 'Controller';
        $controller = new $controllerName($request); // The controller will direct us depending on our request

        // When the router is found and we want to run the controller. We also
        // look at the parameters. Is the login: true? -> get the cookie 'user'.
        // Then you can get things from the cookie with the function get().
        if (isset($info['login']) && $info['login']) {
            if ($request->getCookies()->has('user')) {
                $userId = $request->getCookies()->get('user');
                $controller->setUserId($userId); // In abstract controller. 
            } else {
                $errorController = new UserController($request);
                return $errorController->login();
            }
        }

        $params = $this->extractParams($route, $path);
        return call_user_func_array([$controller, $info['method']], $params); 
                                  // Wich controller? Wich Method? Parameters?
    }


    // To get the parameters in the Router
    private function extractParams(string $route, string $path): array {
        
        $params = [];

        $pathParts  = explode('/', $path);   
        $routeParts = explode('/', $route);

        foreach ($routeParts as $key => $routePart) {
            if (strpos($routePart, ':') === 0) {        // If the position of : in $routePart = 0
                $name = substr($routePart, 1);           
                $params[$name] = $pathParts[$key+1];     
            }
        }

        return $params;

    }
}
