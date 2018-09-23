<?php
/**
 * Created by PhpStorm.
 * User: Tack
 * Date: 22.09.2018
 * Time: 17:31
 */

define( 'ROOTDIR' , dirname(__FILE__) );

require ROOTDIR . '/app/vendor/autoload.php';

$app = new \app\App();
$app->run();