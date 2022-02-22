<?php
session_start();
require_once("function.php");
if(isset($_POST["apqa_id"])){

$status=doUpdate("ambit_pro_qustn_ans",array("answer"=>$_POST["answer"],"ans_status"=>$_POST["ans_status"]),array("apqa_id"=>$_POST["apqa_id"]));
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
?>