<?php 
include_once(dirname(dirname(__FILE__))."/include/config.php");
$action = $_REQUEST['action'];
$cDate = date('Y-m-d H:i:s');


if($action == "addAdmin"){
	$admin_user_name = $_REQUEST['admin_user_name'];
	$admin_password = $_REQUEST['admin_password'];
	//echo "INSERT INTO admin(username,password,role,created_at,status) VALUES('".$admin_user_name."','".$admin_password."','user','".$cDate."','1')";
	mysql_query("INSERT INTO admin(username,password,role,created_at,status) VALUES('".$admin_user_name."','".$admin_password."','user','".$cDate."','1')") or die(mysql_error());
	echo "admin added successfully";
}


if($action == "deleteOfferNews")
{
	$news_id = $_REQUEST['news_id'];
	mysql_query("DELETE FROM offer_news WHERE offer_news_id='".$news_id."'") or die(mysql_error());
	echo "news deleted successfully";
}
if($action == "deleteFeedNews")
{
	$news_id = $_REQUEST['news_id'];
	mysql_query("DELETE FROM feed_news WHERE feed_news_id='".$news_id."'") or die(mysql_error());
	echo "news deleted successfully";
}

if($action == "deleteAdmin"){
	$admin_id=$_REQUEST['admin_id'];

	mysql_query("DELETE FROM admin WHERE admin_id=".$admin_id) or die(mysql_error());
	echo "Admin deleted successfully";
}
if($action == "getMembersData"){
	$admin_id = $_REQUEST['admin_id'];
	$member_language = $_REQUEST['member_language'];
	
	//echo $member_language;
	//$getMembersList = mysql_query("SELECT * FROM member WHERE admin_id='".$admin_id."' AND language='".$member_language."'") or die(mysql_error());
	if($member_language != 0 && $member_language != -1){
		$url = StaticData::domain_name.'?methodName=members.list&admin_id='.$admin_id."&member_language=".$member_language;
	}else{
		$url = StaticData::domain_name.'?methodName=members.list&admin_id='.$admin_id;
	}
	//echo $url;
	$ch2 = curl_init($url);
	curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);									
	curl_setopt($ch2, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 5);
	//execute post
	$membersListArray = curl_exec($ch2);
	//print_r($merchantCategoryDetails);
	$getMembersListArray = json_decode($membersListArray,true);
	//print_r($merchantCategoryData);
	if($getMembersListArray['responseCode'] ==  001){
		$membersList = $getMembersListArray['responseMsg'];
		//print_r($membersList);
	}
	$i = 1;
	//echo "<b>Total Members Count : ".count($membersList)."</b><br/><br/>";
	?>
	
	   <?php
		foreach($membersList as $memberInfo){
			//get admin name
			$getAdminData = mysql_query("SELECT * FROM admin WHERE admin_id='".$memberInfo['admin_id']."'") or die(mysql_error());
			$adminInfo = mysql_fetch_array($getAdminData);
			$language_id = $memberInfo['language'];
			//get language name
			$languageDetails = mysql_query("SELECT * FROM app_language WHERE app_language_id='".$language_id."'") or die(mysql_error());
			$languageInfo = mysql_fetch_array($languageDetails);
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $adminInfo['username']?></td>
				<td><?php echo $memberInfo['member_name']?></td>
				<td><?php echo $memberInfo['member_mobile']?></td>
				<td><?php echo $languageInfo['language_name'];?></td>
				<td>Edit</td>
				<td>Delete</td>					
			</tr>
		
<?php
	$i++;
		}
?>
</tbody>
	


<?php
	
}
if($action == "getAdminOffersList"){
	$admin_id = $_REQUEST['admin_id'];
	//echo $member_language;
	//$getMembersList = mysql_query("SELECT * FROM member WHERE admin_id='".$admin_id."' AND language='".$member_language."'") or die(mysql_error());
	
		$url = StaticData::domain_name.'?methodName=get.adminOffers&admin_id='.$admin_id;
	
	//echo $url;
	$ch2 = curl_init($url);
	curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);									
	curl_setopt($ch2, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 5);
	//execute post
	$adminOffersListArray = curl_exec($ch2);
	//print_r($merchantCategoryDetails);
	$getAdminOffersListArray= json_decode($adminOffersListArray,true);
	//print_r($merchantCategoryData);
	if($getAdminOffersListArray['responseCode'] ==  001){
		$adminOffersList = $getAdminOffersListArray['responseMsg'];
		//print_r($membersList);
	}
	$i = 1;
	echo "<b>Total Sent Offers Count : ".count($adminOffersList)."</b><br/><br/>";
	?>
	
	<table id="example1" class="table table-striped">
	  <thead>
		  <tr>
			  <th>S.No</th>
			  <th>Admin name</th>
			  <th>Message</th>					 				 
			  <th>Image</th>					 				 
			  <th>Link</th>		 				 
			  <th>Members Data</th>		 				 
			  <th>Edit</th>		 				 
			  <th>Delete</th>					  
		  </tr>
	  </thead>
	   <tbody>
	   <?php
		foreach($adminOffersList as $offersInfo){
			
			//get admin name
			$getAdminData = mysql_query("SELECT * FROM admin WHERE admin_id='".$offersInfo['admin_id']."'") or die(mysql_error());
			$adminInfo = mysql_fetch_array($getAdminData);
			//get language name
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $adminInfo['username']?></td>
				<td><?php echo $offersInfo['message']?></td>
				<td><img src="<?php echo $offersInfo['image']?>" width="50%" height="50%"></img></td>
				<td><?php echo $offersInfo['link']?></td>
				<td><a href="#" onclick="getMemberDetails('<?php echo $offersInfo['admin_offer_id'];?>')">Members List</a></td>
				<td>Edit</td>
				<td>Delete</td>					
			</tr>
		
<?php
	$i++;
		}
?>
</tbody>
	</table>


<?php
	
}
if($action == "getMembersinfo"){
	$admin_offer_id = $_REQUEST['admin_offer_id'];
	$getAdminOfferDetails = mysql_query("SELECT * FROM admin_offer WHERE admin_offer_id='".$admin_offer_id."'") or die(mysql_error());
	$adminOfferDetails = mysql_fetch_array($getAdminOfferDetails);
	$membersArray = explode(',',$adminOfferDetails['member_ids']);
	
?>
<h3><b><u>Member Details</u></b></h3>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Member Name</th>
				<th>Member Mobile</th>
				<th>Language</th>
			</tr>
		<thead>
		<tbody>
<?php
	
	for($i = 0; $i<count($membersArray);$i++){
		$mem_id = $membersArray[$i];
		//get member info
		$getMemberDetails = mysql_query("SELECT * FROM member WHERE member_id='".$mem_id."'") or die(mysql_error());
		$memberInfo = mysql_fetch_array($getMemberDetails);
		$lang_id = $memberInfo['language'];
		//get language name
		$getLanguageDetails = mysql_query("SELECT * FROM app_language WHERE app_language_id='".$lang_id."'") or die(mysql_error());
		$languageInfo = mysql_fetch_array($getLanguageDetails);
	
	?>	
		<tr>
			<td><?php echo $memberInfo['member_name']; ?></td>
			<td><?php echo $memberInfo['member_mobile']; ?></td>
			<td><?php echo $languageInfo['language_name']; ?></td>
		</tr>
	<?php
	}
	?>
		</tbody>
	</table>
<?php
}
	
?>