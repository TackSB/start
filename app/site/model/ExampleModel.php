<?php
/**
 * Created by PhpStorm.
 * User: Tack
 * Date: 22.09.2018
 * Time: 19:44
 */

namespace site\model;

//use \RedBeanPHP\R as R;


class ExampleModel
{
    public function getExample()
    {
        $data = array();
        $data['title'] = 'Example';
        $data['example'] = 'example';
        return $data;
    }
}