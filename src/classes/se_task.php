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
    * @param string $report documentation for completed task
    * @return $this->query($str_query); Returns a response
    */
	function add_task($task_name,$end_time, $user_id,$personnel){
			$str_query="insert into se_task set
						task_name='$task_name',
						start_time='CURR_DATETIME()',
						end_time='$end_time',
						user_id='$user_id',
						personnel_id='$personnel',
                        status='0',
                        report='No Report Yet'";
			return $this->query($str_query);
	}


    /**
    * Function to Edit a task to
    *
    * @param int $task_id The task id of a the value to be edited
    * @param string $task_name The task name of the task to be changed if necessary
    * @param datetime $start_time This is the time the task should start and should be changed if the task started late
    * @param datetime $end_time This is the time the task ended
    * @param int $user_id This is the person being assigned the task
    * @param int $status This is the current progress of the task
    * @param string $report Documentation for the task
    * @return $this->query($str_query); Returns a query with the values
    */
	function edit_task($task_id, $task_name, $start_time, $end_time, $user_id, $status, $report){
			$str_query="UPDATE se_task SET
                        task_id=$task_id,
						task_name='$task_name',
						start_time='$start_time',
                        end_time='$end_time',
                        user_id='$user_id',
						status='$status',
                        report='$report', WHERE `task_id`=$task_id";
			return $this->query($str_query);
	}

    /**
    * Function to delete a task from a table
    *
    * @param int $task_id The task id of a the value to be edited
    * @return $this->query($str_query); Returns a query with the values
    */
    function delete_task($task_id){
		$str_query="delete from se_task where task_id=$task_id";
		return $this->query($str_query);
	}

    /**
    * Function to view a task from the database
    *
    * @param int $task_id The task id of a the value to be viewed
    * @return $this->query($str_query); Returns a query with the values
    */
    function view_task($task_id){
        $str_query = "SELECT * FROM `se_task` WHERE taskid=$task_id";
        if(!$this->query($str_query)){
            return false;
        }else{
            return true;
        }
    }

     /**
    * Function to fetch all data from the database
    *
    * @param int $task_id The task id of a the value to be viewed
    * @return $this->query($str_query); Returns a query with the values
    */
    function fetch_task(){
        $str_query = "SELECT * FROM `se_task`";
        if(!$this->query($str_query)){
            return false;
        }else{
            return true;
        }
    }
}
?>
