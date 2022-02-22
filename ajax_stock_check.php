<?php
session_start();
require_once("function.php");

$check=trim(seeMoreDetails("stock","ambit_product_add",array("apa_id"=>trim($_POST["product_id"]))));
//echo $check;
if(trim($_POST["quantity"]) <= $check){
	echo '1 || '.$check;
}else{
	echo '0 || '.$check;
}


?>