<?php
/**
 * Author : Lakshmi Sudha
 * Date   : 02-03-2018
 * Desc   : This is a controller file for userSignup Action 
 */
class userSignupAction extends baseAction{
  
  public function execute()
  {
    $userLib = autoload::loadLibrary('queryLib', 'user');
    $result = array();
    
    //Check Username Already Exist or not
    $chkusername = $userLib->chkUsername($this->username);
    if (isset($chkusername['user_name'])) {
    	$this->setResponse('CUSTOM_ERROR',array('error'=>'Username already taken'));
    	return false;
    }

	//Check Phone_no Already Exist or not
    $chkPhone = $userLib->chkPhone($this->phone_no);
    if (isset($chkPhone['phone_no'])) {
    	$this->setResponse('CUSTOM_ERROR',array('error'=>'Phone No already Exist'));
    	return false;
    }

    //Adding the Data
    $result["updated_at"]= date('Y-m-d H:i:s', time()) ;
    $userLib->insertUser(array(
    							"user_name" => $this->username,
    							"phone_no"=>$this->phone_no,
								"email_id" => $this->email,
								"password" => $this->password,
								"updated_at"=>$result["updated_at"],
								));
    
    $resposneMSG="Account has been created Succesfully";
    $this->setResponse('SUCCESS');
    return $resposneMSG;
  }  
}