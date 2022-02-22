<?php
session_start();
require_once("function.php");
$_POST["password"]=md5($_POST["password"]);
$_POST["status"]=1;
$check=getDetails(doSelect("email,vr_id","vendor_registration",$_POST));
if(!empty($check)){
	foreach($check as $k=>$v){
		$_SESSION["vendor_email"]=$v["email"];
		$_SESSION["vendor_id"]=$v["vr_id"];
	}
	echo 1;
}else{
	echo 0;
}

?>