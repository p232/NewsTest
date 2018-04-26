<?php

class Setting extends Model{
    
    public function save($id,$color){
        $id=(int)$id;
        $sql="update setting set `value`='{$color}' where id={$id}";
        $this->db->query($sql);
    }
    
}