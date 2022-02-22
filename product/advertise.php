<div class="module ">
	<div class="modcontent clearfix">
		<div class="banner-wraps ">
			<div class="m-banner row">
				<?php
					$result=getDetails(doSelect1("aab_id,aab_banner,aab_link","ambit_advertisement",array("status"=>1)," ORDER BY rand() LIMIT 3"));
					foreach($result as $k=>$v){
				?>							
				<!--<div class="banner htmlconten1 col-lg-4 col-md-4 col-sm-6 col-xs-12">-->
				<div class="banner htmlconten1 col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="banners">
						<div>
							<a href="<?php echo $v["aab_link"]  ?>"><img src="image/demo/cms/<?php echo $v["aab_banner"]  ?>" alt="banner1" style="width:400px;height:300px"></a>
						</div>
					</div>
				</div>
				<?php
				}
				?>								
			</div>
		</div>
	</div>
</div>