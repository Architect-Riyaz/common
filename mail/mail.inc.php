<?php
	
	// Import PHPMailer classes into the global namespace
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;


function mail_file ($to,$subject,$body){
	
	//Load composer's autoloader
	require 'vendor/autoload.php';

	// Passing `true` enables exceptions
	$mail = new PHPMailer(true);                              

try {
    //Server settings
    
    //$mail->SMTPDebug = 4;                                 // To Debug this code
    
    $mail->isSMTP();                                      	// Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  						// Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                             	// Enable SMTP authentication
    $mail->Username = 'riyaz.infantstudios@gmail.com';      // SMTP username
    $mail->Password = 'flyking2444';                        // SMTP password
    $mail->SMTPSecure = 'tls';                            	// Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    	// TCP port to connect to


    /* allow insecure connections via the SMTPOptions property introduced in PHPMailer 5.2.10
       (it's possible to do this by subclassing the SMTP class in earlier versions),
       though this is not recommended as it defeats much of the point of using a secure transport at all:
	   You can also change these settings globally in your php.ini,
	   but that's a really bad idea; 
	   PHP 5.6 made this change for very good reasons.*/
	
		$mail->SMTPOptions = array(
		    	'ssl' => array(
		        'verify_peer' => false,
		        'verify_peer_name' => false,
		        'allow_self_signed' => true
		    		)
				);

    //Recipients
    $mail->setFrom('riyaz.infantstudios@gmail.com', 'Teenpatti Team');
    $mail->addAddress($to);     // Add a recipient
    $mail->addReplyTo('riyaz.infantstudios@gmail.com', 'Teenpatti Team');

    //Attachments
 
        // $mail->addAttachment("forgotpass.jpg","forgotpass.jpg");
    
    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "$subject";
    $mail->Body    = "$body";
   /* $mail->AltBody = "$altBody";*/

    //Sending the Mail
    $mail->send();
    
    //Returning the result
    $result= 'E-Mail has been sent';
    return $result;

	} catch (Exception $e) {
    	
    	$result = "Message could not be sent. Mailer Error: $mail->ErrorInfo";
    	return $result;
	}


}
?>