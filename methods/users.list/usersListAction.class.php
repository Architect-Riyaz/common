<?php
/**
 * Author : Lakshmi Sudha
 * Date   : 25-10-2017
 * Desc   : This is a controller file for usersList Action 
 */
class usersListAction extends baseAction{
  
  public function execute()
  {
    $userLib = autoload::loadLibrary('queryLib', 'user');
    $result = array();
	
	$result = $userLib->getUserList();
    
    $this->setResponse('SUCCESS');
    return $result;
  }  
}