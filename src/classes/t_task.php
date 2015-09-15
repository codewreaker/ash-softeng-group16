<?php


include_once("adb.php");
/**
* @author Israel Agyeman-Prempeh
* @copyright 2015-09-10
*/


/**
* This class contain functions that allow the user to do major tasks of a CRUD application like Add, Delete, Edit etc
*
*
**/
class t_task extends adb{

    /**
    * Function to Add a task to the database
    *
    * @param string $task_name the name of the task as a string
    * @param string $description This a short description of the task
    * @param int $task_personnel Represents the id referencing the personnel issuing the add
    * @param Date $due_date This is a parameter that is entered by default, it is a date timestamp of the entry
    * @return $this->query($str_query); Returns a query with the values
    */
	function add_task($task_name, $description,$task_personnel, $due_date){
			$str_query="insert into t_task set
						task_name='$task_name',
						description='$description',
						task_personnel='$task_personnel',
						due_date='$due_date';
                        ";
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
