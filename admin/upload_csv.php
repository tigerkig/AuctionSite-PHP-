<?php
session_start();
require_once("function.php");
if(isset($_FILES["csv_file"]["name"])){
	$csv_file=$_FILES["csv_file"]["name"];
	$temp_file=$_FILES["csv_file"]["tmp_name"];
	move_uploaded_file($temp_file,'../csv_file/'.$csv_file);
}

$inserted_data='';
$l=0;
$c=0;
$file = fopen("../csv_file/".$csv_file,"r");
while($row=fgetcsv($file)){
    if($c!=0){
		
	if($row[0]==""){
		echo 1;
		break;
	}
	$category=trim(get_cat_id($row[1]));
	if($category==''){
		echo 2;
		break;
	}
	$sub_cat=trim(get_sub_cat_id($row[1]));
	if($sub_cat==''){
		echo 2;
		break;
	}
	$sub_sub_cat=trim(get_sub_sub_cat_id($row[1]));
	if($sub_sub_cat==''){
		echo 2;
		break;
	}
	
	if(trim($row[9])==""){
		echo 3;
		break;
	}
	
	if(trim($row[16])=='simple' || trim($row[16])=='Simple'){
	$keep_in='0';
	}else{
	$keep_in='1';
	}
	$vendor_id=trim(get_vendor_id_by_email($row[18]));
	if($vendor_id==""){
		echo '404';
		break;
	}
	$field=array(
	"name" =>$row[0],
    "category" =>$category,
    "sub_cat" =>$sub_cat,
    "sub_sub_cat" =>$sub_sub_cat,
    "description" =>$row[2],
    "features" =>$row[3],
    "weight" =>$row[4].':'.get_weight_unit_id($row[5]),
    "color" =>get_color_id($row[6]),
	"size" =>$row[7].':'.get_size_unit_id($row[8]),
    "price" => $row[9].'  ||  '.$row[10].'  ||  '.$row[11].'  ||  '.$row[12],
    "brand" => get_brand_id($row[13]),
    "apa_vr_id" =>$vendor_id,
    "stock" => $row[14],
    "video" =>$row[15], 
    "status" => 0,
    "keep_in" =>$keep_in,
    "selling_price" =>$row[9]
	);
	/* echo '<pre>';
    print_r($field); */
	$status=doinsert($field,"ambit_product_add");
	if($l!=0){
	$insert_data.=',';
	}
	$l++;
	$insert_data.=$c;
	$_SESSION["insert_data"]=$insert_data;
	$recent_id=newly_insert_id();
	$image_array=explode(',',$row[17]);
	foreach($image_array as $k=>$v){
	doInsert(array("image"=>$v,"api_apa_id"=>$recent_id),"ambit_product_image");
	}
   }
   $c++;
}
echo ' || 10';
?>

<?php
$s=0;
$csv_array=array();
$file = fopen("../csv_file/".$csv_file,"r");
while($row=fgetcsv($file)){
if($s!=0){
$csv_array[$s]=$row;
}
$s++;
}
?>

||
<?php
if(isset($_SESSION["insert_data"]) && $_SESSION["insert_data"]!=''){
$data=explode(',',$_SESSION["insert_data"]);

?>
<table class="table table-bordered mbn">
<thead>
<tr class="default">
<th>Sl. No:</th>
<th>Title</th>
<th>Vendor Name</th>
</tr>
</thead>
<tbody>
<?php
/* print_r($csv_array);
print_r($data); */
$count=1;
foreach($csv_array as $k1=>$v1){
if(in_array($k1,$data)){
?>
<tr class="info">
<td><?php echo $count; ?></td>
<td><?php echo $v1[0]; ?></td>
<td><?php echo $v1[18]; ?></td>
</tr>
<?php
}else{
?>
<tr class="warning">
<td><?php echo $count; ?></td>
<td><?php echo $v1[0]; ?></td>
<td><?php echo $v1[18]; ?></td>
</tr>
<?php
}
$count++;
}
?>
</tbody>
</table>
<?php
unset($_SESSION["insert_data"]);
}

?>