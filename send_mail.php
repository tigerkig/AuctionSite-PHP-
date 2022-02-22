<?php
require_once("function.php");
$site_mail=get_site_settings(23);
$to =$site_mail;
$sender = $_POST["email"];
$name = $_POST["name"];
$subject ='Enquiry';
//$txt =$_POST["enquiry"];
$txt = 'Name: '.$name . "\r\n" .
	'Email: '. $sender . "\r\n" .
	'Message: '.$_POST["enquiry"];
//$headers = "From:".$_POST["email"]. "\r\n" ."CC: ".$site_mail;
//$staus=mail($to,$subject,$txt,$headers);

$headers = 'From: '.$site_mail . "\r\n" .
    'Reply-To: '.$sender . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$staus=mail($to, $subject, $txt, $headers);



if($staus){
	echo 1;
}else{
	echo 0;
}

?>