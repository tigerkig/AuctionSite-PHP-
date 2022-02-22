<?php
 require_once("function.php");
 if(isset($_GET["pc_id"])){
 $sub_cat=getDetails(doSelect("psc_id,psc_name","product_sub_category",array("psc_pc_id"=>$_GET["pc_id"])));
?>

<fieldset>
						<legend>Sub Category</legend>
						<ul class="checkboxes_list" >
<?php
$i=1;
  foreach ($sub_cat as $k => $v) {
?>
							<li>
								<input type="checkbox"  name="category_<?php echo $i; ?>" id="category_<?php echo $i; ?>">
								<label for="category_<?php echo $i; ?>"><?php echo $v["psc_name"]; ?></label>
							</li>
<?php
$i++;
	}
?>							
						</ul>

					</fieldset> 
 
<?php
 }
 ?>