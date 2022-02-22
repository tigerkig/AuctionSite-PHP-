<?php
require_once("function.php");
if(isset($_POST["key"])){
$select="aasp_id,company_name,contact_prson,cmpny_email,profile_image,mobile_phone,work_phone,about_me,admin_status";
$query=doSelect2($select,"ambit_agent_sign_up",array());
$query.=" AND (aasp_id='".$_POST["key"]."' OR cmpny_email='".$_POST["key"]."' OR contact_prson LIKE '%".$_POST["key"]."%' OR company_name='".$_POST["key"]."')";
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

<div class="panel-title hidden-xs"><?php echo ucwords($v["contact_prson"])."'s-Profile";  ?>
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
<th>Profile Pic</th>
<th>Company Name</th>
<th>Contact Person</th>
<th>
<code>Approved</code>
</th>
</tr>
</thead>
<tbody>
<tr>
<td ><img src="../agent_image/<?php  echo $v["profile_image"]; ?>" width="100" /></td>
<td ><?php  echo $v["company_name"]; ?></td>
<td><?php echo ucwords($v["contact_prson"]);  ?></td>
<td>
<?php if($v["admin_status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="changeStatus('<?php echo $v["aasp_id"];  ?>');" title="Change Status"><img src="icon/edit.png" width="13" /></a> <a href="javascript:void(0);" onclick="delete_user('<?php echo $v["aasp_id"];  ?>');" title="Delete"><img src="icon/delete.png" width="19" /></a>


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
Agent Details
</th>
</tr>
</thead>
<tbody>
<tr>
<td>Email</td>
<td align="right"><?php echo $v["cmpny_email"]; ?></td>
</tr>
<tr>
<td>Contact</td>
<td align="right"><?php echo $v["work_phone"]; if(!empty($v["mobile_phone"])) echo '<br/>'.$v["mobile_phone"];  ?></td>
</tr>
<tr>
<td>About</td>
<td align="right"><p style="text-align: justify;"><?php echo $v["about_me"];  ?></p></td>
</tr>

</tbody>
</table>
</div>
</div>
</div>
</div>

</div>
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


