<?php
/**
 * Author : Shaikh Riyazuddin
 * Date   : 25-10-2017
 * Desc   : This is a controller file for userSignin Action 
 */
class userSigninAction extends baseAction{
  
  public function execute()
  {
    $userLib = autoload::loadLibrary('queryLib', 'user');
    $result = array();
	
	//check email already exist or not

	$userDetails = $userLib->getUserInfo($this->phone_no,$this->password);
	
	if(empty($userDetails)){
		$this->setResponse('CUSTOM_ERROR', array('error'=>'email id and password does not match'));
		return false;
		}	
		//update login time
		$result["login_time"] = date('Y-m-d H:i:s', time()) ;
		$result["updated_at"] = date('Y-m-d H:i:s', time()) ;
		$result["login_count"] = $userDetails['login_count'] + 1;
		$result["status"] = 1;

		$updateTime=$userLib->updateUser($userDetails['user_id'],$result);
	
    $this->setResponse('SUCCESS');
    return $userDetails['user_id'];
  }  
}