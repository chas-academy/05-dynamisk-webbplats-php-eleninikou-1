<?php


//  ROUTER: behöver göra 3 saker
//  1. Matcha URL med regular expression
//  2. Ta ut argumenten från en URL
//  3. Välja vilken kontroller som ska köras baserat på vilka tillgängliga routes vi har definierat.


namespace Teorihandbok\Core;

use Teorihandbok\Controllers\ErrorController;
use Teorihandbok\Controllers\PostController;
use Teorihandbok\Controllers\DefaultController;


class Router {
                                          // regex = regular expressions. Uppsättning regler för
                                          // att hämta ut och matcha saker.    
    private $routeMap;                    // Uppsättning key values. (Definierat i routes.json)
    private static $regexPatters = [      // Baserat på den här uppsättningen av karaktärer:
        'number' => '\d+',                // -> hämta ut det som är av typen nr
        'string' => '\w'                  // -> hämta ut det som är av typen string    
    ];



    public function __construct() {
        $json = file_get_contents(__DIR__ . '/../../Config/routes.json'); 
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


    // Tar emot route och en array av info om det finns någon. 
    private function getRegexRoute(string $route, array $info): string {
        if (isset($info['params'])) {
            foreach ($info['params'] as $name => $type) {
                $route = str_replace(':' . $name, self::$regexPatters[$type], $route);
            }              // Ta bort :    $name =namn på nyckeln i array. Kolla typen i routes.json
                                                 
        }

        return $route;
    }

    private function executeController(
        string $route,                  // Vilken route?
        string $path,                   // Vilken path?
        array $info,                    // vilka parametrar?
        Request $request        
    ): string {
        $controllerName = '\Teorihandbok\Controllers\\' . $info['controller'] . 'Controller';
        $controller = new $controllerName($request); // Controllern styr vad som ska ske beroende på vår request

        if (isset($info['login']) && $info['login']) {
            if ($request->getCookies()->has('user')) {
                $customerId = $request->getCookies()->get('user');
                $controller->setCustomerId($customerId);
            } else {
                $errorController = new CustomerController($request);
                return $errorController->login();
            }
        }

        $params = $this->extractParams($route, $path);
        return call_user_func_array([$controller, $info['method']], $params); 
    }


    // Vad är parametrar i Routern
    private function extractParams(string $route, string $path): array {
        
        $params = [];

        $pathParts  = explode('/', $path);   
        $routeParts = explode('/', $route);

        foreach ($routeParts as $key => $routePart) {
            if (strpos($routePart, ':') === 0) {        // Om positionen av : i $routePart = 0
                $name = substr($routePart, 1);           
                $params[$name] = $pathParts[$key+1];     
            }
        }

        return $params;

    }
}