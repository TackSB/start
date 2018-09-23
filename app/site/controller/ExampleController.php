<?php
/**
 * Created by PhpStorm.
 * User: Tack
 * Date: 22.09.2018
 * Time: 19:49
 */

namespace site\controller;


class ExampleController extends \site\controller\Controller
{
    public function __construct()
    {
        $this->model = new \site\model\ExampleModel();
        parent::__construct();
    }

    public function index()
    {
        $data = $this->model->getExample();
        $this->view->render('example' , $data );
    }
}