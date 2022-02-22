<?php
session_start();
require_once("function.php");
if(!isset($_SESSION["vendor_id"]) && !isset($_SESSION["vendor_email"])){
?>
<!DOCTYPE html>
<html>
<head>
 
<meta charset="utf-8">
<title>Vendor Admin Panel</title>
<meta name="keywords" content="Vendor Admin Panel"/>
<meta name="description" content="Vendor Admin Panel">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
 
<link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
 
<link rel="stylesheet" type="text/css" href="assets/allcp/forms/css/forms.css">
 
<link rel="shortcut icon" href="assets/img/favicon.ico">
<script type='text/javascript' src='js/jquery-1.6.2.min.js'></script>
<script type="text/javascript">
function myValidation(){
	var username=$("#username").val();
	var password=$("#password").val();
	if(username.trim()==""){
		alert("Please enter user name");
		$("#username").focus();
		return false;
	}
	if(password.trim()==""){
		alert("Please enter Password");
		$("#password").focus();
		return false;
	}
	$.post("ajax_login_vendr.php",{email:username,password:password},function(r){
		 //alert(r);
		if(r==1){
			//alert("success");
			window.location="index.php"
		}else{
		alert("login failed !")	
		}
	});
}
</script>
 
<!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="utility-page sb-l-c sb-r-c">
 
<div id="main" class="animated fadeIn">
 
<section id="content_wrapper">
<div id="canvas-wrapper">
<canvas id="demo-canvas"></canvas>
</div>
 
<section id="content">
 
<div class="allcp-form theme-primary mw320" id="login">
<div class="text-center mb20"><img src="assets/img/<?php echo seeMoreDetails("login_page_logo","admin",array());  ?>" class="img-responsive" alt="Logo"/></div>
<div class="panel mw320">
<form method="post" action="javascript:void(0);" id="form-login" onsubmit="return myValidation();">
<div class="panel-body pn mv10">
<div class="section">
<label for="username" class="field prepend-icon">
<input type="text" name="username" id="username" class="gui-input" placeholder="<?php echo $lang_113; ?>">
<label for="username" class="field-icon">
<i class="fa fa-user"></i>
</label>
</label>
</div>
 
<div class="section">
<label for="password" class="field prepend-icon">
<input type="password" name="password" id="password" class="gui-input" placeholder="<?php echo $lang_76; ?>">
<label for="password" class="field-icon">
<i class="fa fa-lock"></i>
</label>
</label>
</div>
 
<div class="section">
<!-- <div class="bs-component pull-left pt5"> -->
<div class="pull-left pt5">
<div class="radio-custom radio-primary mb5 lh25">
<input type="radio" id="remember" name="remember">
<label for="remember"><?php echo $lang_206; ?></label>
</div>
</div>
<button type="submit" class="btn btn-bordered btn-primary pull-right"><?php echo $lang_70; ?></button>
</div>
<!---->
<div class="section">
<div class="pull-left pt5">
<a href="forget_pass.php" class="forgot"><?php echo $lang_77; ?></a>
</div>
</div>
 
</form>
</div>
 
</div>
 
</section>
 
</section>
 
</div>
 
 
 
<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script src="assets/js/plugins/canvasbg/canvasbg.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
 
<script type="text/javascript">
    jQuery(document).ready(function () {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();

        // Init CanvasBG
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 5,
                y: window.innerHeight / 10
            }
        });

    });
</script>
 
</body>
</html>
<?php
}else{
	echo '<script>window.location="index.php";</script>';
}
?>
