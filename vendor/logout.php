<?php
session_start();
if(isset($_SESSION["vendor_id"])){
	session_destroy();
	echo '<script>window.location="vendor_login.php";</script>';
}


?>