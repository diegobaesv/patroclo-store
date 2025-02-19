<?php

$controller=isset($_GET['controller']) ? $_GET['controller'] : 'Home';
$action=isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerName = $controller . 'Controller';
$controllerFile = __DIR__ . '/../app/controllers/' . $controllerName . '.php';

if(file_exists($controllerFile)) {
    require_once $controllerFile;

    $controllerObject = new $controllerName();

    if(method_exists($controllerObject,$action)){
        $controllerObject->{$action}();
    } else {
        echo "El controller $controllerName no tiene el metodo $action.";
    }
} else {
    echo "El controller $controllerName no existe.";
}
