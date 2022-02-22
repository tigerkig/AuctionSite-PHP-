<?php
session_start();
if(!isset($_SESSION["ac_id"])){
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
	function forget_pass(){
		//alert("sidd");
		var email=$("#email").val();
		if(email.trim()==""){
			alert("Email Required !");
			$("#email").focus();
			return false;
		}
		$.post(
			"ajax_forget_pass.php",
			{email:email},
			function(r){
				alert(r);
			}
			);

	}
</script>




	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>
			<li><a href="login.php"><?php echo $lang_70; ?></a></li>
		</ul>
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<div class="page-login">
				
					<div class="account-border">
						<div class="row">
							<div class="col-sm-6 new-customer">
								<div class="well">
									<h2><i class="fa fa-file-o" aria-hidden="true"></i> <?php echo $lang_71; ?></h2>
									<p><?php echo $lang_296; ?></p>
								</div>
								<div class="bottom-form">
									<a href="register.php" class="btn btn-default pull-right"><?php echo $lang_72; ?></a>
								</div>
							</div>
							
							<form action="javascript:void(0);" method="post" enctype="multipart/form-data">
								<div class="col-sm-6 customer-login">
									<div class="well">
										<h2><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo $lang_77; ?></h2>
										<p><strong><?php echo $lang_74; ?></strong></p>
										<div class="form-group">
											<label class="control-label " for="input-email"><?php echo $lang_75; ?></label>
											<input type="text" name="email" value="" id="email" class="form-control" />
										</div>
									</div>
									<div class="bottom-form">
										<a href="login.php" class="forgot"><?php echo $lang_70; ?></a>
										<input type="submit" value="<?php echo $lang_64; ?>" onclick="forget_pass();" class="btn btn-default pull-right" />
									</div>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- //Main Container -->
	

<!-- Footer Container -->
	<?php
	include("include/footer.php");
	}else{
	echo '<script>alert("You have allready login");window.location="index.php";</script>';
}
	?>