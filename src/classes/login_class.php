<?php
require_once 'auth.php';
//session_start();
//
//$auth = new Auth();
//echo $_SESSION['user_id'];
//if (!isset($_SESSION['user_id'])) {
//	//Not logged in, send to login page.
//	if($auth->login($_REQUEST['login_email'],$_REQUEST['login_pword']) == 4){
//        echo '{"result":0,"message":"error code 4"}';
//        header( 'Location: ../../login.php' );
//    }else{
//        echo '{"result":1,"message":"Succesfully Logged In"}';
//    }
//} else {
//    echo "Here Now";
//	//Check we have the right user
//	$logged_in = $auth->checkSession();
//	
//	if(empty($logged_in)){
//		//Bad session, ask to login
//		$auth->logout();
//		header( 'Location: login.html' );
//		
//	} else {
//		//User is logged in, show the page
//        header( 'Location: index.html' );
//	}
//}
$auth = new Auth();

if($_REQUEST['opt']==1){
    if(!$auth->createUser($_REQUEST['signup_email'],$_REQUEST['signup_pword'],$_REQUEST['signup_fullname'],$_REQUEST['signup_role'],$_REQUEST['signup_contact'],$_REQUEST['is_admin'])){
        echo '{"result":0,"message":"Failed to Create An Account"}';
    }else{
        $auth->verify_account($_REQUEST['signup_email']);
        echo '{"result":1,"message":"You Have Succesfully Created An Account"}';
    }
}else if($_REQUEST['opt']==2){
    $result = $auth->login($_REQUEST['login_email'],$_REQUEST['login_pword']);
    if($result == 4){
        echo '{"result":0,"message":"Please check your username and password or signup"}';
    }else if($result == 3){
        echo '{"result":0,"message":"Logged in as a non-admin"}';
    }else if($result == 2){
        echo '{"result":0,"message":"You are not an active user"}';
    }else if($result == 1){
        echo '{"result":0,"message":"Account Has Not Been Verified"}';
    }else{
        echo '{"result":1,"message":"Succesfully Logged In"}';
    }
     
}
