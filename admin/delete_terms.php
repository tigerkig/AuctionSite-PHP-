<?php
require_once("function.php");
$status=doDelete("ambit_terms_services",array("id"=>$_POST["id"]));
?>
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
<?php
$terms=getDetails(doselect1("terms,id","ambit_terms_services",array()));
?>
Terms & Services &nbsp<?php if(!empty($terms)) { ?> <a href="javascript:void(0);" title="Edit" onclick="edit_terms('<?php echo $terms[0]["id"]; ?>');"><img src="icon/edit.png" width="15" /></a>&nbsp <a href="javascript:void(0);" title="Delete" onclick="delete_terms('<?php echo $terms[0]["id"]; ?>');"><img src="icon/delete.png" width="25" /></a><?php  } ?>
</span>
</div>
<div class="panel-body pn">
<p style="text-align: justify;">
<?php if(!empty($terms))echo $terms[0]["terms"];else echo '<font color="red">Please write terms and condition above !</font>';  ?>
</p>
</div>
<div class="panel-footer"></div>
</div>
</div>
</section>