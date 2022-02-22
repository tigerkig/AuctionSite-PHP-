<?php
error_reporting(0);
require_once("config.php");
$cookie_name = "acu_id";
$cookie_value = $_GET['id'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30));
?>