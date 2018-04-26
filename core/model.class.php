<?php

class Model {

    protected $db;

    public function __construct()
    {
        $this->db=App::$db;
    }
    # удалить все кроме 2х первых.перемешать и вставить к тем 2м или
    public function getPromotion($id=null){

        if (!$id) {
            $sql = "SELECT * from promotion where is_active=1 ";
            $results=$this->db->query($sql);

            $cnt_another=8;
            $another= array_slice($results,0, $cnt_another);

            return $another;
        }else{
            return $this->db->query($sql);
        }
    }
    public function admin_color(){
        $sql="select * from setting";
        return $this->db->query($sql);
    }
}