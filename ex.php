<?php 
$number = cal_days_in_month(CAL_GREGORIAN, 11, 2015); 
//echo $number;
$holidaysArray = array();
$sundaysArray = array();
$abscentArray = array();
$leavesArray = array();

for($i=1;$i<$number;$i++){
	$date = "2015-10-".$i;	
	$dayname=date('l', strtotime($date));
	if($dayname == "Sunday"){
		$sundaysArray[] = $date;
	}else{
	}
	
	
}

$str ="05-12-1990";
//echo date('Y-m-d',strtotime($str));
?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 <?php 
$con = mysql_connect("localhost","root","admin123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_query('SET character_set_results=utf8');
mysql_query('SET names=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_results=utf8');
mysql_query('SET collation_connection=utf8_general_ci');

mysql_select_db('church_list_app',$con);

$nith = "CREATE TABLE IF NOT EXISTS `TAMIL` (
  `data` varchar(1000) character set utf8 collate utf8_bin default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

if (!mysql_query($nith,$con))
{
  die('Error: ' . mysql_error());
}

$nithi = "INSERT INTO TAMIL VALUES ('ಹೇಗೆ ನೀವು ಮಾಡುತ್ತಿರುವ')";

if (!mysql_query($nithi,$con))
{
  die('Error: ' . mysql_error());
}

$result = mysql_query("SET NAMES utf8");//the main trick
$cmd = "select * from TAMIL";
$result = mysql_query($cmd);
while($myrow = mysql_fetch_row($result))
{
    echo ($myrow[0]);
}
?>
					