<?php
require_once("function.php");

$best_name = '';
switch($_POST["best_id"]){
	case 1:
		$best_name = "Best story #1"; break;
	case 2:
		$best_name = "Best story #2"; break;
	case 3:
		$best_name = "Best story #3"; break;		
}

$_POST['name'] = $best_name;

$funney_story = seeMoreDetails("description", "ambit_product_add", array("apa_id" => $_POST["apa_id"]));

$_POST['comment'] = $funney_story;
											

date_default_timezone_set("America/Chicago");
$_POST["datetime"] =  date("Y-m-d H:i:s");

$val_apa  = getDetails(doSelect1("best_id, apa_id, apr_id", "best_story", array("apa_id" => $_POST["apa_id"])));
$val_best = getDetails(doSelect1("best_id, apa_id, apr_id", "best_story", array("best_id" => $_POST["best_id"])));


if(empty($val_apa)){
	if(!empty($val_best)){
		$s = doDelete("best_story", array("best_id" => $_POST["best_id"], "apa_id" => $val_best[0]["apa_id"]));
	}
	$s=doInsert($_POST, "best_story");

}else{
	if(!empty($val_best)){
		$s = doDelete("best_story", array("best_id" => $_POST["best_id"], "apa_id" => $val_best[0]["apa_id"]));
	}
	$s=doUpdate("best_story",$_POST, array("apa_id"=>$_POST["apa_id"]));
}

if($s){
	echo 1;
}else{
	echo 0;
}
?>