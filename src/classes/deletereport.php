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


<form action="deletereport.php" method="GET" >
		<div>Report Id:   <input type="text" size="14" name="ri"></div>
				 <input type="submit" value="delete">

</form>

<?php
//$ri = $_REQUEST['ri'];
if(isset($_REQUEST['ri'])){
	include("t_report.php");
	$obj= new t_report();
	$report_id=$_REQUEST['ri'];

	if(!$obj->delete_report($report_id)){
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
