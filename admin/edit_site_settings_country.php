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
<select name="field" id="field" style="margin: 0px; width: 825px; height:40px;">
<?php
$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" <?php if(get_site_settings($_POST["id"])==$v["cn_id"]) echo 'selected';  ?> >
<?php echo $v["cn_name"];  ?>
</option>
<?php
}
?>
</select>
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