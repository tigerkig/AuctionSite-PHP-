<?php
session_start();
require_once("function.php");

?>

<?php
if(trim($_POST["msg"])=='fetch_product'){
?>
<option value="0">Select Product</option>
<?php
$product=getDetails(doSelect("apa_id,name","ambit_product_add",array("apa_vr_id"=>trim($_POST["vendor_id"]),"status"=>1)));
foreach($product as $k=>$v){
?>
<option value="<?php echo trim($v["apa_id"]); ?>"><?php echo $v["name"]; ?></option>
<?php
}
}
?>

<?php
if(trim($_POST["msg"])=='quantity'){
$quantity=seeMoreDetails("stock","ambit_product_add",array("apa_id"=>trim($_POST["apa_id"]),"status"=>1));
echo $quantity;
}
?>