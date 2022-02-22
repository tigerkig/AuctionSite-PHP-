<?php
require_once("function.php");
$status=doUpdate("site_settings",$_POST,array("st_id"=>$_POST["st_id"]));


?>