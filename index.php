<?php 

use Teorihandbok\Core\router;
use Teorihandbok\Core\request;

function autoloader($classname)
{
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__ . '/src/' . $directory . '.php';
    require_once($filename);
}

spl_autoload_register('autoloader');


$router = new Router();
$response = $router->route(new Request());

echo $response; 

?>
