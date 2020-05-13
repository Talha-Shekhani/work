<?php
	$owner_email = "talhats309@gmail.com";
	$from = $_POST["email"];
	$pswd = $_POST['pswd'];
	$subject = 'A message from CETechnologys visitor ' . $_POST["name"];
	$messageBody = "";
	
	if($_POST['name']!=null){
		$messageBody .= '<p>Visitor: ' . $_POST["name"] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['email']!=null){
		$messageBody .= '<p>Email Address: ' . $_POST['email'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}else{
		$headers = '';
	}
	// if($_POST['state']!='nope'){		
	// 	$messageBody .= '<p>State: ' . $_POST['state'] . '</p>' . "\n";
	// 	$messageBody .= '<br>' . "\n";
	// }
	if($_POST['phone']!=null){		
		$messageBody .= '<p>Phone Number: ' . $_POST['phone'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}	
	// if($_POST['fax']!='nope'){		
	// 	$messageBody .= '<p>Fax Number: ' . $_POST['fax'] . '</p>' . "\n";
	// 	$messageBody .= '<br>' . "\n";
	// }
	
	if($_POST['message']!= null){
		$messageBody .= '<p>Message: ' . $_POST['message'] . '</p>' . "\n";
	}

require_once('./PHPMailer/PHPMailerAutoload.php');

// require '../vendor/autoload.php';
$mail = new PHPMailer();
$mail->isSMTP();
// $mail->SMTPAuth();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->isHTML();
// $mail->SMTPAuth = true;
$mail->Username = $from;
//Password to use for SMTP authentication
$mail->Password = $pswd;
//Set who the message is to be sent from
$mail->setFrom($from, $_POST["name"]);
$mail->Subject = 'PHPMailer GMail SMTP test';
$mail->Body = $messageBody;
$mail->addAddress("hasnainshoaib45@gmail.com", "Hasnain");
if (!$mail->send()) {
	header("Location: /index-5.html?mail=fail");
    // echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
	header("Location: /index-5.html?mail=sent");
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

?>