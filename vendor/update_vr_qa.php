<?php
session_start();
require_once("function.php");
if(isset($_POST["avqa_id"])){

$status=doUpdate("ambit_vendor_qustn_ans",array("answer"=>$_POST["answer"],"ans_status"=>$_POST["ans_status"]),array("avqa_id"=>$_POST["avqa_id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
?>