<?php
require_once("function.php");
if(isset($_POST["key"]) && trim($_POST["key"])!=""){
$select="aap_id,aap_agnt_id,apf_name,about,locality,company_name,contact_prson,ambit_agent_properties.admin_status,cn_name,ct_name,property_type,property_for";
$from="ambit_agent_properties,ambit_agent_sign_up,ambit_property_for,ambit_country,ambit_city";
$where=array('aasp_id'=>'aap_agnt_id','apf_id'=>'property_for',"country"=>"cn_id","city"=>"ct_id");
$query=doSelect2($select,$from,$where);
$query.=" AND (aap_id='".$_POST["key"]."' OR locality LIKE '%".$_POST["key"]."%' OR contact_prson LIKE '%".$_POST["key"]."%' OR company_name LIKE '%".$_POST["key"]."%')";
$result=getDetails(mysql_query($query));
}else{
	$result=array();
}
$define='<font color="red">Not Specified</font>';
?>
<div class="panel panel-visible" id="spy6">
<?php

if(!empty($result)){
foreach($result as $k=>$v){

?>
<div class="panel-heading">

<div class="panel-title hidden-xs">Properties Details
</div>
</div>

<div class="panel-body pn">
<div class="table-responsive">
<div class="col-sm-12">
<div class="panel">
<div class="panel-body pn">
<div class="bs-component">
<table class="table">
<thead>
<tr class="info">
<th>Property Place</th>
<th>Property For</th>
<th>Posted By</th>
<th>Contact Person</th>
<th>
<code>Approved</code>
</th>
</tr>
</thead>
<tbody>
<tr>
<td ><?php echo $v["locality"];  ?></td>
<td ><?php echo $v["apf_name"];  ?></td>
<td ><?php  echo $v["company_name"]; ?></td>
<td><?php echo ucwords($v["contact_prson"]);  ?></td>
<td>
<?php if($v["admin_status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="changeStatus('<?php echo $v["aap_id"];  ?>');" title="Change Status"><img src="icon/edit.png" width="13" /></a> <a href="javascript:void(0);" onclick="delete_user('<?php echo $v["aap_id"];  ?>');" title="Delete"><img src="icon/delete.png" width="19" /></a>


</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="col-sm-12">
<div class="panel">
<div class="panel-body pn">
<div class="bs-component">
<table class="table">
<thead>
<tr class="info">
<th colspan="2">
Features
</th>
</tr>
</thead>
<tbody>
<?php
if($v["property_for"]!=3){
?>
<tr>
<td>Property Type</td>
<td align="right">
<?php echo seeMoreDetails("asp_name","ambit_sub_property",array("asp_id"=>$v["property_type"])); ?>
</td>
</tr>
<?php
}
?>
<tr>
<td>Location</td>
<td align="right"><?php echo $v["locality"].', '.$v["ct_name"].' ('.$v["cn_name"].')';  ?></td>
</tr>
<tr>
<td>About</td>
<td align="right"><?php echo $v["about"];  ?></td>
</tr>
<tr>
<td>Price</td>
<?php
if($v["property_for"]==1){
	$price=seeMoreDetails("expect_price","ambit_properties_price",array("app_aap_id"=>$v['aap_id'])).' Expected';
}else{
	$price=seeMoreDetails("mnthly_rent","ambit_properties_price",array("app_aap_id"=>$v['aap_id'])).' Monthly';
}

?>
<td align="right"><?php  echo $price; ?></td>
</tr>

</tbody>
</table>


</div>
</div>
</div>
</div>

</div>
</div>
<div class="btn-group ib mr10 mb5">
<a href="gallery.php?id=<?php echo $v["aap_id"]; ?>">
<button type="button" class="btn btn-default hidden-xs">
<span class="fa fa-tag"></span> See Photo Gallery
</button>
</a>
</div>
<?php

}
}else{
	?>
	<p>No Data Found</p>
	<?php
}
?>
</div>


