<?php

include_once("adb.php");
/**
* @author Frances Wireko
* @copyright 2015-11-25
*/

/**
* This class contain functions that allow the user edit an existing task
**/

class edit_task extends adb{
    /**
    * Function to Edit a task 
    *
    * @param int $task_id The task id of a the value to be edited
    * @param string $task_name The task name of the task, this is the updated name to be changed
    * @param Date $start_time This is the time the task should start
    * @param Date $end_time This is the time the task should end
    * @param int $user_id This is the personnel assigned to the task
    * @param int $status This is the progress of the task
    * @param int $report This is for writing a report for the task
    
    * @return $this->query($str_query); Returns a query with the values
    */
	function e_task($task_id,$task_name,$start_time,$end_time,$user_id,$setter_id,$status,$report){
			$str_query="UPDATE se_task SET
                        task_id='$task_id',
						task_name='$task_name',
						start_time='$start_time',
                        end_time='$end_time',
						user_id='$user_id',
                        setter_id='$setter_id',
                        status='$status',
                        report='$report' WHERE `task_id`=$task_id";
			return $this->query($str_query);
	}
    }

if(isset($_REQUEST['ti'])){
	
	$task_id=$_REQUEST['ti'];
    $task_name=$_REQUEST['tn'];
    $start_time=$_REQUEST['st'];
    $end_time=$_REQUEST['et'];
    $user_id=$_REQUEST['ui'];
    $setter_id=$_REQUEST['si'];
    $status=$_REQUEST['sp'];
    $report=$_REQUEST['tr'];
    $obj= new edit_task();
    
	if(!$obj->e_task($task_id,$task_name,$start_time,$end_time,$user_id,$setter_id,$status,$report)){
		echo "Error updating task".mysql_error();
	}
	else{
		echo "Task updated";
	}
}

    
    ?>
