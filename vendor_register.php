<?php
require_once("function.php");
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
		if(country.trim()=="0"){
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
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var fname=$("#fname").val();
		var lname=$("#lname").val();
		var email=$("#email").val();
		var phone=$("#phone").val();
		//var fax=$("#fax").val();
		var image=$("#image").val();
		var company=$("#company").val();
		var address_one=$("#address_one").val();
		//var address_two=$("#address_two").val();
		var country=$("#country").val();
		var city=$("#city").val();
		var post_code=$("#post_code").val();
		var password=$("#password").val();
		var cpassword=$("#cpassword").val();


		var browser = $('#browser').val();


		if(fname.trim()==""){
			$("#fname").focus();
			return false;
		}
		if(lname.trim()==""){
			$("#lname").focus();
			return false;
		}
		if(email.trim()==""){
			$("#email").focus();
			return false;
		}
		if(!regex.test(email)){
		      $("#email").val("");
		      $("#email").focus();
		      return false;
		    }
		if(phone.trim()==""){
			$("#phone").focus();
			return false;
		}

		if(isNaN(phone)){
		    $("#phone").val("");
		    $("#phone").focus();
			return false;
		}

		//     if(fax.trim()==""){
		// 	alert("Fax Required");
		// 	$("#fax").focus();
		// 	return false;
		// }
		if(image.trim()==""){
			$("#image").focus();
			return false;
		}
		   if(company.trim()==""){
			$("#company").focus();
			return false;
		}

		if(address_one.trim()==""){
			$("#address_one").focus();
			return false;
		}

		// if(address_two.trim()==""){
		// 	alert("Address Required");
		// 	$("#address_two").focus();
		// 	return false;
		// }

		if(country.trim()=="0"){
			$("#country").focus();
			return false;
		}

		// if(city.trim()=="0"){
		if(city.trim()==""){
			$("#city").focus();
			return false;
		}

		if(post_code.trim()==""){
			$("#post_code").focus();
			return false;
		}

		if(password.trim()==""){
			$("#password").focus();
			return false;
		}

		if(cpassword.trim()==""){
			$("#cpassword").focus();
			return false;
		}

		if(password != cpassword){
			document.getElementById("sellerZoneMismatch").style.display = "block";
			$("#cpassword").val("");
			$("#cpassword").focus();
			return false;
		} else {
			document.getElementById("sellerZoneMismatch").style.display = "none";
		}

		if(password.length < 8){
			document.getElementById("sellerZoneDigit").style.display = "block";
			$("#password").focus();
			return false;	
		} else {
			document.getElementById("sellerZoneDigit").style.display = "none";
		}

		if (!$('#check_id').is(":checked"))
		{
			toastr.warning("You Have to agree with terms & condition") 
		  return false;
		}


	
			$.ajax({
	        	url: "ajax_vendor_registration.php",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
	    	    cache: false,
				processData:false,
				success: function(data)
			    {
					if(data==1){
						toastr.success("Registration Successfull");
						setTimeout(function() { window.location="index.php" }, 1000);
					}
					if(data==0){
						// setTimeout(function() { "Registration Failed" }, 1000);
						toastr.warning("Registration Failed");
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
	<div class="main-container container" id="sellerZone">
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>
			<li><a href="vendor_register.php"><?php  echo $lang_129; ?></a></li>
			<li><a href="vendor_register.php"><?php  echo $lang_104; ?></a></li>
		</ul>
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<h2 class="title"><?php  echo $lang_105; ?></h2>
				<p><?php  echo $lang_106; ?> <a href="vendor/vendor_login.php"><?php  echo $lang_107; ?></a>.</p>
				<form action="javascript:void(0);" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix" id="ajax_des">
					<div class="sellerDetailAddress row">
						<fieldset id="account" class="col-sm-6">
							<legend ><?php  echo $lang_108; ?></legend>
							<div class="form-group required" style="display: none;">
								<label class="col-sm-2 control-label"><?php  echo $lang_109; ?></label>
								<div class="col-sm-10">
									<div class="radio">
										<label>
											<input type="radio" id="customer_group_id" value="1" checked="checked"> <?php  echo $lang_110; ?>
										</label>
									</div>
								</div>
							</div>

							<div class="form-group required">
								<label class="col-sm-4 control-label" for="input-firstname"><?php  echo $lang_111; ?></label>
								<div class="col-sm-6">
									<input type="text" name="fname" id="fname" value="" placeholder="<?php  echo $lang_111; ?>" id="input-firstname"
									 class="form-control" required>
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-4 control-label" for="input-lastname"><?php  echo $lang_112; ?></label>
								<div class="col-sm-6">
									<input type="text" name="lname" id="lname" value="" placeholder="<?php  echo $lang_112; ?>" id="input-lastname" 
									class="form-control" required>
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-4 control-label" for="input-email"><?php  echo $lang_113; ?></label>
								<div class="col-sm-6">
									<input type="email" name="email" id="email" value="" placeholder="<?php  echo $lang_113; ?>" id="input-email"
									 class="form-control" required>
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-4 control-label" for="input-telephone"><?php  echo $lang_130; ?></label>
								<div class="col-sm-6">
									<input type="tel" name="phone" id="phone" value="" placeholder="<?php  echo $lang_130; ?>" id="input-telephone" 
									class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="input-fax"><?php  echo $lang_132; ?></label>
								<div class="col-sm-6">
									<input type="file" name="image" id="image" value=""  id="input-fax" class="form-control"  required>
								</div>
							</div>
						</fieldset>
						<fieldset id="address4" class="col-sm-6">
							<legend ><?php  echo $lang_114; ?></legend>
							<div class="form-group required">
								<label class="col-sm-4 control-label" for="input-company"><?php  echo $lang_133; ?></label>
								<div class="col-sm-6">
									<input type="text" name="company" id="company" value="" placeholder="<?php  echo $lang_133; ?>" id="input-company" 
									class="form-control" required>
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-4 control-label" for="input-address-1"><?php  echo $lang_134; ?></label>
								<div class="col-sm-6">
									<input type="text" name="address_one" id="address_one" value="" placeholder="<?php  echo $lang_134; ?>" id="input-address-1"
									 class="form-control" required>
								</div>
							</div>
						
							<div class="form-group required">
								<label class="col-sm-4 control-label" for="input-country"><?php  echo $lang_117; ?></label>
								<div class="col-sm-6">
									
									<select id="country" name="country" class="form-control"  onchange="fetch_city_name()">
										<option value="0"></option>
										<?php
											$country=getDetails(doSelect("cn_id,cn_name","ambit_country",array(), "ORDER BY cn_id"));
											foreach($country as $k=>$v){
											?>
										<option value="<?php echo $v["cn_id"]; ?>"><?php echo trim($v["cn_name"]); ?></option>
										<?php
											}
											?>
									</select required>
									<i class="arrow double"></i>
								</div>
							</div>
							

							<div class="form-group required">
								<label class="col-sm-4 control-label" for="input-zone"><?php  echo $lang_136; ?></label>
								<div class="col-sm-6">
									<!-- <select name="city" id="city" class="form-control" >
										<option value=""> --- <?php  echo $lang_69; ?> --- </option>
									</select> -->
									<input list="cities" name="city" id="city" value="" class="form-control" placeholder="<?php  echo $lang_136; ?>">
									<!-- <datalist id="cities" >
										
									</datalist> -->
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-4 control-label" for="input-postcode"><?php  echo $lang_119; ?></label>
								<div class="col-sm-6">
									<input type="text" name="post_code" id="post_code" value="" placeholder="<?php  echo $lang_119; ?>" id="input-postcode" 
									class="form-control" required>
								</div>
							</div>
							
						</fieldset>
					</div>
					<div class="sellerZonePwAgree row">
						<div class="sellerZonePw col-sm-6" id="sellerZonePw">
							<fieldset>
								<legend><?php  echo $lang_120; ?></legend>
								<div class="form-group required">
									<label class="col-sm-4 control-label" for="input-password"><?php  echo $lang_76; ?></label>
									<div class="col-sm-6">
										<input type="password" name="password" id="password" value="" placeholder="<?php  echo $lang_76; ?>" id="input-password" 
										class="form-control" required>
									</div>
								</div>
								<div class="form-group required">
									<label class="col-sm-4 control-label" for="input-confirm"><?php  echo $lang_121; ?></label>
									<div class="col-sm-6">
										<input type="password" name="cpassword" id="cpassword" value="" placeholder="<?php  echo $lang_121; ?>" id="input-confirm" 
										class="form-control" required>
									</div>
								</div>
								<div id="sellerZoneMismatch">
									<label class="col-sm-4" for="input-password"></label>
									<div class="col-sm-6 alertMismatchText">
										<?php  echo $lang_351; ?>
									</div>
								</div>
								<div id="sellerZoneDigit">
									<label class="col-sm-4" for="input-password"></label>
									<div class="col-sm-6 alertDigitText">
										<?php  echo $lang_352; ?>
									</div>
								</div>
							</fieldset>
						</div>
					
						<div class="sellerZoneAgree col-sm-6">
							<div class="ResAgreeCheck">
								<input class="box-checkbox" type="checkbox" name="terms_agree" id="check_id" value="1" checked>
							</div>
							<div class="pull-right termCondition"><?php  echo $lang_122; ?>
								<a href="terms_condition.php" class="agree"><b><?php  echo $lang_123; ?></b></a>
							</div>
							<div class="continueBtn">
								<input type="submit" value="<?php  echo $lang_72; ?>" class="btn btn-primary">
							</div>
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
	?>

	<script>

	</script>