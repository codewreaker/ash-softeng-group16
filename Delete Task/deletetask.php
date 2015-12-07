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
    <script>
    function sendRequest (u)
           {
               var obj = $.ajax({url:u,async:false});
                var result=$.parseJSON(obj.responseText);
                return result;
           }

        
         $ ( document ).ready ( function ( )
            {
               
         var url = "http://cs.ashesi.edu.gh/~csashesi/class2016/makafui-amezah/Mobile%20Web/midsem/POS/POS/controllers/user_controller.php?cmd=1";
               var obj = sendRequest ( url );
      
        
                if ( obj.result === 1 )
                {
             
          var i = 0;
          var panels ="";
          
          for ( ; i < obj.products.length; i++ )
                    {
          panels += "<div class='row'><div class='col s12 m4'><div class='card'><div class='card-content'><p><b>Username: </b>"+obj.credentials[i].username+"</p><p><b>Password: </b>"+obj.credentials[i].password+"</p><p><b>Platform: </b>"+obj.credentials[i].platform+"</p></div><div class='card-action'><a class='waves-effect waves-light yellow btn modal-trigger' href='#modal1' onClick='loadprice("+obj.credentials[i].password+")'><span style='color:white'>Update</span></a></div></div></div></div>";
          }
          
           $ ( ".display" ).html (panels);
         }
         else{
          
         
         }
      });
</script>
    </br>

<form action="deletetask.php" method="GET" >
		<div>Task Id:   <input type="text" size="14" name="ti"></div>
    <input type="submit" value="delete" a class="waves-effect waves-light btn"><i class="material-icons left"></i></a>
				 <!--<input type="submit" value="delete">-->

</form>

<div id="list">
    
    
</div>

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
</body>
</html>
