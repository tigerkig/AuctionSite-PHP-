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
<?php
$val=get_site_settings($_POST["id"]);
$val=explode("||",$val);

?>
<div class="section">
<label for="field" class="field prepend-icon">
Minimum Rate <br/>
<input type="text" name="field" id="field" value="<?php echo $val[0]; ?>" />
</label>
</div>
<div class="section">
<label for="field" class="field prepend-icon">
Percentage <br/>
<input type="text" name="field1" id="field1" value="<?php echo $val[1]; ?>" />
</label>
</div>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_validation1('<?php echo $_POST["id"]; ?>');" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>