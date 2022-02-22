<?php
require_once("function.php");

?>

<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update Contact
</span>
</div>
<?php
$contact_details=getDetails(doselect1("*","ambit_contact_us",array("id"=>$_POST["id"])));
?>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" onsubmit="return validation();">
<div class="panel-body pn">

<div class="section">
<label for="address" class="field prepend-icon">
<textarea name="address" id="address" placeholder="Write Your Address...." rows="4" cols="20" style="margin: 0px; height: 106px; width: 938px;"><?php echo $contact_details[0]["address"];  ?></textarea>
</label>
</div>

<div class="section">
<label for="phone" class="field prepend-icon">
<input type="text" name="phone" id="phone" class="gui-input" placeholder="Phone No...." style="margin: 0px; width: 938px;" value="<?php echo $contact_details[0]["phone"];  ?>">
</label>
</div>

<div class="section">
<label for="email" class="field prepend-icon">
<input type="text" name="email" id="email" class="gui-input" placeholder="Email..." style="margin: 0px; width: 938px;" value="<?php echo $contact_details[0]["email"];  ?>">
</label>
</div>
<div class="section">
<div class="pull-right">
<input type="submit" name="submit" onclick="update_validation('<?php echo $_POST["id"];  ?>');" class="btn  btn-primary" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>