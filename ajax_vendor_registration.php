<?php
require_once("function.php");
unset($_POST["cpassword"]);
$image='vendor.png';
if($_FILES["image"]["name"]!='' && $_FILES["image"]["error"]==0){
	$image=time().$_FILES["image"]["name"];
	$_POST["image"]=$image;
	$tmp_name=$_FILES["image"]["tmp_name"];
	move_uploaded_file($tmp_name,'vendor/vendor_image/'.$image);
}
$_POST["image"]=$image;
$_POST["password"]=md5($_POST["password"]);

//$_POST["status"] = 1;
$_POST["status"] = 0;

//-------------------------------------------
//2021.03.16
$country = $_POST["country"];
$country_info = getDetails(doSelect("cn_id,cn_name","ambit_country",array("cn_name"=>$country)));
$_POST["country"] = $country_info[0]["cn_id"];


$city	= $_POST["city"];
// $city_info = getDetails(doSelect("ct_id,ct_cn_name,ct_name","ambit_city",array("ct_name"=>$city)));
$city_info = getDetails(doSelect("ct_id,ct_cn_id,ct_name","ambit_city",array("ct_name"=>$city)));
  	if($city_info == NULL){
		$status=doInsert(array("ct_cn_id"=>$_POST["country"],"ct_name"=>$city),"ambit_city");
		$city_info = getDetails(doSelect("ct_id,ct_cn_id, ct_name","ambit_city",array("ct_name"=>$city)));
	}
$_POST["city"] = $city_info[0]["ct_id"];
//-------------------------------------------

$status=doInsert($_POST,"vendor_registration");
$recent_id=newly_insert_id();

if($status){
	doInsert(array("avb_vr_id"=>$recent_id,"balance"=>0),"ambit_vendor_balance");

	$date=date("Y-m-d h:i:s");
	$expire=date('Y-m-d h:i:s', mktime(date('h'),date('i'),date('s'),date('m'),date('d')+30,date('Y')));
	$pkg_id=seeMoreDetails("p_id","ambit_membership",array("price"=>'0'));
	
	if($pkg_id!=''){
		doInsert(array("abp_p_id"=>$pkg_id,"abp_u_id"=>$recent_id,"abp_price"=>'0',"paid"=>'0',"status"=>'Pass',"expire"=>$expire,"abp_buy_date"=>$date),"ambit_buy_package");
	}



	 $vendorInfo=getDetails(doSelect("vr_id,email","vendor_registration",$_POST));
	 $vr_id = $vendorInfo[0]["vr_id"];
		
	$from_email=get_site_settings(23);
	$to = $_POST["email"];
	$subject = "Login Link";

	//$txt = "To login <a href='http://ouslet.com/vendor?email_check=checked&vr_id=".$vr_id."'>Click Here</a>. No registration confirmation possible(for buyers).";
	$txt = "To login <a href='https://www.ouslet.com/vendor?email_check=checked&vr_id=".$vr_id."'>Click Here</a>. After confirming your email address, you will be redirected to the Ouslet auction platform. Here you can log in to your client account.";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	$headers .= "From:".$from_email."(sellers)\r\n" ."CC:".$_POST["email"];
	mail($to,$subject,$txt,$headers);
		echo 1;
}else{
	echo 0;
}
?>