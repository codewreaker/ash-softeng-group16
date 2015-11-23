<html>
<head>
	<style>


	</style>
	<title>Index</title>

<h1 >Task View</h1>

</head>
<body >


<form action="deletetask.php" method="GET" >
		<div>Task Id:   <input type="text" size="14" name="ti"></div>
				 <input type="submit" value="delete">

</form>

<?php
if(isset($_REQUEST['ri'])){
	include("deletephp.php");
	$obj= new task();
	$task_id=$_REQUEST['ri'];

	if(!$obj->deletetask($taskid)){
		echo "Error deleting".mysql_error();
	}
	else{
		echo "deleted";
	}
}
?>
</table>
</body>
</html>
