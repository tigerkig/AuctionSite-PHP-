<?php
session_start();
require_once("function.php");

if(isset($_SESSION["ac_id"])){
		
	/*$posting_type =  seeMoreDetails("posting_type","ambit_product_add",array("apa_id"=>$_POST["product_id"]));
	if($posting_type == 0){*/
		$field=array("aaw_apa_id"=>$_POST["product_id"],"aaw_ac_id"=>$_SESSION["ac_id"]);
		doInsert($field,'ambit_add2wish');	
	/*}*/

	$wish_count=getDetails(doSelect1("*","ambit_add2wish",array("aaw_ac_id"=>$_SESSION["ac_id"])));

	echo 'Wish List ('.count($wish_count).')';
}
?>