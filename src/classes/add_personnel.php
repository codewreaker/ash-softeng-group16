<html>
<head>
	<title>Add Personnel</title>
    <script src="assets/js/jquery-2.1.1.min.js"></script>
    <script src="assets/js/login.js"></script>
	<link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="assets/css/form_style.css"/>
</head>
<body>

<div id="form_style">
   <div>
    <div><h3>Sign Up</h3></div>
	First Name <input type="text" name ="fn"><br>
	Last Name <input type="text" name ="ln" ><br>
	Username <input type="text" name ="un" ><br>
	Password <input type="text" name ="pass"><br>
	Position <input type="text" name ="pos"><br>
	Contact Details <input type="text" name ="cd"><br>
    <input type="submit" id="back"  value="Back"><br>
	<input type="submit" id="save" value="save">
</div>
</div>

<?php
include("t_personnel.php");
if(isset($_REQUEST['fn'])){
	$f_name=$_REQUEST['fn'];
	$l_name=$_REQUEST['ln'];
	$username=$_REQUEST['un'];
	$password=$_REQUEST['pass'];
	$position=$_REQUEST['pos'];
	$contact=$_REQUEST['cd'];
	$obj = new t_personnel();
	if(!$obj->add_personnel($f_name,$l_name, $username, $password, $position, $contact)){
		echo "Error adding";
	}
	else{
		//echo "success" . $f_name;
        header('Location: login.php');
	}
}

?>
</body>
</html>
