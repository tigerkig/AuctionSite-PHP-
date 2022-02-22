<?php
session_start();
require_once("function.php");
include("include/header.php");

?>
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
<script type="text/javascript"> 
	function send_mail(){
		//alert("siddhartha");
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var name=$("#name").val();
	var email=$("#email").val();

	var enquiry=$("#enquiry").val();
	if(name.trim()==""){
		alert("Name Required");
		$("#name").focus();
		return false;
	}
	if(email.trim()==""){
		alert("Email Required");
		$("#email").focus();
		return false;
	}
	if(!regex.test(email)){
      alert("email invalid");
      $("#email").val("");
      $("#email").focus();
      return false;
    }
	if(enquiry.trim()==""){
		alert("Enquiry Required");
		$("#enquiry").focus();
		return false;
	}
	$.post(
		"send_mail.php",
		{name:name,email:email,enquiry:enquiry, name:name},
		function(r){
			if(r==1){
				$("#name").val("");
				$("#email").val("");
				$("#enquiry").val("");
				$("#msg").html('<font color="blue">Mail Send Successfully</font>');
			}
			if(r==0){
				$("#msg").html('<font color="red">Sending Failed</font>');
			}
		}
		);

	}

</script>
<div class="main-container container">
	<ul class="breadcrumb">
		<li><a href="index.php"><i class="fa fa-home"></i></a></li>
		<li><a href="contact.php"><?php echo $lang_57; ?></a></li>			
	</ul>
	
	<div class="row">
		<div id="content" class="col-sm-12">
			<div class="page-title">
				<h2><?php echo $lang_57; ?></h2>
			</div>
			
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2969.859523775563!2d-87.6788127!3d41.8958781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2df9f2ac972d%3A0xa3bf13668a205acf!2sOuslet!5e0!3m2!1sen!2sus!4v1609110426046!5m2!1sen!2sus" width="100%" style="border:0;border: 1px solid #d5d0d0;padding: 5px;border-radius: 10px;" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
			<div class="container" style="margin-top:22px">
    <div class="row contact_m_part">
        <div class="col col-md-7">
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> <?php echo $lang_57; ?>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group frompart">
                            <label for="name"><?php echo $lang_128; ?></label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group frompart">
                            <label for="email"><?php echo $lang_342; ?></label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted"><?php echo $lang_343; ?></small>
                        </div>
                        <div class="form-group frompart">
                            <label for="message"><?php echo $lang_341; ?></label>
                            <textarea name="enquiry" rows="10" id="enquiry" class="form-control" required></textarea>
                        </div>
                        <div class="mx-auto">
							<span id="msg"></span> &nbsp &nbsp
							<button class="btn btn-default buttonGray" type="submit" onclick="send_mail();">
								<span><?php echo $lang_64; ?></span>
							</button>
                    	</div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-5">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="addressHeader fa fa-home"></i><?php echo $lang_314; ?> </div>
                <div class="card-body">
					<div class="">
						<div class="name-store">
							<h3><?php echo $lang_58; ?></h3>
						</div>
						<address>
						<div class="address clearfix1 form-group">
								<div class="icon icons">
									<i class="fa fa-building-o"></i>
								</div>
								<div class="text"><?php  echo get_site_settings(26); ?></div>
							</div>
							<div class="address clearfix1 form-group">
								<div class="icon icons">
									<i class="fa fa-home"></i>
								</div>
								<div class="text"><?php  echo get_site_settings(28); ?></div>
							</div>
							<div class="phone form-group">
								<div class="icon icons">
									<i class="fa fa-phone"></i>
								</div>
								<div class="text"><?php echo $lang_59; ?> :<?php  echo get_site_settings(22); ?></div>
							</div>
							<div class="comment">             
							<?php  echo get_site_settings(27); ?>
							</div>
						</address>
					</div>
                </div>

            </div>
        </div>
    </div>
</div>
		</div>
	</div>
</div>


<style>
	.container {
		padding : 0px;
	}
	.card-header{
		    padding-top: 10px;
		    padding-left: 20px;
		    border-top-left-radius: 10px;
		    border-top-right-radius: 10px;

		}
	.bg-primary {
		    color: #fff;
		    background-color: #666666;
		    height: 40px;
		    display: flex;
		    vertical-align: middle;
		    text-align: center;
		}
	.fa-envelope{
		padding-top: 5px;
    	padding-right: 5px;
	}
	.card-body{
		 border: #666666 2px solid;
		 border-bottom-left-radius: 5px;
		   border-bottom-right-radius: 5px;
	}
	.bg-success{
		height: 40px	;
		color: white;
		background-color: #666666;
	}
	.addressHeader{
		color: white;
		padding-right: 5px;

	}
	
	.frompart{
		width: 94%;
	}
	.btn-primary{
		background-color: #666666;
	}
	.btn-primary:hover{
		background-color: #3498db;
		border-color: #cccccc;
	}
	.clearfix1 {
		display: flex;
	}
	.phone {
		display: flex;
	}
	.icons{
		padding-left: 10px;
		padding-right: 10px;
	}
	.name-store{
		padding-left: 10px;
	}
	.comment {
		padding: 15px;
	}
	.frompart {
	    width: 94%;
	    margin: 0 auto;
	}
	.mx-auto{
		padding: 5px;
	}
</style>
	<!-- Footer Container -->
<?php
	include("include/footer.php");
?>