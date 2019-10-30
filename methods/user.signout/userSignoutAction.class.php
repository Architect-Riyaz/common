<?php
/**
 * Author : Lakshmi Sudha
 * Date   : 20-02-2018
 * Desc   : This is a controller file for userSignout Action 
 */
class userSignoutAction extends baseAction{
  
  public function execute()
  {
    $userLib = autoload::loadLibrary('queryLib', 'user');
    $result = array();

    $checkUser=$userLib->getUserDetail($this->user_id);
   
    if (empty($checkUser)) {
    	$this->setResponse('CUSTOM_ERROR',array('error'=>'user id does not exist'));
    	return $result;
    }
    $result['status'] = 0;
    $userLib->updateUser($this->user_id,$result);


    $this->setResponse('SUCCESS');
    return "User has been Successfully Logged out";
  }  
}