<?php
include_once("adb.php");
class deletephp extends adb{
function task(){
}

	function deletetask($taskid){
		$str_query="delete from task where taskid=$taskid";
		return $this ->query($str_query);
	}

    function viewtask($taskid){
        $str_query = "SELECT `name`, `description`, `timeStart` FROM `task` WHERE taskid=$taskid";;
        if(!$this->query($str_query)){
            return false;
        }else{
            return true;
        }
    }

}


?>
