<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="js/myJS.js"></script>
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
               
         var url = "http://cs.ashesi.edu.gh/~csashesi/class2016/makafui-amezah/Software%20Engineering/user_controller.php?cmd=2";
               var obj = sendRequest ( url );
      
        alert(obj.result);
                if ( obj.result === 1 )
                {
             
          var i = 0;
          var panels ="";
          
          for ( ; i < obj.task.length; i++ )
                    {
console.log("here: " + i);
          panels += "<div class='row'><div class='col s12 m4'><div class='card'><div class='card-content'><p><b>Name: </b>"+obj[i].name+"</p><p><b>Description: </b>"+obj[i].description+"</p></div></div></div></div>";
          }
          
           $ ( ".lists" ).html (panels);
         }
         else{
          
         
         }
      });
</script>
    </br>

<form action="deletetask.php" method="GET" >
		<div>Task Id:   <input type="text" size="14" name="ti" id="idfield"></div>
    <input type="submit" value="delete" a class="waves-effect waves-light btn" onclick="deleteTask()"><i class="material-icons left"></i></a>
				

</form>

<div id="lists">
    
    
</div>


</body>
</html>
	