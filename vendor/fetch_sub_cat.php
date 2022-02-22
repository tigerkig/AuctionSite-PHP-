<?php
require_once("function.php");
if(isset($_REQUEST["asp_apt_id"]) && $_REQUEST["asp_apt_id"]!=""){
//fetch city
$query=doSelect("asp_id,asp_name","ambit_sub_property",array("asp_apt_id"=>$_REQUEST["asp_apt_id"]));
$category=getDetails($query);
//end fetch city
?>
<?php
foreach ($category as $k => $v) {
	# code...
	echo '<option value="'.$v["asp_id"].'">'.ucfirst($v["asp_name"]).'</option>';
}
}

?>