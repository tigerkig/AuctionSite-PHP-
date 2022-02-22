<script type="text/javascript">
$(document).ready(function() {
  $("#ajax_des").on('submit',(function(e){  
$.ajax({
      url: "update_features.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      success: function(data)
        {
     //alert(data);
     if(data==1){
     	window.location="add_features.php";
     }
     if(data==0){
     	alert("Something Went Wrong !");
     }
        },
        error: function() 
        {
        }         
     });

  }));
      
    });
</script>

<?php
require_once("function.php");
?>

<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update Features
</span>
</div>
<?php
$terms=getDetails(doselect1("id,features","ambit_features",array("id"=>$_POST["id"])));
?>
<form method="post" action="javascript:void(0);" id="ajax_des"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="about" class="field prepend-icon">
<textarea name="features" id="features" placeholder="Update Features.........." rows="10" cols="100" style="width: 939px; height: 247px;"><?php echo $terms[0]["features"];  ?></textarea>
</label>
</div>

<input type="hidden" name="id" id="id" value="<?php echo $terms[0]["id"];  ?>">
<div class="section">
<div class="pull-right">
<input type="submit" name="update"  class="btn  btn-primary" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>