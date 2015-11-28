<? php
/**
* @author Frances A. Wireko
* @copyright 2015-11-18
*/
?>

<html>
<head>
	<style>


	</style>
	<title>Index</title>
	<link rel="stylesheet" href="css/style.css">
	<script>
	</script>

<h1 >Report Form </h1>

</head>
<body >

<tr>
<form method="GET" action="form_report.php">
		<div>Task Id:<input type="text" size="6" name="ti"></div>
		<div>Task Name:<input type="text" size="14" name="tn"></div>
		<div>Start Time:<input type="text" size="14" name="st" ></div>
		<div>End Time:<input type="text" size="14" name="et"> </div>
        <div>User Id:<input type="text" size="6" name="ui"> </div>
		<div>Status:<input type="text" size="6" name="sr"></div>
        <div> <textarea>  </textarea> </div>

		<div><input type="submit" value="add"></div>
</tr>
</form>

<?php
if(isset($_REQUEST['ti'])){
	include("task.php");
	$obj= new task();
	$task_id=$_REQUEST['ri'];
	$task_name=$_REQUEST['lm'];
	$start_time=$_REQUEST['st'];
    $end_time=$_REQUEST['et'];
    $user_id=$_REQUEST['ui']
	$status=$_REQUEST['sr'];
    //$report=$_REQUEST['s']

	if(!$obj->add_report($task_id,$task_name,$start_time,$end_time,$status)){
		echo "Error adding".mysql_error();
	}
	else{
		echo "Added";
	}
}
?>
</table>
</body>
</html>
