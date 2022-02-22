<?php
session_start();

require_once("function.php");
$customer_details=getDetails(doSelect1("*","ambit_customer",array("ac_id"=>$_SESSION["ac_id"])));



//if(!isset($_SESSION["ac_id"])){
if(isset($_SESSION["ac_id"]) && $customer_details[0]["address"] == ""){
//require_once("function.php");
include("include/header.php");

?>
<script type="text/javascript">
	function fetch_city(){
	    var cn_id=$("#country").val();
	    $.ajax({
	      url:'fetch_state.php?cn_id='+cn_id,
	      type:'post',
	      dataType:'text',
	      cache:false,
	      contentType:false,
	      processData:false,
	      success:function(response){
	      //alert(response);
	       $("#city").html(response); 
	      }
	    });
	  }


	function fetch_city_name(){
		var country=$("#country").val();
		if(country.trim()==""){
			alert("Country Required");
			$("#country").focus();
			return false;
		}
		$("#city").val("");
	    var cn_name=$("#country").val();
	    $.ajax({
	      url:'fetch_state.php?cn_name='+cn_name,
	      type:'post',
	      dataType:'text',
	      cache:false,
	      contentType:false,
	      processData:false,
	      success:function(response){
	      //alert(response);
	       $("#cities").html(response); 
	      }
	    });
	  }




$(document).ready(function() {
	$("#ajax_des").on('submit',(function(e){  
var address=$("#address").val();
// var landmark=$("#landmark").val();
var country=$("#country").val();
var city=$("#city").val();
var phone=$("#phone").val();
//var post_code=$("#post_code").val();

if(address.trim()==""){
	alert("Address Required");
	$("#address").focus();
	return false;
}
// if(landmark.trim()==""){
// 	alert("Landmark Required");
// 	$("#landmark").focus();
// 	return false;
// }
// if(country.trim()=="0"){
if(country.trim()==""){
	alert("Country Required");
	$("#country").focus();
	return false;
}
// if(city.trim()=="0"){
if(city.trim()==""){
	alert("City Required");
	$("#city").focus();
	return false;
}

if(phone.trim()==""){
	alert("Phone Required");
	$("#phone").focus();
	return false;
}

if(isNaN(phone)){
	alert("Phone Invalid");
    $("#phone").val("");
    $("#phone").focus();
	return false;
}
	$.ajax({
        	url: "ajax_registration_update.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			    if(data==1){
					alert("Registration of Address Successfull");
					window.location="index.php";
				}else if(data.indexOf('1 || ') > -1){
						//window.location="index.php";
						var str =data.split(" || ");						
						window.location=str[1];
				}
				if(data==0){
					alert("Registration of Address Failed");
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
		
			<li><a href="register.php"><?php echo $lang_104; ?></a></li>
		</ul>
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<h2 class="title"><?php echo $lang_357; ?></h2>
				<p><?php echo $lang_358; ?></p>
				<form action="javascript:void(0);" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix" id="ajax_des">
					<fieldset id="account">
						<legend><?php echo $lang_108; ?></legend>
						<div class="form-group" style="display: none;">
							<label class="col-sm-2 control-label"><?php echo $lang_109; ?></label>
							<div class="col-sm-10">
								<div class="radio">
									<label>
										<input type="radio" id="customer_group_id" value="1" checked="checked"> <?php echo $lang_110; ?>
									</label>
								</div>
							</div>
						</div>

						<input type="hidden" name="ac_id" id="ac_id" value="<?php echo $customer_details[0]["ac_id"];?>" >
						
						<div class="form-group">
							<label class="col-sm-2 control-label" for="name"><?php echo $lang_128; ?></label>
							<div class="col-sm-10">
								<input type="text" name="name" id="name" value="<?php echo $customer_details[0]["name"];?>" placeholder="First Name" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="input-email"><?php echo $lang_113; ?></label>
							<div class="col-sm-10">
								<input type="email" name="email" id="email" value="<?php echo $customer_details[0]["email"];?>" placeholder="E-Mail" id="input-email" class="form-control" readonly>
							</div>
						</div>
					</fieldset>

					<fieldset id="address3">
						<legend><?php echo $lang_114; ?></legend>
						
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-address-1"><?php echo $lang_115; ?></label>
							<div class="col-sm-10">
								<input type="text" name="address" id="address" value="" placeholder="Address" id="input-address-1" class="form-control">
							</div>
						</div>
						
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-country"><?php echo $lang_117; ?></label>
							<div class="col-sm-10">							
								<input name="country" id="country" class="form-control">								
							</div>
						</div>
						
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-zone"><?php echo $lang_69; ?></label>
							<div class="col-sm-10">
								<input name="city" id="city" class="form-control">
								
							</div>
						</div>
						<div class="form-group required">
							<label class="col-sm-2 control-label" for="input-postcode"><?php echo $lang_59; ?></label>
							<div class="col-sm-10">
								<input type="text" name="phone" id="phone" value="" placeholder="Phone No" id="input-postcode" class="form-control">
							</div>
						</div>
					</fieldset>
					<div class="buttons">
						<div class="pull-right">
							<input type="submit" value="Continue" class="btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- //Main Container -->
	

	<!-- Footer Container -->
	<?php
	include("include/footer.php");
}else{
	echo '<script>alert("Your address have allready registration!");window.location="index.php";</script>';
}
	?>