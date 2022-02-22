<?php
require_once("function.php");

date_default_timezone_set("America/Chicago");
$_POST["datetime"] =  date("Y-m-d H:i:s");


$best_id = seeMoreDetails("best_id", "best_story", array("best_id" => $_POST["best_id"]));
if(!empty($best_id)){
		
	if($_POST["action"] == "add_best_story" ){
		unset($_POST["action"]);
		$status =doUpdate("best_story",$_POST, array("best_id"=>$_POST["best_id"]));
	}

	if($_POST["action"] == "update_best_story" ){
		unset($_POST["action"]);
		$status =doUpdate("best_story",$_POST, array("best_id"=>$_POST["best_id"]));
	}

	if($_POST["action"] == "delete_best_story" ){
		unset($_POST["action"]);
		$_POST['comment'] = '';
		$status =doUpdate("best_story",$_POST, array("best_id"=>$_POST["best_id"]));
	}
}else{
	$status = 2;
}

echo $status;
/*if($s){
	echo 1;
}else{
	echo 0;
}*/
?>