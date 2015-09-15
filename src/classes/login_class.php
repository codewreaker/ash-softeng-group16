<?php
include_once("adb.php");

class login_class extends adb {

    function check($username, $password) {
        $query = "select * from t_personnel where user_name='$username'and pword='$password'";

        if(!$this->query($query)){
            return false;
        }else{
            return true;
        }

    }

}

?>
