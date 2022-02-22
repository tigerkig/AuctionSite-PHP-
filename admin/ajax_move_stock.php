<?php
session_start();
require_once("function.php");

$from_quantity=trim($_POST["from_quantity"]);
$to_quantity=trim($_POST["to_quantity"]);
$add_quantity=trim($_POST["add_quantity"]);
$from_update_quantity=$from_quantity-$add_quantity;
$to_update_quantity=$to_quantity+$add_quantity;
doUpdate("ambit_product_add",array("stock"=>$from_update_quantity),array("apa_id"=>trim($_POST["from_product"])));
doUpdate("ambit_product_add",array("stock"=>$to_update_quantity),array("apa_id"=>trim($_POST["to_product"])));
?>