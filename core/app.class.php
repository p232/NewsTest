<?php
require_once (ROOT.DS.'core'.DS.'DB.class.php');

class App
{

    protected static $routes;

    public static $db;

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function run($uri)
    {
        self::$db = new DB(Config::get('db.host'), Config::get('db.user'), Config::get('db.password'),
            Config::get('db.db_name'));
        self::$routes = new Router($uri);
        $tmpPath = self::$routes->getController();
        $tmpPath = str_replace(".php", "", $tmpPath);
        $class_name = ucfirst($tmpPath . 'Controller');
        $method_name = strtolower(self::$routes->getMethodPrefix() . self::$routes->getAction());
//        echo "<br>";
//        echo 'Controller: ' . $class_name . "<br>";
//        echo 'Action: ' . $method_name;
        $layout = self::$routes->getMethodPrefix();
        if ($layout == 'admin_' && Session::get('role') != 'admin') {
            if ($method_name !== 'admin_login') {
                Router::redirect('/admin/users/login');//чтоб не безконечный редирект
            }
        }

        $controller_object = new $class_name();

        if (method_exists($controller_object, $method_name)) {
            $view_path = $controller_object->$method_name();  //запись данных в обьект класса + если метод ничего не возвращает- то пустота
            $view_object = new View($controller_object->getData(), $view_path);
            //иклуд файла и передача в его инфы
            $content = $view_object->render();
            echo $content;
        } else {
            echo 'Sorry.There is no page';exit;
            //throw new Exception('there is no Method : ' . $method_name . ' in controller :' . $class_name);
        }
    }
}