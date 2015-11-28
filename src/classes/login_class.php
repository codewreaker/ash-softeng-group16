<?php
// opt1 = signup
// opt2 = login
// opt3 = logout
require_once 'auth.php';
$auth = new Auth();

if($_REQUEST['opt']==1){
    //signup function happens here
    if(!$auth->createUser($_REQUEST['signup_email'],$_REQUEST['signup_pword'],$_REQUEST['signup_fullname'],$_REQUEST['signup_role'],$_REQUEST['signup_contact'],$_REQUEST['is_admin'])){
        echo '{"result":0,"message":"Failed to Create An Account"}';
    }else{
        $auth->verify_account($_REQUEST['signup_email']);
        echo '{"result":1,"message":"You Have Succesfully Created An Account"}';
    }
}else if($_REQUEST['opt']==2){
    //login function happens here
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
     
}else if($_REQUEST['opt']==3){
    //logout function happens here
    if(!$auth->logout()){
        echo '{"result":0,"message":"Failed to Create Logout"}';
    }else{
        echo '{"result":1,"message":"Successfully Logged Out"}';
    }
}
