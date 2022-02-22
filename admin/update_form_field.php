<p>For ajax</p>

<?php
echo '||';
require_once("function.php");

//Add Country
if(isset($_POST["msg"]) && $_POST["msg"]=='add_furnish'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_furnish_status");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Update Country
if(isset($_POST["msg"]) && $_POST["msg"]=='update_furnish'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_furnish_status",$_POST,array("afs_id"=>$_POST["afs_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Delete Country
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_furnish_status'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_furnish_status",$_POST);
	//doDelete("ambit_city",array("ct_cn_id"=>$_POST["cn_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Add City
if(isset($_POST["msg"]) && $_POST["msg"]=='add_pro_sub_cat'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_sub_property");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}


//Update City
if(isset($_POST["msg"]) && $_POST["msg"]=='update_pro_sub_cat'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_sub_property",$_POST,array("asp_id"=>$_POST["asp_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Delete City
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_pro_sub_cat'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_sub_property",$_POST);
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//For Possesion
if(isset($_POST["msg"]) && $_POST["msg"]=='add_possesion'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_possession_status");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}
if(isset($_POST["msg"]) && $_POST["msg"]=='update_possesion'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_possession_status",$_POST,array("aps_id"=>$_POST["aps_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=='delete_possesion'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_possession_status",$_POST);
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//For Property Type



if(isset($_POST["msg"]) && $_POST["msg"]=='add_property'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_property_for");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}
if(isset($_POST["msg"]) && $_POST["msg"]=='update_property'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_property_for",$_POST,array("apf_id"=>$_POST["apf_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=='delete_property'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_property_for",$_POST);
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//For Property Category


if(isset($_POST["msg"]) && $_POST["msg"]=='add_property_cat'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_property_type");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}
if(isset($_POST["msg"]) && $_POST["msg"]=='update_property_cat'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_property_type",$_POST,array("apt_id"=>$_POST["apt_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=='delete_property_cat'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_property_type",$_POST);
	doDelete("ambit_sub_property",array("asp_apt_id"=>$_POST["apt_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}
?>


<p>For ajax</p>