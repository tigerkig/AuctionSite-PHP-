<script type="text/javascript">
	function fetch_city(){
		var cn_id=$("#update_field").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#city_update").html(response);
			}
		});
	}

	function fetch_city1(){
		var cn_id=$("#delete_field").val();
		$.ajax({
			url:'fetch_city.php?cn_id='+cn_id,
			type:'post',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			success:function(response){
				//alert(response);
				$("#city_delete").html(response);
			}
		});
	}
</script>

<?php
echo '||';
require_once("function.php");

//Add Country
if(isset($_POST["msg"]) && $_POST["msg"]=='add_country'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_country");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Update Country
if(isset($_POST["msg"]) && $_POST["msg"]=='update_country'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_country",$_POST,array("cn_id"=>$_POST["cn_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Delete Country
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_country'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_country",$_POST);
	doDelete("ambit_city",array("ct_cn_id"=>$_POST["cn_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Add City
if(isset($_POST["msg"]) && $_POST["msg"]=='add_city'){
	unset($_POST["msg"]);
	$status=doInsert($_POST,"ambit_city");
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}


//Update City
if(isset($_POST["msg"]) && $_POST["msg"]=='update_city'){
	unset($_POST["msg"]);
	$status=doUpdate("ambit_city",$_POST,array("ct_id"=>$_POST["ct_id"]));
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}

//Delete City
if(isset($_POST["msg"]) && $_POST["msg"]=='delete_city'){
	unset($_POST["msg"]);
	$status=doDelete("ambit_city",$_POST);
	if($status){
		echo '1||';
	}else{
		echo '0||';
	}
}
?>


<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Add Country
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<input type="text" name="country" id="add_country" value="" />
</label>
</div>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="add_cntry_validation();" value="Add" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update Country
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="update_cntry">
<option value="0">Select Country</option>
<?php
$country=getDetails(doSelect("cn_id,country","country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["country"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>

<div class="section">
<label for="field" class="field prepend-icon">
<input type="text"  id="new_country" value="" />
</label>
</div>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_cntry_validation();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete Country
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="delete_cntry_field">
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,country","country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["country"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>



<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="delete_cntry_validation();" value="Delete" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
 <!-- For City -->
 <!-- For City -->
 <!-- For City -->
 <!-- For City -->
 <hr/>
<div class="panel-heading">
<span class="panel-title">
Add City
</span>
</div>
 
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="cntry_id">
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,country","country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["country"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>

<div class="section">
<label for="field" class="field prepend-icon">
<input type="text"  id="add_city" value="" />
</label>
</div>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="add_city_validation();" value="Add" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>

<hr>
<div class="panel-heading">
<span class="panel-title">
Update City
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select name="field" id="update_field" onchange="fetch_city();">
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,country","country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["country"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>

<div class="section">
<label for="field" class="field prepend-icon">
<select name="city" id="city_update">
<option value="0">Select City</option>
</select>
</label>
</div>

<div class="section">
<label for="field" class="field prepend-icon">
<input type="text"  id="update_city" value="" />
</label>
</div>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="update_city_validation();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>


<hr>
<div class="panel-heading">
<span class="panel-title">
Delete City
</span>
</div>
<form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<select name="field" id="delete_field" onchange="fetch_city1();">
<option value="0" >Select Country </option>
<?php
$country=getDetails(doSelect("cn_id,country","country",array()));
foreach($country as $k=>$v){
?>
<option value="<?php echo $v["cn_id"]; ?>" >
<?php echo $v["country"];  ?>
</option>
<?php
}
?>
</select>
</label>
</div>

<div class="section">
<label for="field" class="field prepend-icon">
<select  id="city_delete">
<option value="0">Select City</option>
</select>
</label>
</div>



<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary" onclick="delete_city_validation();" value="Delete" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>