<?php
include_once("adb.php");
class t_report extends adb{
function t_report(){
}

	function add_report($report_id, $limitations,$errors,$progress_status){
		$str_query="insert into t_report set
		report_id = '$report_id',
		limitations='$limitations',
		errors='$errors',
		progress_status ='$progress_status'";
		return $this ->query($str_query);
	}

	function update_report($report_id,$limitations,$errors,$progress_status){
		$str_query="update t_report set
		limitations='$limitations',
		errors='$errors',
		progress_status ='$progress_status'
		where report_id=$report_id";
		return $this ->query($str_query);
	}

	function delete_report($report_id){
		$str_query="delete from t_report where report_id=$report_id";
		return $this ->query($str_query);
	}

    function get_task(){
        $str_query = "SELECT `task_id`, `task_name`, `description`, `task_admin`, `task_personnel`, `due_date`, `report_id` FROM `t_task` ";
        if(!$this->query($str_query)){
            return false;
        }else{
            return true;
        }

         function mark_task($task_id){
			$str_query="UPDATE t_report SET progress_status='complete' WHERE `task_id`=$task_id";
			return $this->query($str_query);
	}
    }


    function view_report($report_id){
        $str_query = "SELECT `limitations`, `errors`, `progress_status` FROM `t_report` WHERE report_id=$report_id";;
        if(!$this->query($str_query)){
            return false;
        }else{
            return true;
        }
    }

}


?>
