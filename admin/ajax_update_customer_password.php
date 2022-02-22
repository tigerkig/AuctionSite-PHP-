<?php
session_start();
require_once("function.php");
$password=trim($_POST["new_password"]);

$_POST["new_password"]=md5(trim($_POST["new_password"]));

$status=doUpdate("ambit_customer",array("password"=>$_POST["new_password"]),array("ac_id"=>trim($_POST["ac_id"]),"email"=>trim($_POST["email"])));
if($status){
	echo 1;
	if(trim($_POST["type"])==1){
			$to =$_POST["email"];
			$subject ='Change Password !';
			$txt ='Your new password is : '.$password;
			$headers = "From: ".get_site_settings(23). "\r\n" ."CC: ".$to;
			$status=mail($to,$subject,$txt,$headers);
	}
}else{
	echo 0;
}
?>