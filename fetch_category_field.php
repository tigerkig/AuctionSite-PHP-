<?php
 require_once("function.php");
 if(isset($_GET["pc_id"])){
 $sub_cat=getDetails(doSelect("psc_id,psc_name","product_sub_category",array("psc_pc_id"=>$_GET["pc_id"])));
?>

<fieldset>
						<legend><?php echo $lang_344;?></legend>
						<ul class="checkboxes_list" >
<?php
$i=1;
  foreach ($sub_cat as $k => $v) {
?>
							<li onclick="search_by();">
								<input type="checkbox" value="<?php echo $v["psc_id"]; ?>"  name="category[]" id="category_<?php echo $i; ?>">
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