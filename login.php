<?php
session_start();
require_once("function.php");


// Google login

// Include configuration file
// require_once 'login_google/google_config.php';

// // Include User library file
// //require_once 'login_google/class/class_user.php';

// if (isset($_GET['code'])) {
//     $gClient->authenticate($_GET['code']);
//     $_SESSION['token'] = $gClient->getAccessToken();
//     header('Location: '.filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL));
//     //header('Location: localhost/ouslet/index.php');
// }

// if (isset($_SESSION['token'])) {
//     $gClient->setAccessToken($_SESSION['token']);
// }

// if ($gClient->getAccessToken()) {
//     // Get user profile data from google
//     $gpUserProfile = $google_oauthV2->userinfo->get();
    
   
    
//     // Getting user profile info
//     $gpUserData = array();
//     $gpUserData['oauth_uid'] = !empty($gpUserProfile['id'])?$gpUserProfile['id']:'';
//     $gpUserData['first_name'] = !empty($gpUserProfile['given_name'])?$gpUserProfile['given_name']:'';
//     $gpUserData['last_name'] = !empty($gpUserProfile['family_name'])?$gpUserProfile['family_name']:'';
//     $gpUserData['email'] = !empty($gpUserProfile['email'])?$gpUserProfile['email']:'';
//     $gpUserData['gender'] = !empty($gpUserProfile['gender'])?$gpUserProfile['gender']:'';
//     $gpUserData['locale'] = !empty($gpUserProfile['locale'])?$gpUserProfile['locale']:'';
//     $gpUserData['picture'] = !empty($gpUserProfile['picture'])?$gpUserProfile['picture']:'';
//     $gpUserData['link'] = !empty($gpUserProfile['link'])?$gpUserProfile['link']:'';
    
//     // Insert or update user data to the database
//     $gpUserData['oauth_provider'] = 'google';
   
//     $userData = checkUser($gpUserData['email']);
    
//     if(empty($userData)){
// 		$_SESSION['login_google_status'] = 0;
// 		$user_name = $gpUserData['first_name']." ".$gpUserData['last_name'];
// 		$status = doInsert(array("name"=>$user_name, "email"=>$gpUserData['email'], "status"=>1), "ambit_customer");
		
// 	}elseif($userData[0]['status'] == 1){
// 		$_SESSION['login_google_status'] = 1;
// 		header('Location: index.php');
// 	}else{
// 		$_SESSION['login_google_status'] = 2;
// 		//header('Location: '.$_SERVER['PHP_SELF']);
// 		$status = doUpdate("ambit_customer",array("status"=>1),array("ac_id"=>$userData[0]['ac_id']));
// 	}    
   
// } else {
//     // Get login url
//     $authUrl = $gClient->createAuthUrl();
// }

// // Google login end

// // Facebook login start

// require_once 'login_facebook/config.php';
// /*if(isset($_SESSION['userData'])){
// 	header('location: view.php');
// }*/
// $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

// // Facebook login end


if(!isset($_SESSION["ac_id"])){
//require_once("function.php");
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
	$(document).ready(function(){
		$("#email").val("");
		$("#password").empty();
	})
	function login(){
		//alert("sidd");
		var email=$("#email").val();
		var password=$("#password").val();
		if(email.trim()==""){
			$("#email").focus();
			return false;
		}

		if(password.trim()==""){
			$("#password").focus();
			return false;
		}
		$.post(
			"ajax_login.php",
			{email:email,password:password},
			function(r){

				// if(r==0){
				// 	alert("Login Failed");
				// }
				// if(r==1){
				// 	window.location="index.php";
				// }
				/*if(r=='0 || '){
					alert("Login Failed");
				} else if(r=='1 || '){
					window.location="index.php";
				}*/
				if(r.indexOf('0 || ') > -1){
					toastr.warning("Login Failed") 
				} else if(r.indexOf('1 || ') > -1){
					//window.location="index.php";
					var str =r.split(" || ");
					
					toastr.success("Login Successfull !");
					setTimeout(function() { window.location=str[1] }, 1000);

					// window.location=str[1];
				}
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
										<h2><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo $lang_73; ?></h2>
										<p><strong><?php echo $lang_74; ?></strong></p>
										<div class="form-group">
											<label class="control-label " for="input-email"><?php echo $lang_75; ?></label>
											<input type="email" name="email" id="email" class="form-control" required/>
										</div>
										<div class="form-group">
											<label class="control-label " for="input-password"><?php echo $lang_76; ?></label>
											<input type="password" name="password"  id="password" class="form-control" required/>
										</div>
									</div>
									<div class="bottom-form">
										<a href="forget_pass.php" class="forgot"><?php echo $lang_77; ?></a>
										<input type="submit" value="Login" onclick="login();" class="btn btn-default pull-right" />
									</div>
									
									<div class="bottom-form col-md-6 googleLogin">
										<!--<a href="<?php echo filter_var($authUrl, FILTER_SANITIZE_URL);?>"><img src="login_google/image/sign-in-with-google.svg" alt="sign-in-with-google" /></a>-->
										<a href="<?php echo filter_var($authUrl, FILTER_SANITIZE_URL);?>"><img src="login_google/image/login-google.png"   style="max-width: 100%;" alt="sign-in-with-google" /></a>
									
										<?php
											if($_SESSION['login_google_status'] === 0){
												echo '<span style="color:red">You are not registered.</span>';
											}elseif($_SESSION['login_google_status'] == 2){
												echo '<span style="color:red">Please check login information via your email.</span>';
											}
										?>
									</div>
									<div class="bottom-form col-md-6 facebookLogin">
										<?php
										//require_once('login_facebook/index.php');
										?>
									
										<a href="<?php echo $loginURL;?>"><img src="login_facebook/assets/image/loginfacebook.png"   style="max-width: 100%;" alt="sign-in-with-google" /></a>
									
										<?php
											if($_SESSION['login_facebook_status'] === 0){
												echo '<span style="color:red">You are not registered.</span>';
											}elseif($_SESSION['login_facebook_status'] == 2){
												echo '<span style="color:red">Please check login information via your email.</span>';
											}
										?>
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
	//echo '<script>alert("You have allready login");	window.location="index.php";</script>';
	echo '<script> window.location="index.php";</script>';
}
	?>