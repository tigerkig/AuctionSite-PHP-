<?php
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
			<li><a href="faq.php"><?php echo $lang_65; ?></a></li>
		</ul>
		
		<div class="row">
			<div id="content" class="col-sm-12">
				<h3><?php echo $lang_66; ?></h3>
				<p>
					<br>
				</p>
				<div class="row">
					<div class="col-sm-12">
						<ul class="yt-accordion">
						<?php
						$faq=getDetails(doSelect("id,question,answer","ambit_faq",array()));
						foreach($faq as $k=>$v){					
						?>
							<li class="accordion-group">
								<h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span><?php echo $v["question"];  ?></span></h3>
								<div class="accordion-inner">
								<?php echo $v["answer"];  ?>
								</div>
							</li>
						<?php
						}
						?>
						</ul>
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