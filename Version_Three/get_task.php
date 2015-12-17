<?php
include_once("adb.php");
/**
*@author Israel Oladejo
*@copyright December 2015
**/

/**
*This class contain function that allows the user to fetch a task
**/

class se_task extends adb{
    function task(){
    }

    /**
    *Function to Fetch a task
    *
    *@param int $task_id This shows the id of the task that will be viewed
    *@param string $task_name This shows the name of the task that is being fetched
    *@param int $start_time This shows the time the task started or is to start
    *@param int $end_time This shows the time the task ended or is to end
    *@param int $user_id This shows the user that has been assigned the task
    *@param int $setter_id This shows the administrator that set the task
    *@param int $report_id This shows the report of the task
    *@param int $status_id This shows the current state of the task
    *
    @return $this->query($str_query); Returs a query with the values
    **/
    
    function get_task(){
        $str_query = "SELECT `task_id`, `task_name`, `start_time`, `end_time`, `user_id`, `setter_id`, `status`,  `report` FROM            `se_task` ";
        if(!$this->query($str_query)){
            return false;
        }else{
            return true;
        }
    }
?>