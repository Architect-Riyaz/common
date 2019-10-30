<?php
include_once("../admin/include/config.php");


function decodeToken($validateToken){
    //including JWT
    require_once("../library/queryLib/jwt.lib.php");
    $usertoken = JWT::decode($validateToken , 'Lakshmi_Sudha');
    return $usertoken;
  }

$action = $_REQUEST['action'];
$uDate = date('Y-m-d H:i:s');

if ($action = 'validateToken') {
  $validateToken = urldecode($_REQUEST['token']);
  $validateTokenStatus =  decodeToken($validateToken);
  $cDate = time();  
  /*print_r($validateTokenStatus);*/

  if (!isset($validateTokenStatus->exp) || !isset($validateTokenStatus->email_id) || $cDate > $validateTokenStatus->exp || $cDate < $validateTokenStatus->nbf ){
      echo "Token Expired";
  }else{
    echo $validateTokenStatus->email_id;
  }

}

?>
