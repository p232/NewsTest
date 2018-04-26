<?php

class CommentsController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Comment();
    }

    public function show()
    {
        $params = App::getRoutes()->getParams();
        $page = 0;
        if (isset($_GET['pages'])) {
            $page = $_GET['pages'] - 1;
        }
        if (isset($params)) {
            $id = $params[0];
            $this->data = $this->model->getCommentsByUser($id, $page);
        }
    }

    public function admin_delete_comment()
    {
        $id = $this->params[0];
        $this->model->admin_delete_comment($id);
        Router::redirect('/admin/comments/comments_list');
    }

    public function admin_edit_comment()
    {
        if (isset($_POST['id_comment'])&& !empty($_POST['id_comment'])) {
            $this->model->change_comment($_POST['id_comment'],$_POST['comment'],$_POST['like'],$_POST['dislike'],$_POST['is_active']);
            Router::redirect('/admin/comments/comments_list');
        } else {
            $id = $this->params[0];
            $this->data = $this->model->admin_edit_comment($id);
        }

    }

    public function admin_comments_list()
    {
        $page = 0;
        if (isset($_GET['pages'])) {
            $page = $_GET['pages'] - 1;
        }
        $this->data['comments'] = $this->model->admin_get_comments($page);
    }

}