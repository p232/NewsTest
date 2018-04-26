<?php

class IndexController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Newss();
    }

    public function search()
    {
        $search = $_POST['search'];
        $search = addslashes($search);
        $search = htmlspecialchars($search);
        $search = stripslashes($search);
        $row = $this->model->ajax($search);
        for ($i = 0; $i < count($row); $i++) {
            echo "<li><a href=/news/tag/{$row[$i]['id_tag']}>" . $row[$i]['tag_name'] . "</a></li>";
        }
        exit;
    }

    public function list()
    {
        $this->data = $this->model->getListIndex();
        $this->model = new Comment;
        $this->data['commentator']=$this->model->top_commentators(5);
        $this->data['themes']=$this->model->getThemes(3);
    }
   

    public function admin_list()
    {
        if (isset($_GET['pages'])) {
            $page = $_GET['pages'] - 1;
        }
        $page = !isset($page) ? 0 : $page;
        $this->data = $this->model->getNewsListByPage($page, 10);
    }
}