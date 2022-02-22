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
<form method="post" action="javascript:void(0);" id="form-login" onsubmit="return forget_pass();">
<div class="panel-body pn mv10">
<div class="section">
<label for="username" class="field prepend-icon">
<input type="text" name="email" id="email" class="gui-input" placeholder="<?php echo $lang_75; ?>">
<label for="username" class="field-icon">
<i class="fa fa-user"></i>
</label>
</label>
</div>
<div class="section">
<button type="submit" class="btn btn-bordered btn-primary pull-right"><?php echo $lang_64; ?></button>
</div>
<div class="section">
<div class="pull-left pt5">
<a href="vendor_login.php" class="forgot"><?php echo $lang_70; ?></a>
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
