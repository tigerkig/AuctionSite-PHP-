<?php
require_once("function.php");
//print_r($_POST);
$val=seeMoreDetails("status","ambit_customer",$_POST);
if($val==0){
	$status=1;
}else{
	$status=0;
}
$s=doUpdate1("ambit_customer",array("status"=>$status),$_POST);
if($s){
	echo 1;
}else{
	echo 0;
}
?>