<?php
/**
 * Created by PhpStorm.
 * User: Tack
 * Date: 22.09.2018
 * Time: 17:33
 */

namespace app;


class App
{
    public function run()
    {
        $route = new \service\Route();
        $routes = $route->getRoutes();

        $router = new \service\Router($routes);
        $router->run();
    }
}