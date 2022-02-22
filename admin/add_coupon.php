<?php
session_start();
require_once("function.php");
$h='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "dashboard";
$_SESSION["sub_menu"]  = "add_coupon";

include("include/header.php");
?>

<section id="content_wrapper">

<header id="topbar" class="alt">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="index.php">
<span class="fa fa-home"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="index.php">Home</a>
<span style="color: #0d316f;cursor:default; font-size:1.3em;">/ Add Coupon</span>
</li>


</ol>
</div>

</header>
<script type="text/javascript">
function submit_coupon(){
	//alert("sidd");
var coupon_name=$("#coupon_name").val();
var type=$("#type").val();
var currency=$("#currency").val();
var discount=$("#discount").val();
if(coupon_name.trim()==""){
	alert("Please enter coupon name");
	$("#coupon_name").focus();
	return false;
}
if(type.trim()=="0"){
	alert("Please select Type");
	$("#type").focus();
	return false;
}

if(discount.trim()==""){
	alert("Please write discount");
	$("#discount").focus();
	return false;
}
$.post(
"ajax_submit_coupon.php",
{coupon_name:coupon_name,type:type,discount:discount,currency:currency,set:'add_coupon'},
function(r){
	if(r==1){
		alert("Coupon added succesfully")
	}
	window.location='<?php echo $_SERVER["REQUEST_URI"]; ?>';
}
);

}

	
function delete_coupon(aco_id){
	if(confirm("Do You Want To Delete This Coupon?")){
	$.post("ajax_submit_coupon.php",{aco_id:aco_id,set:'delete_coupon'},function(r){
	if(r==1){
		alert("Delete Successfully");
		window.location='<?php echo $_SERVER["REQUEST_URI"]; ?>';
	}
	if(r==0){
		alert("Something Went Wrong....");
	}
	});
	}
}


</script>
<div id="full_ajax">
<section id="content" class="table-layout animated fadeIn">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">


<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="color: #574c3c;">Add Coupon
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="ajax_des" enctype="multipart/form-data">
<h6 class="mb20" id="spy1">Add Coupon</h6>

<div class="row">
<div class="col-md-3">
<div class="section">
<label class="field">
<input type="text" name="coupon_name" id="coupon_name" class="gui-input" placeholder="Coupon Name...." >
</label>
</div>
</div>
<div class="col-md-3">
<div class="section">
<label class="field select">
<select  id="type" name="type" >
<option value="0">Select Type</option>
<option value="1">Flat</option>
<option value="2">Percentage</option>
</select>
<i class="arrow double"></i>
</label>
</div>
</div>
<div class="col-md-3">
<div class="section">
<label class="field select">
<select  id="currency" name="currency" >
<?php
$currency=getDetails(doSelect("acu_id,currency,unit_price","ambit_currency",array()));
foreach ($currency as $k => $v) {
?>
<option value="<?php echo $v["acu_id"]; ?>" <?php if($v["unit_price"]==1) echo 'selected';  ?> ><?php echo $v["currency"];  ?></option>
<?php
}
?>
</select>
</select>
<i class="arrow double"></i>
</label>
</div>
</div>
<div class="col-md-3">
<div class="section">
<label class="field">
<input type="text" name="discount" id="discount" class="gui-input" placeholder="Discount..." >
</label>
</div>
</div>

</div>
<div class="row">
<div class="col-md-12">
<input class="btn btn-default btn-primary" type="button"  onclick="submit_coupon();" name="submit" value="Add" >
</div>
</div>
</form>
</div>
</div>

<div id="ajax">
<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="color: #574c3c;">Coupon List
</div>
</div>
<br/>
<div class="panel-group accordion" id="accordion1">
<?php
$select='aco_id,coupon_name,currency,type,discount,status';
$from='ambit_coupon';
$where=array();
$result=getDetails(doSelect1($select,$from,$where));
if(!empty($result)){
?>
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">Coupon Code</th>
<th class="va-m">Type</th>
<th class="va-m">Currency</th>
<th class="va-m">Discount</th>
<th class="va-m">Status</th>
<th class=" va-m">Action</th>
</tr>
</thead>
<tfoot>
<tr>
<th class="va-m">Coupon Code</th>
<th class="va-m">Type</th>
<th class="va-m">Currency</th>
<th class="va-m">Discount</th>
<th class="va-m">Status</th>
<th class=" va-m">Action</th>
</tr>
</tfoot>
<tbody>
<?php
foreach($result as $k=>$v){
?>
<tr  id="<?php echo $v["acu_id"].'row'; ?>">
<td style="color: #1219a8;font-size:1.5em;"><?php echo $v["coupon_name"]; ?></td>
<?php
if(trim($v["type"])==1){
	$type='Flat';
}else{
	$type='Percentage';
}
?>
<td style="color: #1219a8;font-size:1.5em;"><?php echo $type; ?></td>
<td style="color: #1219a8;font-size:1.5em;"><?php echo get_currency1($v["currency"]); ?></td>
<td style="color: #926e3a;font-size:16px;"><?php echo $v["discount"];  ?></td>
<?php
if($v["status"]==0){
$status='<font color="red">InActive</font>';
}else{
$status='<font color="blue">Active</font>';
}
?>
<td style="color: #926e3a;font-size:16px;"><?php echo $status;  ?></td>
<td class="">
&nbsp
<span class="fa fa-trash-o fa-2x"  onclick="delete_coupon('<?php echo $v["aco_id"];  ?>');"  style="cursor:pointer;color:red;" data-toggle="tooltip"  data-original-title="Delete"></span>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<?php
}else{
	echo '<font color="red">Please add coupon</font>';
}
?>
</div>

</div>
</div>


</div>
</div>
</div>
</section>




<!-- end ajax div -->
</div>

<?php
require_once("include/footer.php");
require_once("include/required.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
