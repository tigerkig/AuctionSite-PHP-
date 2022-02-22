<?php
session_start();
require_once("function.php");
$_POST["password"]=md5($_POST["password"]);
$query=doSelect("*","admin",$_POST);
$check=loginCheck($query);
if(!empty($check)){
	foreach($check as $k=>$v){
		$_SESSION["username"]=$v["username"];
		$_SESSION["id"]=$v["id"];
	}
	echo 1;
}else{
	echo 0;
}

?>