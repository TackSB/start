<?php
/**
 * Created by PhpStorm.
 * User: Tack
 * Date: 22.09.2018
 * Time: 19:49
 */

namespace admin\controller;


class ExampleController extends \admin\controller\Controller
{
    public function __construct()
    {
        $this->model = new \admin\model\ExampleModel();
        parent::__construct();
    }

    public function index()
    {
        $data = $this->model->getExample();
        $this->view->render( 'example' , $data );
    }
}