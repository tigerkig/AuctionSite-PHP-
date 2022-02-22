<?php
require_once("function.php");
$shipment_by=trim(seeMoreDetails("shipment_by","ambit_shipment_by",array("asb_id"=>1)));
?>
<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update
</span>
</div>
 
<form method="post" action=""   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
Shipment By:
<label for="field" class="field prepend-icon">
<select name="shipment_by" id="shipment_by" style="margin: 0px; width: 938px; height:40px;">
<option value="Admin" <?php if($shipment_by=="Admin") echo 'selected';  ?> >Admin</option>
<option value="Vendor" <?php if($shipment_by=="Vendor") echo 'selected';  ?> >Vendor</option>

</select>
</label>
</div>
<input type="hidden" name="asb_id" value="1">

<div class="section">
<div class="pull-right">
<input type="submit" name="update1" class="btn  btn-primary"  value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>