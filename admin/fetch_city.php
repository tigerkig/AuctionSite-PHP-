<?php
require_once("function.php");
if(isset($_REQUEST["cn_id"]) && $_REQUEST["cn_id"]!=""){
//fetch city
$query=doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$_REQUEST["cn_id"]));
$city=getDetails($query);
//end fetch city
?>
<!-- <option value="">Select City</option> -->
<?php
foreach ($city as $k => $v) {
	# code...
	echo '<option value="'.$v["ct_id"].'">'.ucfirst($v["ct_name"]).'</option>';
}
}

?>