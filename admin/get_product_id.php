<?php
session_start();
require_once("function.php");
$id=getDetails(doSelect("apa_id","ambit_product_add",$_POST));
if(!empty($id)){
	echo $id[0]["apa_id"];
}else{
	echo '';
}

?>