<?php
require_once("function.php");
?>
<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update Social Media
</span>
</div>
<?php
$details=getDetails(doSelect("*","ambit_social_media",array()));
foreach($details as $k=>$v){
?> 
<form method="post" action=""   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
Facebook:
<label for="field" class="field prepend-icon">
<input type="text" name="facebook" id="facebook" style="margin: 0px; width: 938px;height:40px;"   value="<?php echo $v["facebook"]; ?>" />
</label>
</div>

<div class="section">
Twitter:
<label for="field" class="field prepend-icon">
<input type="text" name="twitter" id="twitter" style="margin: 0px; width: 938px;height:40px;"   value="<?php echo $v["twitter"]; ?>" />
</label>
</div>

<div class="section">
Pinterest:
<label for="field" class="field prepend-icon">
<input type="text" name="pinterest" id="pinterest" style="margin: 0px; width: 938px;height:40px;"   value="<?php echo $v["pinterest"]; ?>" />
</label>
</div>

<div class="section">
Google Plus:
<label for="field" class="field prepend-icon">
<input type="text" name="google_plus" id="google_plus" style="margin: 0px; width: 938px;height:40px;"  value="<?php echo $v["google_plus"]; ?>" />
</label>
</div>


<div class="section">
YouTube:
<label for="field" class="field prepend-icon">
<input type="text" name="youtube" id="youtube" style="margin: 0px; width: 938px;height:40px;"  value="<?php echo $v["youtube"]; ?>" />
</label>
</div>

<div class="section">
Instagram:
<label for="field" class="field prepend-icon">
<input type="text" name="instagram" id="instagram" style="margin: 0px; width: 938px;height:40px;"  value="<?php echo $v["instagram"]; ?>" />
</label>
</div>

<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary"   value="Update" />
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