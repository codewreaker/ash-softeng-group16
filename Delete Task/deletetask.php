<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <link rel='stylesheet' href="res/font-awesome/css/font-awesome.css"/>
	<style>


	</style>
	<title>Task View</title>

<header > <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">Task View</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
      </ul>
    </div>
  </nav></header>

</head>
<body >
    
    </br>

<form action="deletetask.php" method="GET" >
		<div>Task Id:   <input type="text" size="14" name="ti"></div>
    <input type="submit" value="delete" a class="waves-effect waves-light btn"><i class="material-icons left"></i></a>
				 <!--<input type="submit" value="delete">-->

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
