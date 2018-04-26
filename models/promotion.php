<?php

class Promotion extends Model{

    public function cnt_promotion($limit=10){
        $sql = "select count(*) as COUNT from promotion";
        $count_promotion = $this->db->query($sql);
        $total_rows = ($count_promotion[0]['COUNT']);
        $num_pages = ceil($total_rows / $limit);
        return $num_pages;
    }

    public function admin_get_promotion($page=0,$limit=10){
        $start = $page * $limit;
        $sql="select * from promotion limit {$start},{$limit} ";
        $result=$this->db->query($sql);
        $result['count']=$this->cnt_promotion($limit);
        return $result;
    }

    public function admin_delete($id){
        $sql="delete from promotion where id={$id}";
        $this->db->query($sql);
    }

    public function admin_save($data,$id=null){
        $id = (int)$id;
        $product_name=$data['product_name'];
        $price=$data['price'];
        $firm=$data['firm'];
        $site=$data['site'];
        $is_active=isset($data['is_active'])? 1 :0;
        if ($id){
            $sql="update promotion set
                                 product_name='{$product_name}',
                                 price='{$price}',
                                 firm='{$firm}',
                                 site='{$site}',
                                 is_active='{$is_active}'
                                 where id={$id}";
        }else{
            $sql="insert into  promotion set
                                 product_name='{$product_name}',
                                 price='{$price}',
                                 firm='{$firm}',
                                 site='{$site}',
                                 is_active='{$is_active}'";
        }
        $this->db->query($sql);
    }

    public function admin_edit($id){
        $sql="select * from promotion where id={$id}";
        return $this->db->query($sql);
    }

    
}