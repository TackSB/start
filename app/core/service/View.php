<?php
/**
 * Created by PhpStorm.
 * User: Tack
 * Date: 23.09.2018
 * Time: 10:32
 */

namespace service;


class View
{
    private $namespace;
    protected $theme;

    public function __construct($namespace)
    {
        $this->namespace = $namespace;
        // получаем имя активной темы
        $configSite = file_get_contents(ROOTDIR . '\app\core\configs\site.json');
        $configSite = json_decode($configSite);
        $this->theme = $configSite->themeActive;
    }

    public function render( $template , $data = array() )
    {
        if ( $this->namespace == 'admin\controller' )
        {
            $path = ROOTDIR . '/app/admin/views/' . $template . '.php';
        }
        else
        {
            $path = ROOTDIR . '/app/site/themes/' . $this->theme . '/templates/' . $template . '.php';
        }

        require $path;
    }
}