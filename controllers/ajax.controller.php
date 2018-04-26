<?php
class AjaxController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Comment();
    }

    public function list(){
        if (isset($_POST['id_comment']) && isset($_POST['type'])) {
            $id_comment = $_POST['id_comment'];
            $type = $_POST['type'];
            $this->model->vote($id_comment, $type);
        }
        if( isset($_POST['comment']) && !empty($_POST['comment'])){
            $id_news=$_POST['id_news'];
            $id_parent=isset($_POST['id_parent']) ? $_POST['id_parent'] : 0;
            $this->data['comments']=$this->model->add_comment(Session::get('login'),$id_news,$_POST['comment'],$id_parent);
            return VIEW_PATH.DS.'news'.DS.'list.php';
        }
    }
}