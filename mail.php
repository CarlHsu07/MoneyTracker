<?php
// include("E:/AppServ/www/PHPMailer/_lib/class.phpmailer.php");
mb_internal_encoding('UTF-8');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->CharSet ="utf8";

$mail->Username = "";
$mail->Password = "";

$mail->From ="";
$mail->FromName= "";

$$mail->Subject = "PHPMailer: test email! ";
$mail->Body = "Hello, this is a test email! ";

$mail->IsHTML(true);
$mail->AddAddress("","");

if(!$mail->Send())
{ 
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}
else
{ echo "message sent!" ; }
?>