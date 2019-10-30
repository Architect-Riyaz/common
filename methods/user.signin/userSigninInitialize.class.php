<?php
class userSigninInitialize extends baseInitialize{

  public $requestMethod = array("GET", "POST");
  public $isSecured = false;
	
  public function getParameter()
  {
    $parameter = array();
    
    $parameter["phone_no"] = array( "name"=>"phone_no",
                                 "required"=>true,
                                 "description"=>"Phone no of the user"
    );	
	
	$parameter["password"] = array( "name"=>"password",
                                 "required"=>true,
                                 "description"=>"password of the user"
    );
    
    
    
    return $parameter;
  }
}