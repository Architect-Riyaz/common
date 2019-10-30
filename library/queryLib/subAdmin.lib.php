<?php
class subAdmin{
  //Singleton
  protected static $objInstance;

  public static function get(){
    if(!isset(self::$objInstance)){
      $class=__CLASS__;
      self::$objInstance=new $class;
    }
    return self::$objInstance;
  }
  
  public function getSubAdminList($options=array())
  {
    $sql = "SELECT *
            FROM sub_admin";
    
    $result = database::doSelect($sql);
    return $result;
  }
  
  public function getSubAdminDetail($subAdminId, $options=array())
  {
    $sql = "SELECT *
            FROM sub_admin
            WHERE sub_admin_id=".$subAdminId;
    
    $result = database::doSelectOne($sql);
    return $result;
  }
  
  public function insertSubAdmin($options=array())
  {
    $sql = "INSERT INTO sub_admin SET "; 
    foreach($options as $key=>$value){
      $sql .= $key."='".$value."', ";
    }    
    $sql = rtrim($sql, ", ");
	  
    $result = database::doInsert($sql);
    return $result;
  }
  
  public function updateSubAdmin($subAdminId, $options=array())
  {
    $sql = "UPDATE sub_admin SET "; 
    foreach($options as $key=>$value){
      $sql .= $key."='".$value."', ";
    }    
    $sql = rtrim($sql, ", ");
    $sql .= "WHERE sub_admin_id =".$subAdminId;
	  
    $result = database::doUpdate($sql);
    return $result;
  }
  
  public function deleteSubAdmin($subAdminId, $options=array())
  {
    $sql = "DELETE FROM sub_admin
            WHERE sub_admin_id = ".$subAdminId; 
    
	  $result = database::doDelete($sql);
    return $result;
  }
  public function getSuperAdmininfo($options = array()){
	 $sql = "SELECT *
            FROM super_admin";
    
    $result = database::doSelectOne($sql);
    return $result; 
  }
  public function updateSuperAdmin($options = array()){
	 $sql = "UPDATE super_admin SET "; 
    foreach($options as $key=>$value){
      $sql .= $key."='".$value."', ";
    }    
    $sql = rtrim($sql, ", ");
    $sql .= "";
	  
    $result = database::doUpdate($sql);
    return $result; 
  }
  
  public function getSpecialAdminList($options = array()){
	$sql = "SELECT *
            FROM special_admin";
    
    $result = database::doSelect($sql);
    return $result;  
  }
}