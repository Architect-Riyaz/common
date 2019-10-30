<?php 
include_once(dirname(dirname(dirname(__FILE__)))."/include/config.php");

$action = $_REQUEST['action'];


	if($action == "getSubTopics"){
		
		$topic_name = $_REQUEST['topicname'];
		$result=array();
	
		
		$getSubTopics=mysql_query("SELECT DISTINCT sub_topic,topic_id
					            FROM topics
					            WHERE topic_name='".$topic_name."'
					            ORDER BY sub_topic ASC" ) or die(mysql_error());
		
		if (empty($getSubTopics)) { 
	    
	                    				$result=["No data found"];
				                  	 }
				                    else{
				                    	
				                    	while($subTopics = mysql_fetch_array($getSubTopics)){
				                    		
				                    		$result[$subTopics['topic_id']] = $subTopics['sub_topic'];
				                    		
				                    	
				                    	}
				                    }
			 
		echo json_encode($result);
	}

	if ($action == "getData") {
		
		$sub_topics = $_REQUEST['sub_topics'];

		$getData=mysql_query("SELECT content
					            FROM topics
					            WHERE sub_topic='".$sub_topics."'");

		if (empty($getData)) {
			$getData = "No data found";
			echo $getData;
		}
		else{
			
			$resultContent = mysql_fetch_array($getData);
	
			}

		echo $resultContent['content'];

	}
	if ($action == "addUser"){
	$php_username =  $_REQUEST['user_name'];
	$php_phone =  $_REQUEST['phone_no'];
	$php_email_id =  $_REQUEST['email_id'];
	$php_password =  $_REQUEST['password'];
	$php_updated_at = date('Y-m-d H:i:s', time()) ;

	$checkPhone  = mysql_query("SELECT phone_no FROM user WHERE phone_no ='$php_phone'") or die(mysql_error());
	
			$resultPhone = mysql_fetch_array($checkPhone);
			echo $resultPhone['phone_no'];
			if ($resultPhone['phone_no'] == $php_phone ) {
				echo "Failed";
			}
			else{
				mysql_query("INSERT INTO user(user_name, phone_no, email_id, password, updated_at) 
								VALUES ('$php_username','$php_phone','$php_email_id','$php_password','$php_updated_at')") 
								or die(mysql_error());
				echo "success";
			}

	}

	
if ($action == "checkUpdateTopic") {
		
	$phone_no = $_REQUEST['userTextBox']; 
	$topic_name = $_REQUEST['topicTextBox'];
	$textData = $_REQUEST['textData'];
	$subtopicsTextbox = $_REQUEST['subtopicsTextbox'];
	$php_updated_at = date('Y-m-d H:i:s', time()) ;

	//checking phone no exist or not

		$getUserID =mysql_query("SELECT * FROM user WHERE phone_no='$phone_no'") or die(mysql_error());
		$new = mysql_fetch_array($getUserID);

		if (empty($new['user_id'])) {
			echo "Phone No not Exist";
		}else{
		$user_id=$new['user_id'];
		$chkTopic  = mysql_query("SELECT * FROM topics WHERE topic_name='$topic_name'") or die(mysql_error());
		$chkSubTopic  = mysql_query("SELECT * FROM topics WHERE sub_topic='$subtopicsTextbox'") or die(mysql_error());
		$finalChkTopic = mysql_fetch_array($chkTopic);
		$finalChkSubTopic = mysql_fetch_array($chkSubTopic);

			if (empty($finalChkTopic['topic_id']) || empty($finalChkSubTopic['topic_id'])){
				mysql_query("INSERT INTO topics(topic_name, sub_topic, content, updated_at)
							 VALUES ('$topic_name','$subtopicsTextbox','$textData','$php_updated_at');") or die(mysql_error());
				$getTopicsID =mysql_query("SELECT topic_id FROM topics WHERE sub_topic='$subtopicsTextbox'") or die(mysql_error());
				$confirmTopicID=mysql_fetch_array($getTopicsID);
				$finalChkTopicID=$confirmTopicID['topic_id'];
				mysql_query("INSERT INTO userdata( user_id, topic_id, updated_at) 
								VALUES ($user_id,$finalChkTopicID,'$php_updated_at')");
								echo "Data added Successfully";	
			}

			else {
				$topic_id=mysql_query("SELECT topic_id FROM topics WHERE sub_topic='$subtopicsTextbox'");
				$confirmTopicId=mysql_fetch_array($topic_id);
				
				$lastChkTopicID=$confirmTopicId['topic_id'];
				
				mysql_query("UPDATE topics SET topic_name='$topic_name',
					sub_topic='$subtopicsTextbox',content='$textData',
					updated_at='$php_updated_at' WHERE topic_id =$lastChkTopicID");
						echo "Data updated Successfully";	
			}
		}

	}
		
	
if ($action == "deleteUser") {

	$user_id = $_REQUEST['user_id'];
	
	mysql_query("DELETE FROM user where user_id =".$user_id  ) or die(mysql_error());
	mysql_query("DELETE FROM userdata where user_id =".$user_id ) or die(mysql_error());
			echo "deleted";
}

if ($action == "getUserTopics") {
	
	$username = $_REQUEST['phone_no'];
	$getUserID = mysql_query("SELECT user_id FROM user WHERE phone_no = '$phone_no'") or die(mysql_error());
	$getTopicsID = mysql_query("SELECT * from userdata where user_id =".$getUserID['user_id']) or die(mysql_error());
	$getSubtopics = mysql_query("SELECT * from sub_topic where user_id =".$getUserID['user_id']) or die(mysql_error());

}



?>