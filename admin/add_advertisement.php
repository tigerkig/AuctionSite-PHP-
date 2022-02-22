<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "home_setting";
$_SESSION["sub_menu"]  = "add_advertisement";

include("include/header.php");
?>
<script type='text/javascript' src='js/jquery-1.6.2.min.js'></script>
<script type="text/javascript">
function changeStatus(id){
		$.post("admin_approve_advertisement.php",{aab_id:id,msg:'approve_banner'},function(r){
			if(r==1){	
		location.reload();	
	}else{
		alert("Something went wrong !");
		}
	});
	}


function delete_product(id){
		 if(confirm("Are you sure , to delete Banner ???")){
		$.post("admin_approve_advertisement.php",{aab_id:id,msg:'delete_banner'},function(r){
			if(r==1){
		location.reload();	
	}else{
		alert("Something went wrong !");
		}
			}
		);
	}
	}

function doUpdate(id){
	var link=$("#product_link"+id).val();
	$.post("get_product_id.php",{name:link},function(link){
       $.post("admin_approve_advertisement.php",{aab_id:id,aab_link:link,msg:'update_banner'},function(r){
	   if(r==1){
	   location.reload();	
	 }else{
	 	alert("Something went wrong !");
	 	}
	 		}
	 	);
	});
	}

$(document).ready(function() {
	$("#ajax_des").on('submit',(function(e){ 
    //alert('sidd');
var aab_banner=$("#aab_banner").val();	
var aab_link=$("#aab_link").val();
    if(aab_banner.trim()==""){
	alert("Advertisement Image Required!");
	return false;
    }
	$.ajax({
        	url: "ajax_post_advertisement.php",
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
</script>
<section id="content_wrapper">
 
<div id="topbar-dropmenu-wrapper">
<div class="topbar-menu row">
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-danger">
<span class="fa fa-music"></span>
<span class="service-title">Audio</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-success">
<span class="fa fa-picture-o"></span>
<span class="service-title">Images</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-primary">
<span class="fa fa-video-camera"></span>
<span class="service-title">Videos</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-alert">
<span class="fa fa-envelope"></span>
<span class="service-title">Messages</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-system">
<span class="fa fa-cog"></span>
<span class="service-title">Settings</span>
</a>
</div>
<div class="col-xs-4 col-sm-2">
<a href="#" class="service-box bg-dark">
<span class="fa fa-user"></span>
<span class="service-title">Users</span>
</a>
</div>
</div>
</div>
 
 
<header id="topbar" class="alt">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="index.php">
<span class="fa fa-usd"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="withdraw_request_balance.php">My Balance</a>
</li>



</ol>
</div>
<!-- <div class="topbar-right">
<div class="ib topbar-dropdown">
<label for="topbar-multiple" class="control-label">Reporting Period</label>
<select id="topbar-multiple" class="hidden">
<optgroup label="Filter By:">
<option value="1-1">Last 30 Days</option>
<option value="1-2" selected="selected">Last 60 Days</option>
<option value="1-3">Last Year</option>
</optgroup>
</select>
</div>
<div class="ml15 ib va-m" id="sidebar_right_toggle">
<div class="navbar-btn btn-group btn-group-number mv0">
<button class="btn btn-sm btn-default btn-bordered prn pln">
<i class="fa fa-bar-chart fs22 text-default"></i>
</button>
</div>
</div>
</div> -->
</header>
 
 
<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">
 
<div class="row">
<div class="col-sm-12">
<div class="panel panel-tile">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Add Advertisement
</span>
</div>
 <br/>
<form method="post" action="javascript:void(0);" id="ajax_des"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<!-- <label for="image" class="field prepend-icon"> -->
<!-- <input type="file" id="aab_banner" name="aab_banner" value=""  style="width: 917px; height: 40px;" /> -->
<input class="button" type="file" id="aab_banner" name="aab_banner" value=""/>
<!-- </label> -->
</div>
<br/>
<div class="section">
<!-- <label for="link" class="field prepend-icon"> -->
<!-- <input type="text" id="aab_link" name="aab_link" value="" placeholder="Link URL" style="width: 917px; height: 40px;" /> -->
<input class="form-control" type="text" id="aab_link" name="aab_link" value="" placeholder="Link URL"/>
<!-- </label> -->
</div>
<br/>

<div class="section">
<div class="pull-right">
<input type="submit" name="submit" class="btn  btn-primary"  value="Submit" />
</div>
</div>
 
</div>
 

</form>
</div>
</div>
</div>



<div class="col-sm-12">
<div class="panel panel-tile">
<div class="panel">
 <br/>
<div class="chute chute-center">
<div class="row">
<!--  -->
<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
Advertisement List
<?php
$result=getDetails(doSelect1("aab_id,aab_banner,aab_link,status","ambit_advertisement",array()));

?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m">Sl. No. :</th>
<th class="va-m">Advertisement Image</th>
<th class="va-m">Link</th>
<th class="va-m">Edit Link</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
foreach($result as $k=>$v){

?>
<tr>
<td><?php  echo $i; ?></td>
<td><img src="../image/demo/cms/<?php echo $v["aab_banner"] ?>" width="100px" ></td>
<td><?php echo $v["aab_link"];  ?></td>
<td><div class="section">
<label for="link" class="field prepend-icon">
<input list="browsers" id="product_link<?php echo $v["aab_id"];  ?>" name="product_link" value="" placeholder="Type Product Name" style="height: 40px; width: 180px;">

<datalist id="browsers">
<?php
$pro_suggest=getDetails(doSelect1("apa_id,name","ambit_product_add",array("status"=>1)));
foreach($pro_suggest as $k2=>$v2){
?>
  <option value="<?php echo $v2["name"];  ?>"><?php echo $v2["name"];  ?></option>
<?php
}
?>
</datalist> 
</label>
</div></td>
<td><?php if($v["status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?><a href="javascript:void(0);" onclick="changeStatus('<?php echo $v["aab_id"];  ?>');" title="Change Status"><img src="icon/edit.png" width="13" /></a><a href="javascript:void(0);" onclick="delete_product('<?php echo $v["aab_id"];  ?>');" title="Delete Slider"><img src="icon/delete.png" width="22" /></a><a href="javascript:void(0);" onclick="doUpdate('<?php echo $v["aab_id"];  ?>');"><img src="icon/update.png" title="Update" width="18" /></a>
</td>
</tr>
<?php
$i++;
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>



</div>
 

</div>

</section>
<script src="assets/js/jquery/jquery-1.11.1.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script src="assets/js/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/js/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/js/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="assets/js/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
 
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/tables-data.js"></script>
 
</body>
</html>
<?php
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
