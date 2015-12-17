<?php

/**
*@author Israel Oladejo
*@copyright December 2015
**/

include_once("adb.php");
class se_task extends adb{
    function task(){
    }
    
    /**
    *Function to Add a task
    *
    *@param int $task_id This shows the id of the task that will be be added
    *@param string $task_name This shows the name of the task that is being added
    *@param int $start_time This shows the time the task is to start
    *@param int $end_time This shows the time the task is to end
    *@param int $user_id This shows the user that is to be assigned the task
    *@param int $setter_id This shows the administrator that is setting the task
    *@param int $report_id This shows the report of the task
    *@param int $status_id This shows the state of the task
    *
    @return $this->query($str_query); Returs a query with the values
    **/
    
    function add_task($task_id, $task_name, $start_time, $end_time, $user_id, $setter_id, $status, $report){
        $str_query="insert into se_task set
            task_id='$task_id',
            task_name='$task_name',
            start_time='$start_time',
			end_time='$end_time',
            user_id='$user_id',
            setter_id='$setter_id',
			status='$status',
			report='$report'
        ";
		return $this->query($str_query);
    }
	
	/**
    *Function to Get a task
    **/
	function get_task(){
        $str_query = "SELECT `task_id`, `task_name`, `start_time`, `end_time`, `user_id`, `setter_id`, `status`,  `report` FROM            `se_task` ";
        if(!$this->query($str_query)){
            return false;
        }else{
            return true;
        }
    }
	
}
?>
