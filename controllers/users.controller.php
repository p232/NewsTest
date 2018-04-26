<?php

class UsersController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new User();
    }

    public function admin_user_list()
    {
        if (isset($_GET['pages'])) {
            $page = $_GET['pages'] - 1;
        }
        $page = !isset($page) ? 0 : $page;
        $this->data['users'] = $this->model->users($page, 10);

    }

    public function admin_delete()
    {
        if (isset($this->params[0])) {
            $result = $this->model->admin_delete($this->params[0]);
            if ($result) {
                Session::setFlash('Category was deleted.');
            } else {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/admin/users/user_list');
    }

    public function admin_login()
    {
        if ($_POST && isset($_POST['login']) && isset($_POST['password'])) {
            $user = $this->model->getByLogin($_POST['login']);
            $hash = md5(Config::get('salt') . $_POST['password']);
            if ($user && $user['is_active'] && $hash == $user['password']) {
                Session::set('login', $user['login']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/admin/index/list');
        }
    }

    public function admin_logout()
    {
        Session::destroy();
        Router::redirect('/admin/');
    }

    public function login()
    {
        if ($_POST && isset($_POST['login']) && isset($_POST['password'])) {
            $user = $this->model->getByLogin($_POST['login']);
            $hash = md5(Config::get('salt') . $_POST['password']);
            if ($user && $user['is_active'] && $hash == $user['password'] && ($_POST['login']!=='admin')) {
               // var_dump($user);exit;
                Session::set('login', $user['login']);
                Router::redirect('/');
            } else {
                Session::setFlash('Try again');
            }
        }
    }


    public function register()
    {
        if ($_POST && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email'])) {
            $new_user = $this->model->addUser($_POST);
            if ($new_user) {
                Session::set('login', $new_user['login']);
                Session::setFlash('Congratulation');
            }
            Router::redirect('/');
        }
    }

    public function logout()
    {
        Session::destroy();
        Router::redirect('/');
    }
}