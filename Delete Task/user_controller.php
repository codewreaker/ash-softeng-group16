<?php

if (!isset($_REQUEST['cmd'])) {
    echo '{"result": 0, "message": "Command not set"}';
    exit();
}
$cmd = $_REQUEST['cmd'];
switch ($cmd) {
        case 1 :
        deletetask();
        break;
        case 2:
//echo "hello";
        lists();
        break;
    default :
        echo '{"result": 0, "message": "Unknown command"}';
        break;
}

function deletetask() {
    include_once 'deletephp.php';
    $obj = new deletephp();
    $id=$_REQUEST['id'];
    if (!$obj->deletetask($_REQUEST['id'])) {
        echo '{"result": 0, "message": "Login Error: ' . mysql_error() . '"}';
        return;
    } 
	else{
		echo  '{"result":1,"message": "Successful"}';	
 }
 }
 

function lists() {

include_once("deletephp.php");
        $obj=new deletephp();

	if($obj->lists()){
		$row=$obj->fetch();
	echo '{"result":1,"task":[';	
	while($row){
		echo json_encode($row);	
		$row=$obj->fetch();
		if($row){
			echo ",";
		}
	}
	echo "]}";	
	
	}
  }

?>		