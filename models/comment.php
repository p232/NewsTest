<?php

class Comment extends Model
{

    public function getCommentById($id_comment)
    {
        $sql = "SELECT u.login, c.* FROM comments c
        left join users u on u.id=c.id_user
        where id_comment='{$id_comment}'";
        return $this->db->query($sql);
    }

    public function get_comments($id_news)
    {
        $sql = "SELECT u.login, c.* FROM comments c
        left join users u on u.id=c.id_user
        where id_news='{$id_news}' and c.is_active=1 order by id_parent,date_time desc";
        $result = $this->db->query($sql);
        foreach ($result as $key => $value) {
            if ($value['id_parent'] == 0) {
                $results[$value['id_comment']] = $value;
            } else {
                $results[$value['id_parent']]['childs'][] = $value;
            }
        }
        $results['count'] = count($result);
        return $results;
    }
    
    public function cnt_comments($limit=10){
            $sql = "select count(*) as COUNT from comments";
            if (Session::get('login') != 'admin') {
                $sql .= "where is_published=1";
            }
            $count_news = $this->db->query($sql);
            $total_rows = ($count_news[0]['COUNT']);
            $num_pages = ceil($total_rows / $limit);
            return $num_pages;
    }
    
    public function admin_get_comments($page = 0, $limit = 10)
    {
        $start = $page * $limit;
        $sql="select c.id_comment,c.id_parent,u.login,n.title_news,cat.category_name, c.`comment`,c.date_time,c.cnt_like,c.cnt_dislike,c.is_active from comments c
            left join users u on u.id=c.id_user
            left join news n on n.id_news=c.id_news
            left join category cat on cat.id_category=n.id_category order by c.date_time desc limit {$start},{$limit}";
        $result = $this->db->query($sql);
        $result['count']=$this->cnt_comments($limit);
        return $result;
    }

    public function admin_delete_comment($id){
        $sql="delete from comments where id_comment={$id}";
        $this->db->query($sql);
    }

    public function admin_edit_comment($id){
        $sql="select * from comments where id_comment={$id}";
        return $this->db->query($sql);
    }

    public function top_commentators($limit = 5)
    {
        $sql = "select c.*,count(*) as cnt,u.login from comments c
              left join users u on u.id=c.id_user
              group by c.id_user order by cnt desc
              limit {$limit}";
        return $this->db->query($sql);
    }

    public function getCommentCnt($id_user, $limit)
    {
        $sql = "select count(*) as cnt from comments where id_user={$id_user}";
        $cnt_pages = $this->db->query($sql);
        $result = ceil($cnt_pages[0]['cnt'] / $limit);
        return $result;
    }

    public function getThemes($limit = 3)
    {
        $sql = "select c.*,n.title_news from (select max(date_time) datet,id_news from comments 
group by id_news limit {$limit}) c
left join news n on n.id_news=c.id_news";
        return $this->db->query($sql);

    }

    public function getCommentsByUser($id_user, $page = 0, $limit = 5)
    {
        $page = $page * $limit;
        $sql = "select c.*,n.title_news,u.login from comments c
              left join users u on u.id=c.id_user
              left join news n on n.id_news=c.id_news
              where c.id_user ={$id_user} order by  c.date_time desc limit {$page},{$limit} ";
        $result['comment'] = $this->db->query($sql);
        $result['count_page'] = $this->getCommentCnt($id_user, $limit);
        return $result;
    }

    public function vote($id_comment, $type)
    {
        if (!Session::get('login')) {
            echo json_encode(array('result' => 'Login please'));
            exit;
        }
        $user = Session::get('login');
        $sql = "Select v.*,u.login from votes_comment v
        left join users u on u.id=v.id_user where id_comment={$id_comment} and
         u.login like '%$user%'";

        $result = $this->db->query($sql);
        $get_user = $this->db->query("select id from users where login like'%$user%'");
        if (!isset($result[0])) {
            $sql = "INSERT INTO votes_comment (id_comment,id_user)
             VALUES ({$id_comment},{$get_user[0]['id']})";
            $this->db->query($sql);
            $this->cnt_like($id_comment, $type);
        } else {
            header('Content-Type: text/json; charset=utf-8');
            echo json_encode(array('result' => 'you are voted this news'));
            exit;
        }
    }


    public function cnt_like($id_comment, $type)
    {
        $type = 'cnt_' . $type;
        $sql = ("UPDATE comments SET {$type}=({$type}+1) WHERE id_comment='{$id_comment}'");
        $result = $this->db->query($sql);
        header('Content-Type: text/json; charset=utf-8');
        echo json_encode(array('result' => 'success'));
        exit;
    }

    public function check_comment($id_news)
    {
        $sql = "select n.id_news from news n
        where n.id_news={$id_news} and n.id_category=5 limit 1";
        $result = $this->db->query($sql);
        if (empty($result)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function add_comment($id_user, $id_news, $comment, $id_parent = 0)
    {
        $is_active = $this->check_comment($id_news);
        $sql_user = "select id,login from users where login like '%{$id_user}%'";
        $comment = htmlspecialchars($this->db->escape($comment));
        if ($result = $this->db->query($sql_user)) {
            $id_user = $result[0]['id'];
        }
        $sql = "
            insert into comments
            set id_user='{$id_user}',
                id_news='{$id_news}',
                comment='{$comment}',
                id_parent='{$id_parent}',
                is_active='{$is_active}'
            ";
        $this->db->query($sql);
        //if (!$is_active) {
            //echo 'false';
        //}
        $result = $this->get_comments($id_news);
        return $result;
    }

    public function change_comment($id_comment, $comment,$cnt_like,$cnt_dislike,$is_active)
    {
        $is_active = $is_active ? 1 : 0;
        $sql = "update comments set comment='{$comment}',
cnt_like='{$cnt_like}',
cnt_dislike='{$cnt_dislike}',
is_active='{$is_active}'
where id_comment ={$id_comment}";
        $this->db->query($sql);
    }
}