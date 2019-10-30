<?php 
class genralFunctions{
	public function sendMail($to_mail,$subject,$message_content,$from_mail){
	
		$to = $to_mail;
		$subject = $subject;
		$message="<html>
		<head>		
		</head>
		<body>
			<div style='width: 700px;font-size: 14px; font-weight: bold;padding-left: 10px'>
			". $message_content ."			
				<div>
				Thank you,<br/>
				Mobiesprits Leave Sysytem
			</div>
			</div>
		</body>
		</html>";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

		// More headers
		$headers .= 'From: '.$to_mail . "\r\n";
		mail($to,$subject,$message,$headers);
	}
}

?>