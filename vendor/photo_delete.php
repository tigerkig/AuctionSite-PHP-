<?php
require_once("function.php");
if(isset($_POST["api_id"])){
	$image=seeMoreDetails("image","ambit_product_image",$_POST);
	if(file_exists("product_photo/".$image)){
unlink("product_photo/".$image);
}
	$status=doDelete("ambit_product_image",$_POST);
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
?>