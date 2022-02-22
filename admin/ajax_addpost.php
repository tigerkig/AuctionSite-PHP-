<?php
session_start();
require_once("function.php");
/* print_r($_POST);
print_r($_FILES); */

	$image=time().$_FILES["image"]["name"];
	$temp_name=$_FILES["image"]["tmp_name"];
	move_uploaded_file($temp_name,"../image/post_thumbnail/".$image);
	$_POST["image"]=$image;


$ptitle = $_POST["ptitle"];
$post_description = $_POST["post_description"];
	
	$query = "INSERT INTO ambit_blog(title, description, image) VALUES ('$ptitle', '$post_description', '$image')";
	return $status = mysqli_query($conn,$query);
//	$status=doInsert($_POST,"ambit_blog");

	if($status){
		echo 1;
	}else{
		echo 0;
	}

?>