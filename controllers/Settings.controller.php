<?php

class SettingsController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Setting();
    }

    public function admin_bg_site()
    {
        if ($_POST){
            $id=key($_POST);
            $color=$_POST[$id];
            $this->model->save($id,$color);
            Router::redirect('/admin/settings/bg_site/');
        }else{
            $this->data['bg_site'] = $this->model->admin_color();
        }
    }
}
