<?php
session_start();
require_once("function.php");
$h='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "dashboard";
$_SESSION["sub_menu"]  = "move_stock";

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
<span style="color: #0d316f;cursor:default; font-size:1.3em;">/ Move Stock</span>
</li>


</ol>
</div>

</header>
<script type="text/javascript">
$(document).ready(function() {
$("#ajax_des").on('submit',(function(e){  
	
	var add_quantity=$("#add_quantity").val().trim();
	var from_quantity=$("#from_quantity").val().trim();
	if(add_quantity > from_quantity){
	alert("It can not be move.....sorry!");
	return false;
	}
	
	$.ajax({
        	url: "ajax_move_stock.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			location.reload();
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
});
	
function fetch_product(id,id1){
	var vendor_id=$("#"+id).val().trim();
	if(vendor_id != 0){
	$.post(
	"ajax_fetch_product.php",
	{vendor_id:vendor_id,msg:'fetch_product'},
	function(r){
	$("#"+id1).html(r);
	}
	);
	}else{
		return false;
	}
}

function fetch_quantity(id,id1){
	var apa_id=$("#"+id).val().trim();
	if(apa_id != 0){
	$.post(
	"ajax_fetch_product.php",
	{apa_id:apa_id,msg:'quantity'},
	function(r){
	$("#"+id1).val(r);
	}
	);
	}else{
		return false;
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
<div class="panel-title" style="color: #574c3c;">Stock Exchange
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="ajax_des" enctype="multipart/form-data">
<h6 class="mb20" id="spy1">From</h6>

<div class="row">
<div class="col-md-4">
<div class="section">
<label class="field select">
<select  id="from_vendor" name="from_vendor" onchange="fetch_product('from_vendor','from_product');">
<option value="0">Select Vendor</option>
<?php
$vendor=getDetails(doSelect("vr_id,fname,lname","vendor_registration",array("status"=>1)));
foreach($vendor as $k=>$v){
?>
<option value="<?php echo trim($v["vr_id"]); ?>"><?php echo $v["fname"].' '.$v["lname"]; ?></option>
<?php
}
?>
</select>
<i class="arrow double"></i>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field select">
<select  id="from_product" name="from_product" onchange="fetch_quantity('from_product','from_quantity');" >
<option value="0">Select Product</option>
</select>
</select>
<i class="arrow double"></i>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="text" readonly name="from_quantity" id="from_quantity" class="gui-input" placeholder="Quantity" >
</label>
</div>
</div>

</div>
<h6 class="mb20" id="spy1">To</h6>
<div class="row">
<div class="col-md-4">
<div class="section">
<label class="field select">
<select  id="to_vendor" name="to_vendor"  onchange="fetch_product('to_vendor','to_product');">
<option value="0">Select Vendor</option>
<?php
$vendor=getDetails(doSelect("vr_id,fname,lname","vendor_registration",array("status"=>1)));
foreach($vendor as $k=>$v){
?>
<option value="<?php echo trim($v["vr_id"]); ?>"><?php echo $v["fname"].' '.$v["lname"]; ?></option>
<?php
}
?>
</select>
<i class="arrow double"></i>
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field select">
<select  id="to_product" name="to_product"  onchange="fetch_quantity('to_product','to_quantity');" >
<option value="0">Select Product</option>
</select>
</select>
<i class="arrow double"></i>
</label>
</div>
</div>
<div class="col-md-2">
<div class="section">
<label class="field">
<input type="text" readonly name="to_quantity" id="to_quantity" class="gui-input" placeholder="Quantity" >
</label>
</div>
</div>
<div class="col-md-2">
<div class="section">
<label class="field">
<input type="text"  name="add_quantity" id="add_quantity" class="gui-input" placeholder="Add Quantity" >
</label>
</div>
</div>

</div>
<div class="row">
<div class="col-md-12">
<input class="btn btn-default btn-primary" type="submit"   name="submit" value="Add" >
</div>
</div>
</form>
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
