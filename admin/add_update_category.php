
<?php

require_once("function.php");

//Add Country
if(isset($_GET["msg"]) && $_GET["msg"]=='add_category'){
//print_r($_FILES);
//print_r($_POST);
if(isset($_FILES["pc_image"]) && trim($_FILES["pc_image"]["name"])!=""){
	$image=time().$_FILES["pc_image"]["name"];
	$temp_name=$_FILES["pc_image"]["tmp_name"];
	move_uploaded_file($temp_name,"../image/demo/shop/category/".$image);
	$_POST["pc_image"]=$image;
	$status=doInsert($_POST,"product_category");
	if($status){
		echo 1;
	}else{
		echo 0;
	}
}
}

//Update Country
if(isset($_POST["msg"]) && $_POST["msg"]=='update_category'){
	unset($_POST["msg"]);
	
	unset($_POST["new_category"]);
	unset($_POST["update_category"]);
	
	if(isset($_FILES["pc_update_image"]) && trim($_FILES["pc_update_image"]["name"])!=""){
		$image=time().$_FILES["pc_update_image"]["name"];
		$temp_name=$_FILES["pc_update_image"]["tmp_name"];
		move_uploaded_file($temp_name,"../image/demo/shop/category/".$image);
		$_POST["pc_image"]=$image;
	}
	
	$status=doUpdate("product_category",$_POST,array("pc_id"=>$_POST["pc_id"]));
	if($status){
		echo '1';
	}else{
		echo '0';
	}
}

//Delete Category
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_category'){
	unset($_POST["msg"]);
	$prev_image=seeMoreDetails("pc_image","product_category",$_POST);
	$status=doDelete('product_category',$_POST);
	$psc_id=getDetails(doSelect1("psc_id","product_sub_category",array("psc_pc_id"=>$_POST["pc_id"])));
	doDelete('product_sub_category',array("psc_pc_id"=>$_POST["pc_id"]));
	foreach($psc_id as $k=>$v){
	doDelete('product_sub_sub_cat',array("pssc_psc_id"=>$v["psc_id"]));	
	}
	if($status){
		if(file_exists("../image/demo/shop/category/".$prev_image)){
			unlink("../image/demo/shop/category/".$prev_image);
		}
		echo '1';
	}else{
		echo '0';
	}
}

//Add City
if(isset($_POST["msg"]) && $_POST["msg"]=='add_sub_cat'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"product_sub_category");
	if($status){
		echo '1';
	}else{
		echo '0';
	}
}


//Update City
if(isset($_POST["msg"]) && $_POST["msg"]=='update_sub_cat'){
	unset($_POST["msg"]);
	$status=doUpdate("product_sub_category",$_POST,array("psc_id"=>$_POST["psc_id"]));
	if($status){
		echo '1';
	}else{
		echo '0';
	}
}

//Delete City
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_sub_cat'){
	unset($_POST["msg"]);
	$status=doDelete("product_sub_category",$_POST);
	doDelete("product_sub_sub_cat",array("pssc_psc_id"=>$_POST["psc_id"]));
	if($status){
		echo '1';
	}else{
		echo '0';
	}
}


if(isset($_POST["msg"]) && $_POST["msg"]=='add_sub_sub_cat'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"product_sub_sub_cat");
	if($status){
		echo '1';
	}else{
		echo '0';
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=='update_sub_sub_cat'){
	unset($_POST["msg"]);
	$status=doUpdate("product_sub_sub_cat",$_POST,array("pssc_id"=>$_POST["pssc_id"]));
	
	if($status){
		echo '1';
	}else{
		echo '0';
	}
}

if(isset($_POST["msg"]) && $_POST["msg"]=='delete_sub_sub_cat'){
	unset($_POST["msg"]);
	$status=doDelete("product_sub_sub_cat",$_POST);
	
	if($status){
		echo '1';
	}else{
		echo '0';
	}
}
?>
