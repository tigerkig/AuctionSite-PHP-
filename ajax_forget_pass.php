<?php
session_start();
require_once("function.php");
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
$_POST["status"]=1;
$data=loginCheck(doSelect("*","ambit_customer",$_POST));
if(!empty($data)){
$password = random_password(8);
$mdpassword = md5($password);
$data2=doUpdate("ambit_customer",array('password'=>$mdpassword),array('email'=>$_POST['email']));
$to = $_POST["email"];
$subject = "New Password";
$txt = "Your new password: ".$password;
$headers = "From: " . get_site_settings(23) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to,$subject,$txt,$headers);
echo 'Please check your email';
}
else{
echo 'Wrong email';
}
?>