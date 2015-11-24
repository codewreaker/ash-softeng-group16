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


    /**
    * Function to Edit a task to
    *
    * @param int $task_id The task id of a the value to be edited
    * @param string $task_name The task name of the task, this is the updated name to be changed
    * @param string $description This is a short description of the task to be edited
    * @param int $task_personnel This parameter is an id referencing the personnel who issued the add. This can also be updated
    * @param Date $due_date This is a parameter that is entered by default, it is a date timestamp of the entry
    * @return $this->query($str_query); Returns a query with the values
    */
	function edit_task($task_id,$task_name, $description,$task_personnel, $due_date){
			$str_query="UPDATE t_task SET
                        task_id=$task_id,
						task_name='$task_name',
						description='$description',
                        task_personnel=$task_personnel,
						due_date='$due_date',
                        report_id=$task_id WHERE `task_id`=$task_id";
			return $this->query($str_query);
	}

    /**
    * A function to delete a record from the database
    *
    * @param int $task_id the id of the record to be deleted
    * @return $this->query($str_query); Returns a query with the values
    */
	function delete_task($task_id){
			$str_query="delete from t_task WHERE task_id= $task_id";
			return $this->query($str_query);
	}

    /**
    * A function to delete a record from the database
    *
    * @param int $task_id the id of the record to be deleted
    * @return $this->query($str_query); Returns a query with the values
    */
    function get_task(){
            $str_query = "SELECT `task_id`, `task_name`, `description`,`task_personnel`, `due_date`, `report_id` FROM `t_task` ";
            if(!$this->query($str_query)){
                return false;
            }else{
                return true;
            }
        }
}
?>
