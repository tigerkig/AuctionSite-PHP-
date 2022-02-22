<?php
session_start();
require_once("function.php");
$compare="";
if(isset($_SESSION["compare"]) && trim($_SESSION["compare"]) != ""){
	$count=count(explode("||",$_SESSION["compare"]));
}
if($count < 3){
if(isset($_SESSION["compare"]) && trim($_SESSION["compare"]) != ""){
$compare=$_SESSION["compare"].' || ';
}
$_SESSION["compare"]=$compare.$_POST["product_id"];
echo '1 || ';
}else{
	echo '0 || ';
}
?>
<p class="close-menu"></p>
								<a href="compare.php" class="clearfix">
									<strong><?php echo $lang_126; ?></strong>
									<span class="label"></span>
								</a>