<?php
include_once("adb.php");

class Auth extends adb{
    
	private $_siteKey;
    /**
    * This function is thedefault constructor
    */
	public function __construct()
  	{
		$this->siteKey = 'my site key will go here';
	}
    
    /** 
    * This function creates a user with the security features implemented
    **/
    public function createUser($email, $password,$fullname,$role,$contact,$is_admin = 0)
    {			
	//Generate users salt
	$user_salt = $this->randomString();
			
	//Salt and Hash the password
	$password = $user_salt.$password;
	$password = $this->hashData($password);
			
	//Create verification code
	$code = $this->randomString();
    

        
	//Commit values to database here.
	$str= "INSERT into se_user set email='$email',password='$password',fullname='$fullname',role='$role',contact='$contact',user_salt='$user_salt',is_verified=1,is_active=1,is_admin='$is_admin',verification_code='$code'";
        
    $created = $this->query($str);
	if($created != false){
		return true;
	}
			
	return false;
    }
    

    
    
    /**
    * This function is used to log a user in
    **/
    public function login($email, $password)
{
    $str = "SELECT * FROM se_user WHERE email='$email'";
	//Select users row from database base on $email
    $this->query($str);
	$selection = $this->fetch();
    //print_r($selection);
	//Salt and hash password for checking
	$password = $selection['user_salt'].$password;
	$password = $this->hashData($password);
   
   
   $match = "";
   $db_pword = (string) $selection['password'];
   $db_email = (string) $selection['email'];
	//Check email and password hash match database row
    if($password==$db_pword && $email == $db_email){
        $match = true;
    }else{
        $match = false;
    }
        

	//Convert to boolean
	$is_active = (boolean) $selection['is_active'];
	$verified = (boolean) $selection['is_verified'];
	if($match == true) {
		if($is_active == true) {
			if($verified == true) {
				//Email/Password combination exists, set sessions
				//First, generate a random string.
				$random = $this->randomString();
				//Build the token
				$token = $_SERVER['HTTP_USER_AGENT'].$random;
				$token = $this->hashData($token);
					
				//Setup sessions vars
				$_SESSION['token'] = $token;
				$_SESSION['user_id'] = $selection['user_id'];
				$id = $selection['user_id'];
                
				//Delete old se_logged_in_member records for user
                $str = "DELETE FROM se_logged_in_member WHERE id ='$id'";
                $this->query($str);
                
                	
				//Insert new se_logged_in_member record for user
                $sid = session_id();
                $str = "INSERT INTO se_logged_in_member SET user_id='$id',session_id='$sid',token='$token'";
				$inserted = $this->query($str);

				//Logged in
				if($inserted != false) {
					return 0;
				} 
				//Not admin
				return 3;
			} else {
				//Not verified
				return 1;
			}
		} else {
			//Not active
			return 2;
		}
	}
		
	//No match, reject
	return 4;
}


    
    /**
    * This function generates a random 50 letter word
    */
    private function randomString($length = 50)
    {
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$string = "";    
		for ($p = 0; $p < $length; $p++) {
		  $string .= $characters[mt_rand(0, strlen($characters)-1)];
	    }
      	return $string;
    }
    
    /**
    * This function hashes data given to it and returns it as a hash_hmac
    **/
    protected function hashData($data)
    	{
		return hash_hmac('sha512', $data, $this->_siteKey);
	}
    
    /**
    * This function checks the session id with the dabase to see if user is an admin
    **/
    public function isAdmin()
    {		
	//$selection being the array of the row returned from the database.
	if($selection['is_admin'] == 1) {
		return true;
	}
		
	return false;
    }
    
    /**
    * A function to check the session of a logged in user
    **/
    public function checkSession()
{
    $_session_id = $_SESSION['user_id'];
    $str = "SELECT * FROM se_user WHERE email='$_session_id'";
	//Select users row from database base on $email
    $this->query($str);
	//Select the row
	$selection = $this->fetch();
		
		
	if($selection) {
		//Check ID and Token
		if(session_id() == $selection['session_id'] && $_SESSION['token'] == $selection['token']) {
			//Id and token match, refresh the session for the next request
			$this->refreshSession();
			return true;
		}
	}
		
	return false;
}
    
    /**
    * A function to refresh the session
    **/
    private function refreshSession()
    {
	//Regenerate id
	session_regenerate_id();
		
	//Regenerate token
	$random = $this->randomString();
	//Build the token
	$token = $_SERVER['HTTP_USER_AGENT'] . $random;
	$token = $this->hashData($token); 
		
	//Store in session
	$_SESSION['token'] = $token;

    }
    
    /**
    * A function that sends an email to a user to verify his account
    **/
    public function verify_account($email){
        $headers = "From: israel.agyeman.prempeh@gmail.com\r\n";
        $headers .= "Reply-To: israel.agyeman.prempeh@gmail.com\r\n";
        $headers .= "Return-Path: israel.agyeman.prempeh@gmail.com\r\n";
        $headers .= "CC: prophet.agyeman-prempeh@ashesi.edu.gh\r\n";
        $headers .= "BCC: frances.wireko@ashesi.edu.gh,israel.oladejo@ashesi.edu.gh,makafui.amezah@ashesi.edu.gh\r\n";


        $to = $email;
        $subject = "TaskMaster Verification";
        $txt = "Welcome to TaskMaster you have joined a great health family ";
        $headers = "From: israel.agyeman.prempeh@gmail.com" . "\r\n" .
                    "CC: frances.wireko@ashesi.edu.gh,israel.oladejo@ashesi.edu.gh,".
                    "makafui.amezah@ashesi.edu.gh,";

        if ( mail($to,$subject,$txt,$headers) ) {
            return true;
        } else {
            return false;
        }
    }


    /**
    * This function logs out the sessios
    **/
    public function logout()
    {
        session_destroy();
    }
    
}
/* END OF CLASS */  

//$auth = new Auth();
//
//if($_REQUEST['opt']==1){
//    if(!$auth->createUser($_REQUEST['signup_email'],$_REQUEST['signup_pword'],$_REQUEST['signup_fullname'],$_REQUEST['signup_role'],$_REQUEST['signup_contact'],$_REQUEST['is_admin'])){
//        echo mysql_error();
//    }else{
//        echo '{"result":1,"message":"You Have Succesfully Created An Account"}';
//    }
//}else if($_REQUEST['opt']==2){
//    if($auth->login($_REQUEST['login_email'],$_REQUEST['login_pword']) == 4){
//        echo '{"result":0,"message":"error code 4"}';
//    }else{
//        echo '{"result":1,"message":"Succesfully Logged In"}';
//    }
//
//}
  
    
?>
