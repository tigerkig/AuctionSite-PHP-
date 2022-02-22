<?php
session_start();
require_once("function.php");
$h='menu-open';
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "dashboard";
$_SESSION["sub_menu"]  = "add_currency";

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
<span style="color: #0d316f;cursor:default; font-size:1.3em;">/ Add Currency</span>
</li>


</ol>
</div>

</header>
<script type="text/javascript">
function edit_currency(acu_id){
	  $.post("ajax_edit_currency.php",{acu_id:acu_id},function(r){
	  $("#full_ajax").html(r);
	  });
}
function update_validation(acu_id){
	var currency=$("#currency").val();
	var unit_price=$("#unit_price").val();
	var symbol=$("#symbol").val();

	if(currency.trim()==""){
		alert("Currency Name Required");
		$("#currency").focus();
		return false;
	}

	if(unit_price.trim()==""){
		alert("Unit Price Required");
		$("#unit_price").focus();
		return false;
	}

	if(symbol.trim()==""){
		alert("Symbol Required");
		$("#symbol").focus();
		return false;
	}
 	$.post("ajax_update_currency.php",{acu_id:acu_id,currency:currency,unit_price:unit_price,symbol:symbol},function(r){
	$("#full_ajax").html(r);
	alert("Currency updated successfully");
	});
}


$(document).ready(function() {
$("#ajax_des").on('submit',(function(e){  
var currency=$("#currency").val();
var unit_price=$("#unit_price").val();
var symbol=$("#symbol").val();


if(currency.trim()==""){
	alert("Currency Name Required");
	$("#currency").focus();
	return false;
}

if(unit_price.trim()==""){
	alert("Unit Price Required");
	$("#unit_price").focus();
	return false;
}

if(symbol.trim()==""){
	alert("Symbol Required");
	$("#symbol").focus();
	return false;
}

	$.ajax({
        	url: "ajax_add_currency.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			if(data==1){
				alert("Currency added successfully");
				window.location="add_currency.php";
			}else { 
				alert("Failed !");
			}
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });
</script>
<div id="full_ajax">
<section id="content" class="table-layout animated fadeIn">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">


<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="color: #574c3c;">Add Currency
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="ajax_des" enctype="multipart/form-data">
<h6 class="mb20" id="spy1">Add Currency</h6>

<div class="row">
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="text" name="currency" id="currency" class="gui-input" placeholder="Currency Name">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="text"  id="unit_price" name="unit_price" class="gui-input" placeholder="Unit Price">
</label>
</div>
</div>
<div class="col-md-4">
<div class="section">
<label class="field">
<input type="text"  id="symbol" name="symbol" class="gui-input" placeholder="Symbol">
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add" >
</div>
</div>
</form>
</div>
</div>

<div id="ajax">
<div class="panel">
<div class="panel-heading">
<div class="panel-title" style="color: #574c3c;">Currency List
</div>
</div>
<br/>
<div class="panel-group accordion" id="accordion1">
<?php
$currency=getDetails(doSelect1("acu_id,currency,symbol,unit_price,status","ambit_currency",array()));
if(!empty($currency)){
?>
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">Currency Name</th>
<th class="va-m">Symbol</th>
<th class="va-m">Unit Price</th>
<th class=" va-m">Action</th>
</tr>
</thead>
<tfoot>
<tr>
<th class="va-m">Currency Name</th>
<th class="va-m">Symbol</th>
<th class="va-m">Unit Price</th>
<th class=" va-m">Action</th>
</tr>
</tfoot>
<tbody>
<?php
foreach($currency as $k=>$v){
?>
<tr  id="<?php echo $v["acu_id"].'row'; ?>">
<td style="color: #1219a8;font-size:1.5em;"><?php echo $v["currency"]; ?></td>
<td style="color: #1219a8;font-size:1.5em;"><?php echo htmlspecialchars($v["symbol"]); ?></td>
<td style="color: #926e3a;font-size:16px;"><?php echo $v["unit_price"];  ?></td>
<?php
if($v["status"]==0){
$status='<font color="red">Suspend</font>';
}else{
$status='<font color="blue">Active</font>';
}
?>
<td class="">
<span class="fa fa-refresh" style="cursor:pointer;font-size: 1.6em;color:#238023;" onclick="change_status('<?php echo $v["acu_id"];  ?>');"   data-toggle="tooltip"  rel="tooltip"   data-original-title="Change Status" ></span>
&nbsp <span class="fa fa-pencil-square-o" style="cursor:pointer;font-size: 1.6em;color:#6f3030;" onclick="edit_currency('<?php echo $v["acu_id"]; ?>')" title="Edit"></span></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<?php
}else{
	echo '<font color="red">Please add Currency</font>';
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
