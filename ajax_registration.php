<?php
session_start();
require_once("function.php");
$_POST["name"]=ucfirst($_POST["fname"]).' '.ucfirst($_POST["lname"]);
$_POST["password"]=md5($_POST["password"]);
unset($_POST["fname"]);
unset($_POST["lname"]);
unset($_POST["cpassword"]);
$_POST["status"] = 1;
if(empty($_POST['nick_name'])) {
	$date = new DateTime();
	$timeStamp =  $date->getTimestamp();
	$_POST['nick_name'] = $timeStamp;
}

 $userInfo = getDetails(doSelect("ac_id,name,email","ambit_customer",array("email" => $_POST["email"])));
 if(empty($userInfo)){
	//$_POST["status"] = 0;
	$status=doInsert($_POST,"ambit_customer");

	 $userInfo=getDetails(doSelect("ac_id,name,email","ambit_customer",$_POST));
	 $ac_id = $userInfo[0]["ac_id"];
	 
	 $_SESSION["ac_id"]	=	$userInfo[0]["ac_id"];
	 $_SESSION["name"]  =	$userInfo[0]["name"];
		/*
		$from_email=get_site_settings(23);
		$to = $_POST["email"];
		$subject = "Login Link";


		$txt = "To login <a href='https://www.ouslet.com?email_check=checked&ac_id=".$ac_id."'>Click Here</a>. No registration confirmation possible(for buyers).";

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		//$headers .= "From:".$from_email."\r\n" ."CC:".$_POST["email"];
		$headers .= "From:".$from_email."(buyer)\r\n" ."CC:".$_POST["email"];
		mail($to,$subject,$txt,$headers);*/ 	
 }else{
 		$status = 2;
 }

/*
if($status){
	echo 1;
}else{
	echo 0;
}*/
echo $status;
?>