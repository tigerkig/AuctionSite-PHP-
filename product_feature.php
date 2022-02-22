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
			include("include/side_menu.php");
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
	<!-- Block Spotlight1  -->
	<?php
	include("include/block_spotlight.php");
	
	?>
	<!-- //Block Spotlight1  -->
	<!-- Main Container  -->
	<div class="main-container container">
		
		<div class="row">
			<div id="content" class="col-sm-12">
				
<?php
//include("product/featured_product.php");
//include("product/advertise.php");
include("product/feature_product_header.php");
include("include/collection.php");
?>
				
	
			
				
			</div>
		</div>
	</div>
	<!-- //Main Container -->
	<!-- Block Spotlight3  -->
	<?php
	include("include/block_spotlight3.php");
	?>
	<!-- //Block Spotlight3  -->
<script type="text/javascript"><!--
	var $typeheader = 'header-home1';
	//-->
</script>

	<!-- Footer Container -->
	<?php
	include("include/footer.php");
	?>