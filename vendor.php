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
</script>	
	

	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>
			<li><a href="javascript:void(0);"><?php echo $lang_349;?></a></li>
		</ul>
		
		<div class="row">
			
			<!--Middle Part Start-->
			<div id="content" class="col-md-12 col-sm-12">
				<h3 class="offset_title"><?php echo $lang_350;?></h3>
				<div class="products-category">
					
					
					<!--Content Top -->
					

					<!--Content Top End -->
<div id="ajax_filter">					
<?php
include_once("product/vendor_listing.php");
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