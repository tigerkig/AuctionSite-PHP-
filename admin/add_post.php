<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>

 
<section id="content_wrapper">
 

 
 
<header id="topbar" class="alt">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="dashboard1.html">
<span class="fa fa-home"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="index.php">Dashboard</a>
</li>
<li class="breadcrumb-link">
<a href="index.php">Home</a>
</li>
<li class="breadcrumb-current-item">Add Post</li>
</ol>
</div>

</header>
 
<script type="text/javascript">
// function changeStatus(id){
//     $.post("admin_approved_slider.php",{aas_id:id,msg:'approve_slider'},function(r){
//       if(r==1){ 
//     location.reload();  
//   }else{
//     alert("Something went wrong !");
//     }
//   });
//   }


function delete_product(id){
     if(confirm("Are you sure , to delete Slider ???")){
    $.post("admin_approved_slider.php",{aas_id:id,msg:'delete_slider'},function(r){
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
  var link=$("#product_link"+id).val().trim();
  $.post("get_product_id.php",{name:link},function(link){
       $.post("admin_approved_slider.php",{aas_id:id,aas_link:link,msg:'update_slider'},function(r){
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
var image=$("#image").val();  
var aas_link=$("#aas_link").val();
    if(image.trim()==""){
  alert("Image Required!");
  return false;
    }
  $.ajax({
          url: "ajax_addpost.php",
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
<section id="content" class="table-layout animated fadeIn">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add Post
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="ajax_des" enctype="multipart/form-data">
<h6 class="mb20" id="spy1">Add Post</h6>
 
<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field">
<input type="text" name="ptitle" id="ptitle" class="gui-input" placeholder="Post Title">
</label>
</div>
</div>
</div>


<div class="row">
<div class="col-md-12">
<div class="section">
<label class="field prepend-icon">
<textarea class="gui-textarea" id="post_description" name="post_description" placeholder="Post Description"></textarea>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field">
<input type="file" name="image[]" id="image" multiple class="gui-input" >
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<input class="btn btn-default btn-primary" type="submit" name="submit" value="Add Post" >
</div>
</div>
</form>
 
</div>
</div>
</div>
</div>
</div>
 
</section>
 
</section>
 
<aside id="sidebar_right" class="nano affix">
 
<div class="sidebar-right-wrapper nano-content">
<div class="sidebar-block br-n p15">
<h6 class="title-divider text-muted mb20"> Visitors Stats
<span class="pull-right"> 2015
<i class="fa fa-caret-down ml5"></i>
</span>
</h6>
<div class="progress mh5">
<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%">
<span class="fs11">New visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
<span class="fs11 text-left">Returnig visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
<span class="fs11 text-left">Orders</span>
</div>
</div>
<h6 class="title-divider text-muted mt30 mb10">New visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">350</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-warning mn">
<i class="fa fa-caret-down"></i> 15.7% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">660</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success-dark mn">
<i class="fa fa-caret-up"></i> 20.2% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Orders</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">153</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success mn">
<i class="fa fa-caret-up"></i> 5.3% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt40 mb20"> Site Statistics
<span class="pull-right text-primary fw600">Today</span>
</h6>
</div>
</div>
</aside>
 
</div>
 
<style>body{min-height:2300px;}.content-header b,.allcp-form .panel.heading-border:before,.allcp-form .panel .heading-border:before{transition:all 0.7s ease;}@media (max-width: 800px) {.allcp-form .panel-body{padding:18px 12px;}.option-group .option{display:block;}.option-group .option+.option{margin-top:8px;}}</style>
 
 
<?php
require_once("include/footer.php");
require_once("include/required.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
