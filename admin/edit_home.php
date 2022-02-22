<?php
require_once("function.php");
?>
<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update Home
</span>
</div>
<?php
$details=getDetails(doSelect("ahp_id,ahp_title,ahp_desc,ahp_image","ambit_home_page",array("ahp_id"=>$_POST["ahp_id"])));
foreach($details as $k=>$v){
?> 
<form method="post" action=""   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<textarea name="ahp_title" id="heading"  rows="5" cols="100"><?php echo $v["ahp_title"]; ?></textarea>
</label>
</div>

<div class="section">
<label for="field" class="field prepend-icon">
<textarea name="ahp_desc" id="description"  rows="5" cols="100"><?php echo $v["ahp_desc"]; ?></textarea>
</label>
</div>

<div class="section">
<label for="field" class="field prepend-icon">
<input type="file" name="ahp_image" id="image" />

</label>
<img  src="../images/<?php echo $v["ahp_image"]; ?>" width="100" />
</div>
<input type="hidden" name="ahp_id" value="<?php echo $v["ahp_id"]; ?>">
<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary"  value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
<?php
}
?>
</div>
 
</div>
</section>