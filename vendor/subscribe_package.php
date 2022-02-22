<?php
session_start();
require_once("function.php");
if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
$vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));

$_SESSION["main_menu"] = "dashboard";
$_SESSION["sub_menu"]  = "subscribe_package";

include("include/header.php");
?>

<section id="content_wrapper">
 

<header id="topbar" class="alt">
<div class="topbar-left">
<ol class="breadcrumb">
<li class="breadcrumb-icon">
<a href="index.php">
<span class="fa fa-usd"></span>
</a>
</li>
<li class="breadcrumb-active">
<a href="javascript:void(0);">My Package</a>
</li>



</ol>
</div>
<!-- <div class="topbar-right">
<div class="ib topbar-dropdown">
<label for="topbar-multiple" class="control-label">Reporting Period</label>
<select id="topbar-multiple" class="hidden">
<optgroup label="Filter By:">
<option value="1-1">Last 30 Days</option>
<option value="1-2" selected="selected">Last 60 Days</option>
<option value="1-3">Last Year</option>
</optgroup>
</select>
</div>
<div class="ml15 ib va-m" id="sidebar_right_toggle">
<div class="navbar-btn btn-group btn-group-number mv0">
<button class="btn btn-sm btn-default btn-bordered prn pln">
<i class="fa fa-bar-chart fs22 text-default"></i>
</button>
</div>
</div>
</div> -->
</header>
 
 
<section id="content" class="table-layout animated fadeIn">
 
<div class="chute chute-center">
 
<div class="row">
<div class="col-sm-12 col-xl-12">
<div class="panel panel-tile">
<div class="panel-body">
<div class="row pv10">
<div class="col-xs-5 ph10"><img src="assets/img/pages/package.png" width="150px" class="img-responsive mauto" alt=""/></div>
<?php
$val=trim(get_site_settings(30));
$val=explode("||",$val);

$p_id=getDetails(doSelect("abp_p_id","ambit_buy_package",array("abp_u_id"=>$_SESSION["vendor_id"],"status"=>"Pass")));

if(!empty($p_id)){
	$p_id=$p_id[0]["abp_p_id"];
	$package=seeMoreDetails("name","ambit_membership",array("p_id"=>$p_id));
}else{
	$package='Free';
}
?>
<div class="col-xs-7 pl5">
<a href="javascript:void(0);" style="text-decoration: none;"><h3 class="text-muted"><?php echo $lang_197; ?> <?php echo $package.' Package';  ?></h3></a>

</div>
<?php
if(!empty($p_id)){
	$cost=seeMoreDetails("price","ambit_membership",array("p_id"=>$p_id));
	$membership_currency=seeMoreDetails("currency","ambit_membership",array("p_id"=>$p_id));
}else{
	$cost=0;
}
?>
<div class="col-xs-7 pl5">
<a href="javascript:void(0);" style="text-decoration: none;"><h6 class="text-muted"><?php echo $lang_198; ?></h6></a>
<h2 class="fs50 mt5 mbn"><?php   echo currency1($membership_currency,$cost);  ?></h2>
<a href="javascript:void(0);" style="text-decoration: none;"><h6 class="text-muted"><?php echo $lang_199; ?></h6></a>
<?php
if(!empty($p_id)){
	$expire=get_date_str(seeMoreDetails("expire","ambit_buy_package",array("abp_u_id"=>$_SESSION["vendor_id"])));
}else{
	$expire='UNLIMITED';
}
?>
<h3><font color="red"><?php   echo $expire;  ?></font></h3>
</div>

</div>
</div>
</div>
</div>

<?php  
if(empty($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = $_SERVER['SCRIPT_NAME'];
}

// Strip off query string so dirname() doesn't get confused
$url = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
if($url=''){
$url = 'http://'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '/').'';
}
if($url==''){
$url = 'http://'.$_SERVER['HTTP_HOST'].'/'.ltrim(dirname($url), '').'';
}
$gateway=1;
$row_al=getDetails(doSelect("*","payment_gateway",array("id"=>$gateway)));

?>

<div class="col-md-12">
<div class="panel panel-visible" id="spy6">
<div class="panel-heading">
<div class="panel-title hidden-xs">
<?php echo $lang_143; ?> <span style="color: red;opacity: 0.6;">(** -1 <?php echo $lang_144; ?>)</span>
<?php
$select='p_id,name,price,no_of_product,no_of_featured,no_of_image,currency';
$from='ambit_membership,ambit_package_description';
$where=array('package_id'=>'p_id');
$result=getDetails(doSelect1($select,$from,$where));

?>
</div>
</div>
<div class="panel-body pn">
<div class="table-responsive">
<table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
<thead>
<tr>
<th class="va-m"><?php echo $lang_27; ?></th>
<th class="va-m"><?php echo $lang_47; ?></th>
<th class="va-m"><?php echo $lang_202; ?></th>
<th class="hidden-xs va-m"><?php echo $lang_200; ?></th>
<th class="hidden-xs va-m"><?php echo $lang_201; ?></th>
<th class="hidden-xs va-m"><?php echo $lang_138; ?></th>

</tr>
</thead>
<tbody>
<?php
foreach($result as $k=>$v){
?>
<tr>
<td ><?php echo ucfirst($v["name"]);  ?></td>
<td><?php if($v["price"] != 0) echo currency1($v["currency"],$v["price"]); else echo 'Free';  ?></td>
<?php
if($v["no_of_product"]== -1){
$property_p='<font color="red">Unlimited</font>';
}else{
$property_p=$v["no_of_product"];
}

?>
<td style="text-align: center;"><?php echo $property_p;  ?></td>
<?php
if($v["no_of_image"]== -1){
$property_ph='<font color="red">Unlimited</font>';
}else{
$property_ph=$v["no_of_image"];
}

?>
<td><?php echo $property_ph;  ?></td>
<?php
if($v["no_of_featured"]== -1){
$featured_pro_limit='<font color="red">Unlimited</font>';
}else{
$featured_pro_limit=$v["no_of_featured"];
}

?>
<td><?php echo $featured_pro_limit;  ?></td>
<td>
<?php
if(trim($v["price"])!= '0'){
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" >
<input type='hidden' name="cmd" value=_xclick>
<input type='hidden' name="business" value="<?php echo $row_al[0]["pg_id"];?>">
<input type='hidden' name="item_name" value="<?php echo $v["name"];  ?>">
<input type='hidden' name="amount" value="<?php echo $v["price"]; ?>">
<input type='hidden' name="no_note" value=1>
<input type='hidden' name="currency_code" value="USD<?php //echo get_page_settings(7);?>">
<input type='hidden' name="rm" value=2 />
<input type='hidden' name="custom" value="<?php echo $v["p_id"]; ?>||<?php echo $_SESSION["vendor_id"];?>" />
<input type='hidden' name="return" value="<?php echo $url;?>">
<input type='hidden' name="cancel_return" value="<?php echo $url;?>" />
<input type='hidden' name="notify_url" value="<?php echo $url;?>paypal.php" />
<input type='submit' class="btn btn-primary btn-block" value='<?php echo $lang_203; ?>' name="Buy"  />
</form>
<?php
}
?>
</td>
</tr>
<?php
}
?>
</tbody>
</table>

</div>
</div>
</div>
</div>



</div>
 

</div>

</section>
<script src="assets/js/jquery/jquery-1.11.1.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script src="assets/js/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/js/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/js/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="assets/js/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
 
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/tables-data.js"></script>
 
</body>
</html>
<?php
}else{
	echo '<script>window.location="vendor_login.php";</script>';
}

?>
