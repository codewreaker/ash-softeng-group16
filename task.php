<?php


include_once("adb.php");
/**
* @author Frances A. Wireko
* @copyright 2015-11-18
*/


/**
* This class contain functions of task requirements like Add, Delete, Edit etc
*
*
**/
class se_task extends adb{

    /**
    * Function to Add a task to the database
    *
    * @param int $task_id the id of the task as an int
    * @param string $task_name the name of the task as a string
    * @param datetime $start_time the time the task is assigned
    * @param datetime $end_time the time the task is completed
    * @param int $user_id the id of the user being assigned to the task
    * @param int $status the progress of the task
    * @param string $report documentation for compleeted task
    * @return $this->query($str_query); Returns a query with the values
    */
	function add_task($task_id, $task_name, $start_time, $end_time, $user_id, $status, $report){
			$str_query="insert into se_task set
                        task_id='$task_id'
						task_name='$task_name',
						start_time='$start_time',
						end_time='$end_time',
						user_id='$user_id',
                        status='$status',
                        report='$report'";
			return $this->query($str_query);
	}
}
?>
