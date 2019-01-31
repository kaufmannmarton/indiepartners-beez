<?php

require __DIR__.'/vendor/autoload.php';

session_start();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {
    $router->addRoute('GET', '/', 'App\Controllers\BeeController/index');
    $router->addRoute('POST', '/attack', 'App\Controllers\BeeController/attack');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        header('404 Not Found', true, 404);

        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        header('405 Method Not Allowed', true, 405);

        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        list($class, $method) = explode('/', $handler, 2);

        (new $class)->$method($vars);

        break;
}
