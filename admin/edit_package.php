<?php
require_once("function.php");
$pkg=seeMoreDetails("name","ambit_membership",array("p_id"=>$_POST["id"]));
$price=seeMoreDetails("price","ambit_membership",array("p_id"=>$_POST["id"]));
$image=seeMoreDetails("image","ambit_membership",array("p_id"=>$_POST["id"]));
$no_of_product=seeMoreDetails("no_of_product","ambit_package_description",array("package_id"=>$_POST["id"]));
$no_of_image=seeMoreDetails("no_of_image","ambit_package_description",array("package_id"=>$_POST["id"]));
$no_of_featured=seeMoreDetails("no_of_featured","ambit_package_description",array("package_id"=>$_POST["id"]));
?>

<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update Package <span style="color: red;opacity: 0.6;">(** -1 For Unlimited)</span>
</span>
</div>
 
<form method="post" action=""   enctype="multipart/form-data" >
<div class="panel-body pn">


<div class="section">
Package Name:
<label for="answer" class="field prepend-icon">
<input type="text" name="name" id="pkg_name" value="<?php echo $pkg;  ?>" style="margin: 0px; width: 938px;" />
</label>
</div>

<div class="section">
Package Price:
<label for="Price" class="field prepend-icon">
<input type="text" name="price" id="new_price" value="<?php echo $price;  ?>" style="margin: 0px; width: 938px;" />
</label>
</div>

<div class="section">
Package Photo
<label for="Price" class="field prepend-icon">
<input type="file" name="new_image" id="new_image"  style="margin: 0px; width: 938px;" />
</label>
<img src="../image/<?php echo $image;  ?>" width="100px" />
</div>

<div class="section">
Post Product Limit:
<label for="Price" class="field prepend-icon">
<input type="text" name="no_of_product" id="no_of_product" value="<?php echo $no_of_product;  ?>" style="margin: 0px; width: 938px;" />
</label>
</div>

<div class="section">
Post Product Photo Limit:
<label for="Price" class="field prepend-icon">
<input type="text" name="no_of_image" id="no_of_image" value="<?php echo $no_of_image;  ?>" style="margin: 0px; width: 938px;" />
</label>
</div>
<div class="section">
Featured Product Limit:
<label for="Price" class="field prepend-icon">
<input type="text" name="no_of_featured" id="no_of_featured" value="<?php echo $no_of_featured;  ?>" style="margin: 0px; width: 938px;" />
</label>
</div>
<input type="hidden" name="p_id" value="<?php echo $_POST["id"]; ?>">
<br/>
<div class="section">
<div class="pull-right">
<input type="submit" name="update"  class="btn  btn-primary" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>