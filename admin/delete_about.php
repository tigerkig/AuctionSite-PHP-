<?php
require_once("function.php");
$status=doDelete("ambit_about",array("id"=>$_POST["id"]));
?>
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<?php
$about=getDetails(doselect1("about,id","ambit_about",array()));
?>
<span class="panel-title">
Privacy Ploicy &nbsp <?php if(!empty($about)) { ?> <a href="javascript:void(0);" title="Edit" onclick="edit_about('<?php echo $about[0]["id"];  ?>');"><img src="icon/edit.png" width="15" /></a>&nbsp <a href="javascript:void(0);" title="Delete" onclick="delete_about('<?php echo $about[0]["id"];  ?>');"><img src="icon/delete.png" width="25" /></a><?php }  ?>
</span>
</div>
<div class="panel-body pn">
<p style="text-align: justify;">
<?php if(!empty($about)) echo $about[0]["about"]; else echo '<font color="red">Please write About above !</font>';  ?>
</p>
</div>
<div class="panel-footer"></div>
</div>
</div>
</section>