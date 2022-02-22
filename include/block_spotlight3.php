<section class="so-spotlight3">
		<div class="container">
			<div class="row">
			
			<style>
				.module.so-categories .wrap-categories {
    				margin: 0px -26px;
				}
			</style>
				
				<!--<div id="so_categories_173761471880018" class="so-categories module titleLine preset01-4 preset02-3 preset03-3 preset04-1 preset05-1">-->
				<!--<div id="so_categories_173761471880018" class="so-categories module titleLine preset01-4 preset02-4 preset03-4 preset04-1 preset05-1">-->
				<div id="so_categories_173761471880018" class="so-categories module titleLine preset01-5 preset02-5 preset03-1 preset04-1 preset05-1">
					<h3 class="modtitle"><?php echo $lang_235; ?></h3>
					
					<div class="wrap-categories">
						<div class="cat-wrap theme3">
							
				<?php
				//$cat_listing=getDetails(doSelect1("pc_id,pc_name,pc_image","product_category",array(), ' ORDER BY RAND() LIMIT 8'));
				$cat_listing=getDetails(doSelect1("pc_id,pc_name,pc_image","product_category",array(), ' ORDER BY pc_id LIMIT 8'));
							
				$nCnt = 0;	
				foreach($cat_listing as $k3=>$v3){
					$subcat_list=getDetails(doSelect1("psc_id,psc_name","product_sub_category",array("psc_pc_id"=>$v3["pc_id"]), ' ORDER BY RAND() LIMIT 3'));												
					$nCnt += 1;
					//if($nCnt % 4 == 1){
					if($nCnt % 5 == 1){
					?>
								<div class="container col-md-12 col-sm-12 col-xs-12">
					<?php	
					}											
					?>
							
					<div class="content-box ex_hot_category">
						<div class="image-cat">
							<a href="search.php?category_id=<?php echo $v3["pc_id"];  ?>" title="<?php echo $v3["pc_name"];  ?>" target="_blank">
								<img  src="image/demo/shop/category/<?php echo $v3["pc_image"];  ?>" title="<?php echo $v3["pc_name"];  ?>" alt="<?php echo $v3["pc_name"];  ?>"> 
							</a> 
							<a class="btn-viewmore hidden-xs" href="search.php?category_id=<?php echo $v3["pc_id"];  ?>" title="<?php echo $lang_236; ?>"><?php echo $lang_236; ?></a> 		
						</div>	
							
						<div class="inner">
							<div class="title-cat"> <a href="search.php?category_id=<?php echo $v3["pc_id"];  ?>" title="<?php echo $v3["pc_name"];  ?>" target="_blank"><?php echo $v3["pc_name"];  ?></a> </div>
							<div class="child-cat" style="margin-left: 5px;">
							<?php
							foreach($subcat_list as $k5=>$v5){
							?>
								<div class="child-cat-title"> <a title="<?php echo $v5["psc_name"];  ?>" href="search.php?category_id=<?php echo $v3["pc_id"];  ?>&sub_category_id=<?php echo $v5["psc_id"];  ?>" target="_blank"><?php echo $v5["psc_name"];  ?></a> </div>
							<?php
							}
							?>
							</div>
						</div>
					</div>
							
					<?php
					//if($nCnt % 4 == 0){
					if($nCnt % 5 == 0){
					?>
								</div>
					<?php	
					}											
					?>
							<?php
							}
							?>													
							
					</div>
				</div>
			</div>
		</div>
	</div>
</section>