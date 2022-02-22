<?php
session_start();
if(isset($_SESSION["ac_id"])){
echo 1;	
}else{
echo 0;
$_SESSION["target_path"]=trim($_POST["target_path"]);
}


?>