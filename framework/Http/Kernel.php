<?php

namespace Framework\Http;

use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Reqeust $reqeust): Response
    {

        $dispatcher = simpleDispatcher(function (RouteCollector $collector) {
            $routes = include BASE_PATH.'/routes/web.php';

            foreach ($routes as $route) {
                $collector->addRoute(...$route);
            }

        });

        $routeInfo = $dispatcher->dispatch(
            $reqeust->getMethod(),
            $reqeust->getPath(),
        );

        [$status, [$controller, $method], $vars] = $routeInfo;

        $response = call_user_func_array([new $controller, $method], $vars);

        return $response;
    }
}
