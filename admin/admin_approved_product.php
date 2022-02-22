<?php
require_once("function.php");
//print_r($_POST);
$val=seeMoreDetails("status","ambit_product_add",$_POST);
if($val==0){
	$status=1;
}else{
	$status=0;
}
$s=doUpdate1("ambit_product_add",array("status"=>$status),$_POST);
//doUpdate1("ambit_product_image",array("status"=>$status),array("api_apa_id"=>$_POST["apa_id"]));
if($s){
	echo 1;
}else{
	echo 0;
}
?>