<?php

namespace Framework\Http;

use FastRoute\RouteCollector;

use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Reqeust $reqeust): Response
    {

        $dispatcher = simpleDispatcher(function (RouteCollector $collector) {
            $collector->get('/', function () {
                $content = '<h1>Hello world!!!</h1>';

                return new Response($content);
            });
            $collector->get('/posts/{id}', function (array $vars) {
                $content = "<h1>Post - {$vars['id']}</h1>";

                return new Response($content);
            });
        });

        $routeInfo = $dispatcher->dispatch(
            $reqeust->getMethod(),
            $reqeust->getPath(),
        );

        [$status, $handler, $vars] = $routeInfo;

        return $handler($vars);
    }
}
