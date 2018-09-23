<?php
/**
 * Created by PhpStorm.
 * User: Tack
 * Date: 22.09.2018
 * Time: 22:49
 */

namespace site\controller;


class Controller
{
    protected $model;
    protected $view;

    public function __construct()
    {
        $this->view = new \service\View(__NAMESPACE__);
    }
}