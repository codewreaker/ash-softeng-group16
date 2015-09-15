<?php
session_start();
/* A function that logs in with Ajax */
$option = $_REQUEST['opt'];

switch($option){
    case 0:
        signup();
        break;
    case 1:
        login();
        break;
    case 2:
        logout();
        break;
    case 3:
        return_session_details();
        break;
    default:
}


function login(){
    include_once("login_class.php");
        $obj = new login_class();
        $username = $_REQUEST['pn'];
        $pword = md5($_REQUEST['pw']);
        $obj->check($username,$pword);
        $row = $obj->fetch();
        if($row==false){
            echo '{"result":0,"message":"failed to login"}';
            return;
        }else if($username==$row['user_name'] && $pword==$row['pword']){
            $_SESSION["user_id"]=$row['pid'];
            $_SESSION["first_name"]=$row['first_name'];
            $_SESSION["last_name"]=$row['last_name'];
            $_SESSION["pword"]=$row['pword'];
            $_SESSION["user_name"] = $row['user_name'];
            $_SESSION["p_type"] = $row['p_type'];
            $_SESSION["position"] = $row['position'];
            $_SESSION["contact"] = $row['contact'];
            echo '{"result":1,"message":"successfully logged in"}';
            return;
        }else{
            echo '{"result":2,"message":"Something Went Wrong"}';
        }

}


/* A function that logs out but sets the user to guest  with Ajax */
function logout(){
    session_destroy();
    echo '{"result":1,"message":"successfully logged out"}';
    return;
}

/* A function that returns session details */
function return_session_details(){
        if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])) {
            echo '{"result":1,"session":[';
            echo json_encode($_SESSION);
            echo ']}';
        }else{
            echo '{"result":0,"message":"You are logged out"}';
        }
}

function signup(){
    include_once("t_personnel.php");
    $f_name=$_REQUEST['fn'];
	$l_name=$_REQUEST['ln'];
	$username=$_REQUEST['un'];
	$password=md5($_REQUEST['pass']);
	$position=$_REQUEST['pos'];
    $p_type=$_REQUEST['pt'];
	$contact=$_REQUEST['cd'];
	$obj = new t_personnel();
	if(!$obj->add_personnel($f_name,$l_name, $username, $password, $position,$p_type,$contact)){
		echo '{"result":0,"message":"Failed To Sign Up"}';
	}
	else{
        echo '{"result":1,"message":"successfully signed up"}';
    }
}

?>
