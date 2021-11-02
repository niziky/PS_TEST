<?php

define('PATH_ROOT', __DIR__);

spl_autoload_register(function (string $class_name) {
    include_once PATH_ROOT .DIRECTORY_SEPARATOR.'..'. DIRECTORY_SEPARATOR . $class_name . '.php';
});
// load class Route
$router = new Core\Routing\Route();
include_once PATH_ROOT .DIRECTORY_SEPARATOR.'..'. DIRECTORY_SEPARATOR . '/routes/api.php';

$configFiles = scandir($configFolder = PATH_ROOT .DIRECTORY_SEPARATOR.'..'. DIRECTORY_SEPARATOR . '/config/');
foreach ($configFiles as $file) {
    if(pathinfo($file, PATHINFO_EXTENSION) == 'php')
    {
        require_once  $configFolder.$file;
    }
}

$request_url = !empty($_GET['url']) ? '/' . $_GET['url'] : '/';
$method_url = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

$router->map($request_url, $method_url);
