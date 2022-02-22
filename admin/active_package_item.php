<?php
session_start();
require_once("function.php");


if($_POST["set"]=='delete_package'){
	$package_id 	= $_POST["id"];
	$package_name 	= seeMoreDetails("name","ambit_membership",array("p_id"=>$_POST["id"]));
	if($package_id == 1 && $package_name == "Free"){
		//echo "<script>alert('Don't delete free package!');</script>";
	}else{
		doDelete("ambit_package_description",array("package_id"=>$_POST["id"]));
		$image=seeMoreDetails("image","ambit_membership",array("p_id"=>$_POST["id"]));
		if(file_exists("../image/".$image)){
			unlink("../image/".$image);
		}
		doDelete("ambit_membership",array("p_id"=>$_POST["id"]));
	}
	
}
?>


<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
Package Accessibility <span style="color: red;opacity: 0.6;">(** -1 For Unlimited)</span>
<?php
$select='p_id,name,price,no_of_product,no_of_featured,no_of_image';
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
<th class="va-m">Package Name</th>
<th class="va-m">Price</th>
<th class="va-m">Post Product Limit</th>
<th class="hidden-xs va-m">Post Product Photo Limit</th>
<th class="hidden-xs va-m">Featured Product Limit</th>
<th class="hidden-xs va-m">Action</th>

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
if($v["no_of_product"]== -1){
$property_p='<font color="red">Unlimited</font>';
}else{
$property_p=$v["no_of_product"];
}

?>
<td style="text-align: center;"><?php echo $property_p;  ?></td>
<?php
if($v["no_of_image"]== -1){
$property_ph='<font color="red">Unlimited</font>';
}else{
$property_ph=$v["no_of_image"];
}

?>
<td><?php echo $property_ph;  ?></td>
<?php
if($v["no_of_featured"]== -1){
$featured_pro_limit='<font color="red">Unlimited</font>';
}else{
$featured_pro_limit=$v["no_of_featured"];
}

?>
<td><?php echo $featured_pro_limit;  ?></td>
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