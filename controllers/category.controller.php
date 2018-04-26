<?php
class CategoryController extends Controller{
    public function __construct($data=array())
    {
        parent::__construct($data);
        $this->model= new Newss();
    }
    public function list(){
        $params=App::getRoutes()->getParams();
        if(isset($params)){
            $id=$params[0];
            $this->data['category']=$this->model->getCategoryById($id);
        }else {
            $this->data['category_list'] = $this->model->getCategoryList();
        }
    }
}