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
			<li><a href="for_sellers.php"><?php echo $lang_289;  ?></a></li>
		</ul>
		
		<div class="row">
			<div id="content" class="col-sm-12">
			
				<div class="about-us about-demo-1">
					<div class="row">
					<?php
					$about=getDetails(doSelect("id,content","for_sellers",array()));
					foreach($about as $k=>$v){
					?>
						<div class="col-lg-12 col-md-12 about-info">
							<h2 class="about-title"><span><?php echo $lang_289;  ?></span></h2>
							<div class="about-text"><?php echo $v["content"];  ?></div>
						</div>
					<?php
					}
					?>
					</div>
					
					
				</div>
			
				
			</div>
		</div>
	</div>
	<!-- //Main Container -->
	

	<!-- Footer Container -->
<?php
	include("include/footer.php");
	?>