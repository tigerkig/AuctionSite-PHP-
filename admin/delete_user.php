<?php
require_once("function.php");
//print_r($_POST);
$prev_image=seeMoreDetails("profile_image","ambit_agent_sign_up",$_POST);
$s=doDelete("ambit_agent_sign_up",$_POST);
if($s){
if(file_exists("../agent_image/".$prev_image)){
unlink("../agent_image/".$prev_image);
}
}
$pro_id=getDetails(doSelect("aap_id","ambit_agent_properties",array("aap_agnt_id"=>$_POST["aasp_id"])));
doDelete("ambit_agent_properties",array("aap_agnt_id"=>$_POST["aasp_id"]));
if(!empty($pro_id)){
	foreach($pro_id as $k=>$v){
		doDelete("ambit_agent_sign_up",array("aap_id"=>$v["aap_id"]));
		doDelete("ambit_properties_features",array("apfe_aap_id"=>$v["aap_id"]));
		doDelete("ambit_properties_avlbilty",array("apav_aap_id"=>$v["aap_id"]));
		doDelete("ambit_properties_area",array("apa_aap_id"=>$v["aap_id"]));
		$photo=getDetails(doSelect("app_photo","ambit_properties_photos",array("app_aap_id"=>$v["aap_id"])));
		if(!empty($photo)){
		foreach($photo as $k1=>$v1){
		if(file_exists("../properties_photo/".$v1["app_photo"])) {
unlink("../properties_photo/".$v1["app_photo"]);
}	
		}	
		}
		doDelete("ambit_properties_photos",array("app_aap_id"=>$v["aap_id"]));	
		doDelete("ambit_properties_price",array("app_aap_id"=>$v["aap_id"]));	
	}
}
if($s){
	echo 1;
}else{
	echo 0;
}
?>