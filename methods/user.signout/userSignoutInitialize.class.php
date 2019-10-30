<?php
class userSignoutInitialize extends baseInitialize{

  public $requestMethod = array("GET", "POST");
  public $isSecured = false;
	
  public function getParameter()
  {
    $parameter = array();
    
    $parameter["user_id"] = array( "name"=>"user_id",
                                 "required"=>true,
                                 "description"=>"Id of the user"
    );
    
    
    
    return $parameter;
  }
}