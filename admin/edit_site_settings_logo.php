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
 
<form method="post" action=""   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<input type="file" name="image" id="image" value=""  />
</label>
</div>

<input type="hidden" name="st_id" value="<?php echo $_POST["id"];  ?>" />
<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary"  value="Update" />
</div><br/>
<img src="../sitelogo//<?php  echo get_site_settings($_POST['id']); ?>" width="130" />
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>
