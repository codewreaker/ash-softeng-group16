<?php
/**
* @author Frances Wireko
* @copyright 2015-11-25
*/

/**
* This class contain a form for editing tasks
**/
?>


<html>
<head>
	<style></style>
	<title>Index</title>
	<link rel="stylesheet" href="css/style.css">
	<script></script>
</head>
<body >

<form action="edit_task.php" method="GET" >
    
		<div>Task Id:   <input type="text" size="14" name="ti"></div>
        <div>Task Name:   <input type="text" size="14" name="tn"></div>
        <div>Start Time:   <input type="text" size="14" name="st"></div>
        <div>End Time:   <input type="text" size="14" name="et"></div>
        <div>User Id:   <input type="text" size="14" name="ui"></div>
        <div>Status:   <input type="text" size="14" name="sp"></div>
        <div>Report: </div>
		<div>  <textarea name="tr" size="30" ></textarea></div>
    
				 <input type="submit" value="update">
</form>

<?php
if(isset($_REQUEST['ti'])){
	include("edit_task.php");
	$obj= new edit_task();
	$task_id=$_REQUEST['ti'];

	if(!$obj->edit_task($task_id)){
		echo "Error updating task".mysql_error();
	}
	else{
		echo "Task updated";
	}
}
?>
</table>
</body>
</html>
