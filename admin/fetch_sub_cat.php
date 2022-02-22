<?php
require_once("function.php");
if(isset($_REQUEST["psc_pc_id"]) && $_REQUEST["psc_pc_id"]!=""){
//fetch city
$query=doSelect("psc_pc_id,psc_id,psc_name","product_sub_category",array("psc_pc_id"=>$_REQUEST["psc_pc_id"]));
$sub_cat=getDetails($query);
//end fetch city
?>
<!-- <option value="">Select City</option> -->
<?php
foreach ($sub_cat as $k => $v) {
	# code...
	echo '<option value="'.$v["psc_id"].'">'.ucfirst($v["psc_name"]).'</option>';
}

}


if(isset($_REQUEST["pssc_psc_id"]) && $_REQUEST["pssc_psc_id"]!=""){
//fetch city
$query=doSelect("pssc_id,pssc_name","product_sub_sub_cat",array("pssc_psc_id"=>$_REQUEST["pssc_psc_id"]));
$sub_sub_cat=getDetails($query);
//end fetch city
?>
<!-- <option value="">Select City</option> -->
<?php
foreach ($sub_sub_cat as $k => $v) {
	# code...
	echo '<option value="'.$v["pssc_id"].'">'.ucfirst($v["pssc_name"]).'</option>';
}

}

?>