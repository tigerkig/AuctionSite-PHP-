<?php
session_start();
require_once("function.php");
doInsert($_POST,"ambit_membership");
$id=mysql_insert_id();
doInsert(array("package_id"=>$id),"ambit_package_description");
?>
<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
Package Accessibility 
<?php
$select='p_id,see_full_description,see_album,send_gift,send_message,poke,name';
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
<th class="va-m">see_full_description</th>
<th class="hidden-xs va-m">see_album</th>
<th class="va-m">send_gift</th>
<th class="va-m">send_message</th>
<th class="hidden-xs va-m">poke</th>
<th class="hidden-xs va-m">Action</th>
</tr>
</thead>
<tbody>
<?php
foreach($result as $k=>$v){
?>
<tr>
<td><?php echo ucfirst($v["name"]);  ?></td>
<td><?php if($v["see_full_description"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="see_full_description('<?php echo $v["p_id"];  ?>');" title="Change"><img src="icon/edit.png" width="13" /></a>
</td>
<td><?php if($v["see_album"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="see_album('<?php echo $v["p_id"];  ?>');" title="Change"><img src="icon/edit.png" width="13" /></a>
</td>
<td><?php if($v["send_gift"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="send_gift('<?php echo $v["p_id"];  ?>');" title="Change"><img src="icon/edit.png" width="13" /></a>
</td>
<td><?php if($v["send_message"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="send_message('<?php echo $v["p_id"];  ?>');" title="Change"><img src="icon/edit.png" width="13" /></a>
</td>
<td><?php if($v["poke"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="poke('<?php echo $v["p_id"];  ?>');" title="Change"><img src="icon/edit.png" width="13" /></a>
</td>
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