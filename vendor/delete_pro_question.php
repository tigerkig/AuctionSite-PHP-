<?php
require_once("function.php");
$status=doDelete("ambit_pro_qustn_ans",$_POST);

if($status){
	echo 1;
}else{
	echo 0;
}
?>