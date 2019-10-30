<?php
class user{
  //Singleton
  protected static $objInstance;

  public static function get(){
    if(!isset(self::$objInstance)){
      $class=__CLASS__;
      self::$objInstance=new $class;
    }
    return self::$objInstance;
  }
  
  public function getUserList($options=array())
  {
    $sql = "SELECT *
            FROM user";
    
    $result = database::doSelect($sql);
    return $result;
  }
  
  public function getUserDetail($userId, $options=array())
  {
    $sql = "SELECT *
            FROM user
            WHERE user_id=".$userId;
    
    $result = database::doSelectOne($sql);
	unset($result['password']);
    return $result;
  }
  
  public function insertUser($options=array())
  {
    $sql = "INSERT INTO user SET "; 
    foreach($options as $key=>$value){
      $sql .= $key."='".$value."', ";
    }    
    $sql = rtrim($sql, ", ");
	  
    $result = database::doInsert($sql);
    return $result;
  }
  
  public function updateUser($userId, $options=array())
  {
    $sql = "UPDATE user SET "; 
    foreach($options as $key=>$value){
      $sql .= $key."='".$value."', ";
    }    
    $sql = rtrim($sql, ", ");
    $sql .= "WHERE user_id =".$userId;
	  
    $result = database::doUpdate($sql);
    return $result;
  }
  
  public function deleteUser($userId, $options=array())
  {
    $sql = "DELETE FROM user
            WHERE user_id = ".$userId; 
    
	  $result = database::doDelete($sql);
    return $result;
  }
  public function getUserData($email_id, $options = array()){
	$sql = "SELECT *
            FROM user
            WHERE email_id='".$email_id."'";
    
    $result = database::doSelectOne($sql);
    return $result;  
  }
  public function getUserInfo($email_id, $password, $options = array()){
	$sql = "SELECT *
            FROM user
            WHERE email_id='".$email_id."' AND password = '".$password."'";
    
    $result = database::doSelectOne($sql);
	
    return $result;  
  }
  public function insertUserWithdraw($options = array()){
	  
	$sql = "INSERT INTO user_withdraw SET "; 
    foreach($options as $key=>$value){
      $sql .= $key."='".$value."', ";
    }    
    $sql = rtrim($sql, ", ");
	  
    $result = database::doInsert($sql);
    return $result;  
  }
  
  public function getUserWithDrawDetails($user_id,$withdraw_id, $options = array()){
	 $sql = "SELECT *
            FROM user_withdraw
            WHERE user_id='".$user_id."' AND user_withdraw_id = '".$withdraw_id."'";
    
    $result = database::doSelectOne($sql);
    return $result;   
  }
  public function getUserWithdrawsList($user_id, $options = array()){
	 $sql = "SELECT *
            FROM user_withdraw
             WHERE user_id=".$user_id;
    
    $result = database::doSelect($sql);
    return $result;  
  }
  public function getAllWithdrawDetails($options = array()){
	  $finalResult = array();
	  $sql = "SELECT *
            FROM user_withdraw";
    
    $result = database::doSelect($sql);
	//get username
	foreach($result as $k => $userWithdrawInfo){
		//get user name and other details
		$userDetails =  $this->getUserDetail($userWithdrawInfo['user_id']);
		$finalResult[$k]['user_withdraw_id'] = $userWithdrawInfo['user_withdraw_id'];
		$finalResult[$k]['user_id'] = $userWithdrawInfo['user_id'];
		$finalResult[$k]['user_name'] = $userDetails['user_name'];
		$finalResult[$k]['mobile'] = $userWithdrawInfo['mobile'];
		$finalResult[$k]['account_number'] = $userWithdrawInfo['account_number'];
		$finalResult[$k]['balance_amount'] = $userDetails['amount'];
		$finalResult[$k]['withdraw_amount'] = $userWithdrawInfo['amount'];
		$finalResult[$k]['date'] = $userWithdrawInfo['date'];
		$finalResult[$k]['withdraw_status'] = $userWithdrawInfo['withdraw_status'];
		
	}
	
    return $finalResult;  
  }
  
  public function getDayBonusPoints($day_name, $options = array()){
	$sql = "SELECT *
            FROM daily_bonus
             WHERE day_name='".$day_name."'";
    
    $result = database::doSelectOne($sql);
    return $result;  
  }
  
  public function addBonus($options = array()){
	$sql = "INSERT INTO daily_bonus SET "; 
    foreach($options as $key=>$value){
      $sql .= $key."='".$value."', ";
    }    
    $sql = rtrim($sql, ", ");
	  
    $result = database::doInsert($sql);
    return $result;    
  }
  
  public function getBonusList($options = array()){
	$sql = "SELECT *
            FROM daily_bonus";
    
    $result = database::doSelect($sql);
    return $result;  
  }
  public function getUserLevelDetails($amount, $options = array()){
	$sql = "SELECT * 
			FROM level_info 
			WHERE ".$amount." BETWEEN start_range AND end_range";
    
    $result = database::doSelectOne($sql);
    return $result;    
  }
  
}