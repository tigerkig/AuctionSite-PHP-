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
<script>
	function fetch_sub_cat_field(){
    var pc_id=$("#category_id1").val();
    $.ajax({
      url:'fetch_category_field.php?pc_id='+pc_id,
      type:'post',
      dataType:'text',
      cache:false,
      contentType:false,
      processData:false,
      success:function(response){
      //alert(response);
       $("#sub_category_id1").html(response); 
      }
    });
	//alert(pc_id);
	//search_by();
  } 
 
 
$(document).ready(function() {
	$("#ajax_des").on('submit',(function(e){  
	$.ajax({
        	url: "get_value.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			$("#ajax_filter").html(data);
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });

 function get_pagination(url,page){
	$.ajax({
      url:'ajax_searched_product.php?'+url+'&page='+page,
      type:'post',
      dataType:'text',
      cache:false,
      contentType:false,
      processData:false,
      success:function(response){
      //alert(response);
       $("#ajax_filter").html(response); 
      }
    }); 
 } 
 
  function ajax_get_pagination(category,sub_cat,min_price,max_price,color,page){
	$.post(
	"ajax_get_value_product.php",
	{category:category,sub_cat:sub_cat,min_price:min_price,max_price:max_price,color:color,page:page},
	function(r){
	 $("#ajax_filter").html(r); 
	}
	); 
 }
 
 function show_range(){
	 var min_price=$("#min_price").val();
	 var max_price=$("#max_price").val();
	 if(min_price.trim()==""){
		 var min_price=0;
	 }
	 if(max_price.trim()==""){
		 var max_price=0;
	 }
	 if(min_price==0 && max_price != 0){
		 var min_price=max_price;
	 }
	 if(max_price==0 && min_price != 0){
		 var max_price=min_price;
	 }
	 $("#price_range").show();
	$("#min_rang").html(min_price); 
	$("#max_rang").html(max_price); 
 }
</script>	
	

	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>		
		</ul>
		
		<div class="row">			
			<!--Middle Part Start-->
			<div id="content" class="col-md-12 col-sm-12">
				<h3 class="offset_title">Searched Products</h3>
				<div class="products-category">					
					
					<!--Content Top -->
					<div class="module latest-product titleLine">
					   <h3 class="modtitle">Filter </h3>
					   																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																										<div class="modcontent ">
						<form class="type_2" action="javascript:void(0);" method="post" id="ajax_des">
							<div class="table_layout filter-row">
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																						<div class="table_row">
							<!-- - - - - - - - - - - - - - Category filter - - - - - - - - - - - - - - - - -->																																																				
							<div class="table_cell" style="z-index: 103;">
								<fieldset>
									<legend>Category</legend>
									<select class="form-control" name="category_id1" id="category_id1" onchange="fetch_sub_cat_field();">
										<option value="0"><?php echo $lang_253; ?></option>
										<?php
				                        $category=getDetails(doSelect("pc_id,pc_name","product_category",array()));
				                        foreach ($category as $k => $v) {
				                        ?>
										<option value="<?php echo $v["pc_id"]; ?>"><?php echo $v["pc_name"];  ?></option>
										<?php
				                        }
				                        ?>
									</select>
								</fieldset>
							</div><!--/ .table_cell -->
							<!-- - - - - - - - - - - - - - End of category filter - - - - - - - - - - - - - - - - -->
							<!-- - - - - - - - - - - - - - SUB CATEGORY - - - - - - - - - - - - - - - - -->
							<div class="table_cell" id="sub_category_id1">					

							</div>
							<!--/ .table_cell -->
							<!-- - - - - - - - - - - - - - End SUB CATEGORY - - - - - - - - - - - - - - - - -->
							<!-- - - - - - - - - - - - - - Manufacturer - - - - - - - - - - - - - - - - -->
							<div class="table_cell" id="vendor_field">
								<fieldset>
									<legend>Vendor</legend>
									<select class="form-control" name="vendor_id" id="vendor_id" >
										<option value="0">Select Vendor</option>
										<?php
				                        $vendor=getDetails(doSelect("vr_id,fname,lname","vendor_registration",array("status"=>1)));
				                        foreach ($vendor as $k => $v) {
				                        ?>
										<option value="<?php echo trim($v["vr_id"]); ?>"><?php echo $v["fname"].' '.$v["lname"];  ?></option>
										<?php
				                        }
				                        ?>
									</select>
								</fieldset>	
							</div>
							<div class="table_cell">
								<fieldset>
									<legend>Brand</legend>
									<ul class="checkboxes_list">
									<?php
										 $brand=getDetails(doSelect("ab_id,ab_name","ambit_brand",array()));
									?>	
									<?php
									$i=1;
									  foreach ($brand as $k => $v) {
									?>				
										<li>
											<input type="checkbox" value="<?php echo $v["ab_id"];  ?>"  name="brand[]" id="brand_<?php echo $i; ?>">
											<label for="brand_<?php echo $i; ?>"><?php echo $v["ab_name"];  ?></label>
										</li>
									<?php
										$i++;
									  }
									?>  
									</ul>
								</fieldset>
							</div><!--/ .table_cell -->
							<!-- - - - - - - - - - - - - - End manufacturer - - - - - - - - - - - - - - - - -->

							<!-- - - - - - - - - - - - - - Price - - - - - - - - - - - - - - - - -->
						<div class="table_cell" style="z-index: 103;">
							<legend>Price</legend>
							<input class="form-control" type="text" value="" size="30" autocomplete="off" placeholder="Min Price" name="min_price" id="min_price" onkeyup="show_range();" >
							<br/>
							<input class="form-control" type="text" value="" size="30" autocomplete="off" placeholder="Max Price" name="max_price" id="max_price" onkeyup="show_range();" >
							<br/>							
							<!--<div id="price_range" style="display:none;"><font color="blue">Price Between <?php //echo currency(); ?><span id="min_rang">0</span> - <?php //echo currency(); ?><span id="max_rang">0</span></font></div>-->
							<div id="price_range" style="display:none;"><font color="blue">Price Between <?php echo currency($_GET["category_id"]); ?><span id="min_rang">0</span> - <?php echo currency($_GET["category_id"]); ?><span id="max_rang">0</span></font></div>
						</div><!--/ .table_cell -->

							<!-- - - - - - - - - - - - - - End price - - - - - - - - - - - - - - - - -->

							<!-- - - - - - - - - - - - - - colors - - - - - - - - - - - - - - - - -->
						<div class="table_cell">
							<fieldset>
								<legend>Color</legend>
								<div class="row">
									<div class="col-sm-12">								
										<ul class="simple_vertical_list">
										<?php
										$colorss=getDetails(doSelect1("apc_id,apc_name,image","ambit_product_color",array()));
										foreach($colorss  as $k=>$v){
										?>
											<li>										
												<input type="checkbox" name="colors[]" id="color_btn_<?php echo $k; ?>" value="<?php echo $v["apc_id"];  ?>">
												<label for="color_btn_<?php echo $k; ?>"><img src="image/demo/colors/<?php echo $v["image"];  ?>" width="17px" /></label>
											</li>
										<?php
										}
										?>
										</ul>
									</div>
								</div>
							</fieldset>
						</div><!--/ .table_cell -->
							<!-- - - - - - - - - - - - - - End colors - - - - - - - - - - - - - - - - -->
						</div><!--/ .table_row -->
								<footer class="bottom_box">
									<div class="buttons_row">
									<button type="submit" class="button_grey button_submit">Search</button>
										<button type="reset" class="button_grey ">Reset</button>
									</div>
								</footer>
							</div><!--/ .table_layout -->

						</form>
					   </div>
					   
					</div>

					<!--Content Top End -->
<div id="ajax_filter">					
<?php
include_once("product/searched_product.php");
?>	
</div>				
					
				</div>
				
			</div>
			
			
			
		</div>
		<!--Middle Part End-->
	</div>
	<!-- //Main Container -->
	

	<!-- Footer Container -->
	<?php
	include("include/footer_search.php");
	?>
	<!-- //end Footer Container -->

    </div>
	
	





<link rel='stylesheet' property='stylesheet'  href='css/themecss/cpanel.css' type='text/css' media='all' />
<script type="text/javascript" src="js/themejs/cpanel.js"></script>	<!-- //Cpanel Block -->
	
	<!-- Preloading Screen -->
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	 </div>
	<!-- End Preloading Screen -->
	
<!-- Include Libs & Plugins
	============================================ -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
	<script type="text/javascript" src="js/themejs/libs.js"></script>
	<script type="text/javascript" src="js/unveil/jquery.unveil.js"></script>
	<script type="text/javascript" src="js/countdown/jquery.countdown.min.js"></script>
	<script type="text/javascript" src="js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
	<script type="text/javascript" src="js/datetimepicker/moment.js"></script>
	<script type="text/javascript" src="js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
	
	
	<!-- Theme files
	============================================ -->
	
	
	<script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
	<script type="text/javascript" src="js/themejs/addtocart.js"></script>
	<script type="text/javascript" src="js/themejs/application.js"></script>
	<script type="text/javascript" src="js/themejs/cpanel.js"></script>	
</body>
</html>