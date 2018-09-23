<?php
/**
 * Created by PhpStorm.
 * User: Tack
 * Date: 22.09.2018
 * Time: 18:25
 */

namespace service;


class Route
{
    private $routes = array();

    public function __construct ()
    {
        // Получаем имя активной темы
        $configSite = file_get_contents(ROOTDIR . '/app/core/configs/site.json');
        $configSite = json_decode($configSite);
        $themeName = $configSite->themeActive;
        // Подключаем routes
        require ( ROOTDIR . '/app/admin/routes.php');
        require ( ROOTDIR . '/app/site/themes/' . $themeName . '/routes.php');
    }

    public function addRoute( $key , $value )
    {
        // Экранирует /
        $fKey = preg_filter( '/\//' , '\/' , $key );
        if ( $fKey != null )
        {
        $key = $fKey;
        }
        $fKey = preg_filter( '/{id}/' , '([0-9]+?)' , $key );
        if ( $fKey != null )
        {
        $key = $fKey;
        }
        $fKey = preg_filter( '/{text}/' , '(\w+?)' , $key );
        if ( $fKey != null )
        {
        $key = $fKey;
        }
        $key = '/^' . $key . '$/';
        // Сохраняем маршрут
        $this->routes[$key] = $value;
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}