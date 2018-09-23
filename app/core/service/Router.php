<?php
/**
 * Created by PhpStorm.
 * User: Tack
 * Date: 22.09.2018
 * Time: 18:25
 */

namespace service;


class Router
{
    private $routes = array();
    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function getUri()
    {
        // Получаем uri
        $uri = trim( $_SERVER['REQUEST_URI'] , '/' );
        return $uri;
    }

    public function run()
    {
        // Получаем uri
        $uri = $this->getUri();
        // Получаем маршруты
        $routes = $this->routes;
        /*
         * Определяем окружения
         */
        // Получаем эелементы Uri
        $uriElements = explode( '/' , $uri );
        /*
         * Выбираем окружения по запросу
         * и задаем нужный путь к controllers
         */
        if ( $uriElements[0] == 'admin' )
        {
            $controllerPath = '\\admin\\controller\\';
        }
        else
        {
            $controllerPath = '\\site\\controller\\';
        }
        // Поиск маршрута
        foreach ( $routes as $pattern => $path )
        {
            if ( preg_match ( $pattern , $uri , $data ) )
            {
                // Получаем имя контроллера и метода
                list ( $controllerName, $actionName ) = explode( '/' , $path );
                $controllerName = ucfirst ($controllerName) . 'Controller';
                // Создаем экземпляр класса и вызываем метод
                $controllerName = $controllerPath . $controllerName;
                $controllerName = new $controllerName();
                $controllerName->$actionName($data);
            }
        }
    }
}