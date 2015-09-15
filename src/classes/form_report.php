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
		<div>Report Id:   <input type="text" size="14" name="ri"></div>
		<div>Limitations: </div>
		<div>  <textarea name="lm" size="30" ></textarea></div>
		<div>Errors: </div>
		<div>  <textarea name="er" size="30" ></textarea></div>
		<div>Progress Status:   <input type="text" size="14" name="ps"></div>
					 <input type="submit" value="add">
</tr>
</form>

<?php
if(isset($_REQUEST['ri'])){
	include("t_report.php");
	$obj= new t_report();
	$report_id=$_REQUEST['ri'];
	$limitations=$_REQUEST['lm'];
	$errors=$_REQUEST['er'];
	$progress_status=$_REQUEST['ps'];

	if(!$obj->add_report($report_id,$limitations,$errors,$progress_status)){
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
