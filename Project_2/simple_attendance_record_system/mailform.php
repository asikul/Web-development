<?php

$message = $_POST['message'];

$message= "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head><meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
  
  <title>PHPMailer Test</title>
</head>
<body>
<div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'>
  <div align='center'>
			. $message .
  </div>
</div>
</body>
</html>";

echo $message;
//exit();

$to = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];
//$from = $_POST['from'];
//$fromname = $_POST['fromname'];
$from = $_POST['from']. "," .$_POST['fromname'];
$replyto = $_POST['replyto'];
// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'Content-Transfer-Encoding: base64' . "\r\n";

// More headers
$array = array($to);

$bcc = implode(",", $array);
//echo $from;
//exit();
//echo $bcc;
//exit();

$headers .= 'From: <'.$from.'>' . "\r\n" . 'Reply-To:'.($replyto) . "\r\n"  . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();;
$headers .= 'BCC: '. $bcc . "\r\n";
mail('',$subject,$message,$headers);

require 'PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom($from, $fromname);
//Set an alternative reply-to address
$mail->addReplyTo($replyto);
//Set who the message is to be sent to
$mail->addAddress($to);
//Set the subject line
$mail->Subject = 'PHPMailer mail() test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = $message;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?> 