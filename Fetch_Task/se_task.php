<?php


include_once("adb.php");
class se_task extends adb{
    function task(){
    }

     function get_task(){
        $str_query = "SELECT `task_id`, `task_name`,`task_personnel`, `start_date`, `end_date`, `status`,  `report` FROM `se_task` ";
        if(!$this->query($str_query)){
            return false;
        }else{
            return true;
        }
    }

}
?>
