<?php
//check that database table name corresponds
include_once("adb.php");
class t_personnel extends adb{

function t_personnel(){
}

function add_personnel($f_name,$l_name, $username, $password, $position,$p_type,$contact){
    $str_query="insert into t_personnel set first_name='$f_name',last_name='$l_name',user_name='$username', pword='$password', position ='$position',p_type='$p_type',contact= '$contact'";
    return $this->query($str_query);
}

function update_personnel($f_name,$l_name, $username, $password, $position,$p_type,$contact){
    $str_query="update t_personnel set first_name='$f_name', last_name= '$l_name', user_name='$username', password='$password', position ='$position',p_type='$p_type',contact='$contact";
    return $this->query($str_query);
}

function delete_personel($pid){
    $str_query ="delete from t_personnel where pid='$pid'";
    return $this->query($str_query);
}

function get_personnel($pid){
    $str_query="select * from t_personnel where pid='$pid'";
        if(!$this->query($str_query)){return false;}
}
}

?>
