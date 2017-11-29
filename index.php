<?php 

use Teorihandbok\Core\Router;
use Teorihandbok\Core\Request;

if ($_SERVER['HTTP_HOST'] === 'teorihandbok.eleninikou.chas.academy') {
    define('ROOT_PATH', '/05/');
} else {
    define('ROOT_PATH', '/');
}

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
