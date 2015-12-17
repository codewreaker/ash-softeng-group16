<?php
/**
*@author Israel Oladejo
*@copyright December 2015
**/

session_start();

// Option 1 add_task

$option = $_REQUEST['opt'];

switch($option){
    case 1:
        include_once("se_task.php");
        $obj = new se_task();
        $task_id=$_POST['tid'];
        $task_name=$_POST['tn'];
	    $start_time=$_POST['st'];
	    $end_time=$_POST['et'];
        $user_id=$_POST['uid'];
        $setter_id=$_POST['sid'];
	    $status=$_POST['ss'];
	    $report=$_POST['rp'];


if(!$obj->add_task($task_id, $task_name, $start_time, $end_time, $user_id, $setter_id, $status, $report)){
        echo '{"result":0,"message":"Failed"}';
    }
    else{
        echo '{"result":1,"message":"Successfully Added Task"}';
}
        break;

}

?>
