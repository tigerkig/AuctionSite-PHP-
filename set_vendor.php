<?php
error_reporting(0);
require_once("config.php");
$cookie_name = "vr_id";
$cookie_value = $_GET['vr_id'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
?>