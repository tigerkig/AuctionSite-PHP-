<?php
require_once("function.php");
//print_r($_POST);
$val=seeMoreDetails("admin_status","ambit_agent_properties",$_POST);
if($val==0){
	$status=1;
}else{
	$status=0;
}
$s=doUpdate1("ambit_agent_properties",array("admin_status"=>$status),$_POST);
if($s){
	echo 1;
}else{
	echo 0;
}
?>