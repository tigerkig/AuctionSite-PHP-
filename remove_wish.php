<?php
require_once("function.php");
$status=doDelete("ambit_add2wish",$_POST);
if($status){
	echo 1;
}
?>