<?php
require_once("function.php");
$status=doDelete("ambit_product_review",$_POST);
if($status){
	echo 1;
}else{
	echo 0;
}

?>