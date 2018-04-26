<?php

define('ROOT',dirname(__FILE__));
define('DS',DIRECTORY_SEPARATOR);
define('VIEW_PATH',ROOT.DS.'views');
define('ALLOW_TYPES',[
    'image/jpeg'=>'jpg',
    'image/gif'=>'gif',
    'image/png'=>'png'
]);

include_once ROOT.DS.'core'.DS.'load.class.php';

session_start();

App::run($_SERVER['REQUEST_URI']);

