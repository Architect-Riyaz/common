<?php
class userSignupInitialize extends baseInitialize{

  public $requestMethod = array("GET", "POST");
  public $isSecured = false;
	
  public function getParameter()
  {
    $parameter = array();
    
    $parameter["username"] = array( "name"=>"username",
                                 "required"=>true,
                                 "description"=>"Username for the user"
    );
    $parameter["phone_no"] = array( "name"=>"phone_no",
                                 "required"=>true,
                                 "description"=>"phone_no of the user"
    );
    $parameter["email"] = array( "name"=>"email",
                                 "required"=>true,
                                 "description"=>"Email id of the user"
    );
    $parameter["password"] = array( "name"=>"password",
                                 "required"=>true,
                                 "description"=>"Password for the user"
    );
    
    
    
    return $parameter;
  }
}