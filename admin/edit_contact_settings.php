<?php
require_once("function.php");
?>
<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update <?php echo ucfirst(seeMoreDetails("st_field","site_settings",array("st_id"=>$_POST["id"])));  ?>
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" onsubmit="return validation();">
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<textarea name="field" id="field"  rows="5" cols="100"><?php echo get_site_settings($_POST["id"]); ?></textarea>
</label>
</div>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_validation('<?php echo $_POST["id"]; ?>');" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>