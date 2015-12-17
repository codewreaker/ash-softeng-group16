<html>
<head>
	<style>

	</style>
	<title>Index</title>
	<link rel="stylesheet" href="css/style.css">
	<script>
	</script>
	
<!--
*@author Israel Oladejo
*@copyright December 2015
-->


<h1> View All Tasks </h1>

//Viewing task in the database

</head>
<body >

<?php
if(isset($_REQUEST['tn'])){
    include_once("se_task.php");
        $obj = new se_task();
        if(!$obj->get_task()){
            echo '{"result":0,"message":"failed to fetch data"}';
            return;
        }else{
            $row=$obj->fetch();
	       echo '{"result":1,"tasks":[';	/*start of json object*/
	       while($row){
		      echo json_encode($row);/*convert the result array to json object*/
		      $row=$obj->fetch();
		      if($row){
			     echo ",";					/*if there are more rows, add comma*/
		      }
	       }
	       echo "]}";
        }
}
?>
</table>
</body>
</html>
