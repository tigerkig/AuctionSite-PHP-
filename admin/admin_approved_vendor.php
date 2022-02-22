<?php
require_once("function.php");
//print_r($_POST);
$val=seeMoreDetails("status","vendor_registration",$_POST);
if($val==0){
	$status=1;
}else{
	$status=0;
}
$s=doUpdate1("vendor_registration",array("status"=>$status),$_POST);
doUpdate1("ambit_product_add",array("status"=>$status),array("apa_vr_id"=>$_POST["vr_id"]));
if($s){
	echo 1;
}else{
	echo 0;
}
?>