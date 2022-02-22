<?php
session_start();
require_once("function.php");
if(isset($_SESSION["ac_id"])){
include("include/header.php");

?>
<script type="text/javascript">

$(document).ready(function() {
$("#ajax_des").on('submit',(function(e){  
var old_password=$("#old_password").val();
var new_password=$("#new_password").val();
var c_password=$("#c_password").val();


if(old_password.trim()==""){
	alert("Old Password Required");
	$("#old_password").focus();
	return false;
}

if(new_password.trim()==""){
	alert("New Password Required");
	$("#new_password").focus();
	return false;
}

if(c_password.trim()==""){
	alert("Confirm Password Required");
	$("#c_password").focus();
	return false;
}

if(c_password.trim()!=new_password.trim()){
	alert("Password mismatch !");
	$("#c_password").val('');
	$("#c_password").focus();
	return false;
}


	
	$.ajax({
        	url: "ajax_update_password.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			if(data==1){
				alert("Update Successfully");
				window.location="index.php";
			}else if(data==0){
				alert("Update Failed");
			}else { 
				alert("Password not exist !");
			}
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });
</script>
<!-- //Header Top -->

<!-- Header center -->
<?php
include("include/header_center.php");
?>
<!-- //Header center -->

<!-- Header Bottom -->
<div class="header-bottom">
	<div class="container">
		<div class="row">
			
		<?php
			include("include/side_menu_close.php");
			?>
			
			<!-- Main menu -->
<?php
include("include/main_menu.php");
?>
			<!-- //end Main menu -->
			
		</div>
	</div>

</div>

<!-- Navbar switcher -->
<!-- //end Navbar switcher -->
	</header>
	<!-- //Header Container  -->
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>
		
			<li><a href="javascript:void(0);">Update Password</a></li>
		</ul>
	<?php
	$select="ac_id,name,email,address,landmark,country,city,phone,post_code";
	$cus_dtls=getDetails(doSelect1($select,"ambit_customer",array("ac_id"=>$_SESSION["ac_id"])));
	foreach($cus_dtls as $k6=>$v6){
	?>
		<div class="row">
			<div id="content" class="col-sm-12">
				<!-- <h1 class="title"><?php echo $lang_337; ?></h1> -->
				<form action="javascript:void(0);" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix" id="ajax_des">
					
					<fieldset id="address3">
						<legend><?php echo $lang_286; ?></legend>
						
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-address-1"><?php echo $lang_338; ?></label>
							<div class="col-sm-10">
								<input type="password" name="old_password" id="old_password" value="" placeholder="Old password"  class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-address-2"><?php echo $lang_339; ?></label>
							<div class="col-sm-10">
								<input type="password" name="new_password" id="new_password" value="" placeholder="New password"  class="form-control">
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-address-2"><?php echo $lang_340; ?></label>
							<div class="col-sm-10">
								<input type="password"  id="c_password" value="" placeholder="Confirm password"  class="form-control">
							</div>
						</div>
						

					</fieldset>

					
					
					<div class="buttons">
						<div class="pull-right"><input type="submit" value="Update" class="btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	<?php
	}
	?>
	</div>
	
	<!-- //Main Container -->
	

	<!-- Footer Container -->
	<?php
	include("include/footer.php");
}else{
	echo '<script>window.location="login.php";</script>';
}
	?>