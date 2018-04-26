<?php

class Router
{
    protected $uri;

    protected $controller;

    protected $action;

    protected $params;

    protected $method_prefix;

    public function __construct($uri)
    {
        $this->uri = urldecode(trim($uri, '/'));//delete "/"
        $route=Config::get('routes');
        $this->controller = 'index';
        $this->action = 'list';
        $this->method_prefix='';
        $uri_array = explode('/', $this->uri);
        if (count($uri_array)){
            //admin or not
            if (array_key_exists (strtolower(current($uri_array)),$route)) {
                $this->method_prefix = $route[strtolower(current($uri_array))];
                array_shift($uri_array);
            }
            // get controller
            if(current($uri_array)){
                $this->controller=strtolower(current($uri_array));
                array_shift($uri_array);
            }
            // get action
            if(current($uri_array)){
                $this->action=strtolower(current($uri_array));
                array_shift($uri_array);
            }
            //get params
            if(!empty($uri_array) && $uri_array[0]!==''){
                $this->params=$uri_array;
            }
        }
    //    var_dump($this->method_prefix);
    //    echo "method_prefix :  $this->method_prefix"."<br>";
    //    echo "controller :  $this->controller"."<br>";
   //     echo "action :  $this->action"."<br>";
    //    echo"<pre>";print_r($this->params);
     //   var_dump("<br>");
     //   var_dump($this->uri);
    }

    public static function redirect($location){
        header("Location: $location");
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }
}
