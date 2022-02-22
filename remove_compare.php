<?php
session_start();
if(isset($_SESSION["compare"])){
	if(isset($_POST["msg"]) && $_POST["msg"]=='all'){
	unset($_SESSION["compare"]);
	}
	
	if(isset($_POST["msg"]) && $_POST["msg"]=='one'){
	$compare=explode("||",$_SESSION["compare"]);
	unset($compare[$_POST["id"]]);
	$a=count($compare);
	echo $a;
	$compare=implode("||",$compare);
	if($a > 0){
	$_SESSION["compare"]=$compare;
	}else{
		unset($_SESSION["compare"]);
	}
	}
	
}

?>