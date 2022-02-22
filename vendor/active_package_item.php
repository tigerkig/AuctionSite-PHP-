<?php
session_start();
require_once("function.php");
if($_POST["set"]=='see_full_description'){
	$val=seeMoreDetails("see_full_description","ambit_package_description",array("package_id"=>$_POST["id"]));
	if($val==1){
		$a=0;
	}else{
		$a=1;
	}
	doUpdate("ambit_package_description",array("see_full_description"=>$a),array("package_id"=>$_POST["id"]));
}
if($_POST["set"]=='see_album'){
	$val=seeMoreDetails("see_album","ambit_package_description",array("package_id"=>$_POST["id"]));
	if($val==1){
		$a=0;
	}else{
		$a=1;
	}
	doUpdate("ambit_package_description",array("see_album"=>$a),array("package_id"=>$_POST["id"]));
}
if($_POST["set"]=='send_gift'){
	$val=seeMoreDetails("send_gift","ambit_package_description",array("package_id"=>$_POST["id"]));
	if($val==1){
		$a=0;
	}else{
		$a=1;
	}
	doUpdate("ambit_package_description",array("send_gift"=>$a),array("package_id"=>$_POST["id"]));
}
if($_POST["set"]=='send_message'){
	$val=seeMoreDetails("send_message","ambit_package_description",array("package_id"=>$_POST["id"]));
	if($val==1){
		$a=0;
	}else{
		$a=1;
	}
	doUpdate("ambit_package_description",array("send_message"=>$a),array("package_id"=>$_POST["id"]));
}
if($_POST["set"]=='poke'){
	$val=seeMoreDetails("poke","ambit_package_description",array("package_id"=>$_POST["id"]));
	if($val==1){
		$a=0;
	}else{
		$a=1;
	}
	doUpdate("ambit_package_description",array("poke"=>$a),array("package_id"=>$_POST["id"]));
}


if($_POST["set"]=='delete_package'){
	doDelete("ambit_package_description",array("package_id"=>$_POST["id"]));
	$image=seeMoreDetails("image","ambit_membership",array("p_id"=>$_POST["id"]));
	if(file_exists("../image/".$image)){
		unlink("../image/".$image);
	}
	doDelete("ambit_membership",array("p_id"=>$_POST["id"]));
}
?>


<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
<?php echo $lang_143; ?> <span style="color: red;opacity: 0.6;">(** -1 <?php echo $lang_144; ?>)</span>
<?php
$select='p_id,name,price,post_property_limit,post_property_photo';
$from='ambit_membership,ambit_package_description';
$where=array('package_id'=>'p_id');
$result=getDetails(doSelect1($select,$from,$where));

?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m"><?php echo $lang_145; ?></th>
<th class="va-m"><?php echo $lang_47; ?></th>
<th class="va-m"><?php echo $lang_146; ?></th>
<th class="hidden-xs va-m"><?php echo $lang_147; ?></th>
<th class="hidden-xs va-m"><?php echo $lang_138; ?></th>

</tr>
</thead>
<tbody>
<?php
foreach($result as $k=>$v){
?>
<tr>
<td ><?php echo ucfirst($v["name"]);  ?></td>
<td><?php if($v["price"] != 0) echo 'USD '.$v["price"]; else echo 'Free';  ?></td>
<?php
if($v["post_property_limit"]== -1){
$property_p='<font color="red">Unlimited</font>';
}else{
$property_p=$v["post_property_limit"];
}

?>
<td style="text-align: center;"><?php echo $property_p;  ?></td>
<?php
if($v["post_property_photo"]== -1){
$property_ph='<font color="red">Unlimited</font>';
}else{
$property_ph=$v["post_property_photo"];
}

?>
<td><?php echo $property_ph;  ?></td>
<td><a href="javascript:void(0);" onclick="delete_package('<?php echo $v["p_id"];  ?>');" title="Delete Package"><img src="icon/delete.png" width="19" /></a><a href="javascript:void(0);" onclick="edit_package('<?php echo $v["p_id"];  ?>');" title="Edit Package"><img src="icon/edit.png" width="13" /></a>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>