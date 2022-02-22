<?php
session_start();
require_once("function.php");
include("include/header.php");
?>
<!-- //Header Top -->

<!-- Header center -->
<?php
include("include/header_center.php");
?>
<!-- //Header center -->

<!-- Header Bottom -->
<div class="header-bottom">
	<div class="container">
		<div class="row">
			
		<?php
			include("include/side_menu_close.php");
			?>
			
			<!-- Main menu -->
<?php
include("include/main_menu.php");
?>
			<!-- //end Main menu -->
			
		</div>
	</div>

</div>

<!-- Navbar switcher -->
<!-- //end Navbar switcher -->
	</header>
	<!-- //Header Container  -->
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>
			<li><a href="compare.php"><?php echo $lang_44; ?></a></li>
			
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-sm-12">
			  <h2 class="title" style="display: flex;justify-content: space-between;"><div><?php echo $lang_44; ?></div> <input class="btn btn-danger" id="button-confirm" value="Remove All" onClick="remove_compare();" type="button"></h2>
			  <div class="table-responsive">
			  <?php
			  if(isset($_SESSION["compare"]) && trim($_SESSION["compare"]) != ""){
				  $pro_id=explode("||",trim($_SESSION["compare"]));
				  $count=count($pro_id);
			  }
			  
			  ?>
				<table class="table table-bordered table-hover">
				  <thead>
					<tr>
					  <td colspan="4"><strong><?php echo $lang_45; ?></strong></td>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td><?php echo $lang_46; ?></td>
					 <?php
					for($i=0;$i < $count ; $i++){
					 ?>
					  <td><a href="product.php?id=<?php echo trim($pro_id[$i]);  ?>"><?php echo getProductName(trim($pro_id[$i])); ?></a></td>
					<?php
					}
					?>
					</tr>
					<tr>
					  <td><?php echo $lang_26; ?></td>
					  <?php
					for($i=0;$i < $count ; $i++){
					 ?>
					  <td class="text-center"><img class="img-thumbnail" title="Laptop Silver black" alt="Laptop Silver black" width="100px" src="vendor/product_photo/<?php echo getImage(trim($pro_id[$i]));  ?>"></td>
					<?php
					}
					?>
					</tr>
					<tr>
					  <td><?php echo $lang_44; ?></td>
					<?php
					for($i=0;$i < $count ; $i++){
					 ?>
					  <td><div class="price"><span class="price-new"><?php echo currency1(currency(trim($pro_id[$i])),getPrice(trim($pro_id[$i]))); ?></span> <span class="price-old"><?php echo currency1(currency(trim($pro_id[$i])),(getPrice(trim($pro_id[$i]))+getDiscount(trim($pro_id[$i])))); ?></span> </div></td>
					<?php
					}
					?>
					</tr>
					<!-- <tr>
					  <td>Model</td>
					  <?php
					for($i=0;$i < $count ; $i++){
					 ?>
					  <td>Product 17</td>
					<?php
					}
					?>
					</tr> -->
					<tr>
					  <td><?php echo $lang_49; ?></td>
					<?php
					for($i=0;$i < $count ; $i++){
					?>
					  <td><?php echo getBrand(trim($pro_id[$i])); ?></td>
					<?php
					}
					?>
					</tr>
					<tr>
					  <td><?php echo $lang_50; ?></td>
					<?php
					for($i=0;$i < $count ; $i++){
					?>
					  <td><?php echo getAvailability(trim($pro_id[$i])); ?></td>
					<?php
					}
					?>
					</tr>
					<tr>
					  <td><?php echo $lang_51; ?></td>
					<?php
					for($i=0;$i < $count ; $i++){
					?>
					  <td class="rating">
						<div class="rating-box">
						<?php  getRatingStar(trim($pro_id[$i])); ?>
						 </div>
						<?php echo baseOnReview(trim($pro_id[$i])); ?></td>
					<?php
					}
					?>
					</tr>
					<tr>
					  <td><?php echo $lang_52; ?></td>
					<?php
					for($i=0;$i < $count ; $i++){
					?>
					  <td class="description"><?php echo getDescription(trim($pro_id[$i])); ?></td>
					<?php
					}
					?>
					</tr>
					<tr>
					  <td><?php echo $lang_53; ?></td>
					<?php
					for($i=0;$i < $count ; $i++){
					?>
					  <td><?php echo getweight(trim($pro_id[$i])); ?></td>					
					<?php
					}
					?>
					</tr>
					<tr>
					  <td><?php echo $lang_54; ?></td>
					<?php
					for($i=0;$i < $count ; $i++){
					?>
					<td>
					<?php
					$features=getFeature(trim($pro_id[$i]));
if(trim($features) !=""){

	$feature=explode("||",$features);
	foreach($feature as $k3=>$v3){
		$feat_desc=explode(":",$v3);
?>									
										 <?php  echo $feat_desc[0]; ?>: <?php  echo $feat_desc[1].'<br/>'; ?>
<?php
	}

}else{
	?>
	<font color="red"><?php echo $lang_55; ?></font>
	<?php
}
?>
</td>						
					 			
					<?php
					}
					?>
					</tr>
				  </tbody>
				  <tbody>
					<tr>
					  <td></td>
					<?php
					for($i=0;$i < $count ; $i++){

						$product_name = str_replace("'", "@#@#@#@#", getProductName(trim($pro_id[$i])))
					?>
					 <!--  <td><input type="button" onclick="add2cart('<?php echo $pro_id[$i]; ?>','<?php echo getImage(trim($pro_id[$i])); ?>','<?php echo getProductName(trim($pro_id[$i]));?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');" class="btn btn-primary btn-block" value="Add to Cart">
						<a class="btn btn-danger btn-block" href="javascript:void(0);" onclick="remove_compare1('<?php echo $i; ?>');"><?php echo $lang_56; ?></a></td>  -->
					<!-- <td><input type="button" onclick="add2cart('<?php echo $pro_id[$i]; ?>','<?php echo getImage(trim($pro_id[$i])); ?>','<?php echo getProductName(trim($pro_id[$i]));?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');" class="btn btn-primary btn-block" value="Add to Cart"> -->
						<td><a class="btn btn-danger btn-block" href="javascript:void(0);" onclick="remove_compare1('<?php echo $i; ?>');"><?php echo $lang_56; ?></a></td>
					<?php
					}
					?>
					</tr>
				  </tbody>
				</table>
			  </div>
			</div>
			<!--Middle Part End -->
			
		</div>
	</div>
	<!-- //Main Container -->
	

	<!-- Footer Container -->
	<?php
	include("include/footer.php");
	?>