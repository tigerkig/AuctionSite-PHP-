<?php
require_once("function.php");
$_POST["acu_id"]=trim($_POST["acu_id"]);
$currency=getDetails(doSelect1("acu_id,currency,symbol,unit_price,status","ambit_currency",array("acu_id"=>$_POST["acu_id"])));
foreach($currency as $k=>$v){
?>


<section id="content" class="table-layout animated fadeIn">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">


<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="color: #574c3c;">Update Currency
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);"  enctype="multipart/form-data">
<h6 class="mb20" id="spy1">Update Currency</h6>

<div class="row">
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="text" name="currency" id="currency" value="<?php echo $v["currency"]; ?>" class="gui-input" placeholder="Currency Name">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="text"  id="unit_price" name="unit_price" value="<?php echo $v["unit_price"]; ?>" class="gui-input" placeholder="Unit Price">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="text"  id="symbol" name="symbol" value="<?php echo $v["symbol"]; ?>" class="gui-input" placeholder="Symbol">
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<input class="btn btn-default btn-primary" type="button"  onclick="update_validation('<?php echo $v["acu_id"]; ?>');"  value="Update" >
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>

<?php
}
?>