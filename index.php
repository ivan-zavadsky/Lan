<?php
require_once 'vendor/autoload.php';
//var_dump('here');
//$method = $_SERVER['REQUEST_METHOD'];
//$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

//if ($method === 'GET') {
    $c = new \Ivan\Lan\Controller();
    $c->run();
//}
