<?php
require_once("function.php");
//print_r($_POST);
$val=seeMoreDetails("status","ambit_product_review",$_POST);
if($val==0){
	$status=1;
}else{
	$status=0;
}
$s=doUpdate1("ambit_product_review",array("status"=>$status),$_POST);
if($s){
	echo 1;
}else{
	echo 0;
}
?>