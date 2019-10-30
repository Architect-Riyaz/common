<?php
class specialAdmin{
  //Singleton
  protected static $objInstance;

  public static function get(){
    if(!isset(self::$objInstance)){
      $class=__CLASS__;
      self::$objInstance=new $class;
    }
    return self::$objInstance;
  }
  
  public function getSpecialAdminList($options=array())
  {
    $sql = "SELECT *
            FROM special_admin";
    
    $result = database::doSelect($sql);
    return $result;
  }
  
  public function getSpecialAdminDetail($specialAdminId, $options=array())
  {
    $sql = "SELECT *
            FROM special_admin
            WHERE special_admin_id=".$specialAdminId;
    
    $result = database::doSelectOne($sql);
    return $result;
  }
  
  public function insertSpecialAdmin($options=array())
  {
    $sql = "INSERT INTO special_admin SET "; 
    foreach($options as $key=>$value){
      $sql .= $key."='".$value."', ";
    }    
    $sql = rtrim($sql, ", ");
	  
    $result = database::doInsert($sql);
    return $result;
  }
  
  public function updateSpecialAdmin($specialAdminId, $options=array())
  {
    $sql = "UPDATE special_admin SET "; 
    foreach($options as $key=>$value){
      $sql .= $key."='".$value."', ";
    }    
    $sql = rtrim($sql, ", ");
    $sql .= "WHERE special_admin_id =".$specialAdminId;
	  
    $result = database::doUpdate($sql);
    return $result;
  }
  
  public function deleteSpecialAdmin($specialAdminId, $options=array())
  {
    $sql = "DELETE FROM special_admin
            WHERE special_admin_id = ".$specialAdminId; 
    
	  $result = database::doDelete($sql);
    return $result;
  }
  public function getSpecialAdminData($email_id, $password, $options=array())
  {
    $sql = "SELECT *
            FROM special_admin
            WHERE email_id='".$specialAdminId."' AND password='".$password."'";
    
    $result = database::doSelectOne($sql);
    return $result;
  }
}