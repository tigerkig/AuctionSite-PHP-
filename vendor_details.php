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
			
			<li><a href="vendor.php">Vendor</a></li>
			<li><a href="vendor_details.php?id=<?php echo trim($_GET["id"]);  ?>"><?php echo getVendorName(trim($_GET["id"])); ?></a></li>
			
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<div id="content" class="col-md-12 col-sm-12">
<?php
$select="vr_id,fname,lname,email,phone,fax,company,address_one,address_two,cn_name,ct_name,post_code,image";
$result=getDetails(doSelect1($select,"vendor_registration,ambit_country,ambit_city",array("country"=>'cn_id',"city"=>"ct_id","vr_id"=>$_GET["id"])));

foreach($result as $k=>$v){

?>	
				
				
<div class="product-view row">
					<div class="left-content-product col-lg-10 col-xs-12">
						<div class="row">
							<div class="content-product-left class-honizol col-sm-2 col-xs-12 ">
														
									<img itemprop="image" class="product-image-zoom" src="vendor/vendor_image/<?php echo $v["image"]; ?>"  title="" alt="" width="200px">
															
							</div>

							<div class="content-product-right col-sm-6 col-xs-12">
								<div class="title-product">
									<h1><?php echo ucfirst(trim($v["fname"])).' '.ucfirst(trim($v["lname"])); ?></h1>
								</div>
								<!-- Review ---->
								<div class="box-review form-group">
									<div class="ratings">
										<div class="rating-box">
				<?php
				$rate=getDetails(doSelect1("count(*) as count,SUM(rating) as sum","ambit_vendor_review",array("vr_id"=>$v["vr_id"])));
				$a=explode("||",rating($rate));
				$half_star=$a[0];
				$full_star=$a[1];
				$no_star=$a[2];
				for($i=1;$i<=$full_star;$i++){
				echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>';
				}
				for($i=1;$i<=$half_star;$i++){
				echo '<span class="fa fa-stack"><i class="fa fa-star-half fa-stack-1x"></i></span>';
				}
				for($i=1;$i<=$no_star;$i++){
				echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>';
				}
				?>						
										</div>
									</div>
<?php

$review_details=getDetails(doSelect1("avr_id,vr_id,avr_name,comment,rating,date","ambit_vendor_review",array("vr_id"=>$_GET["id"]),' ORDER BY rand() LIMIT 0,2'));
$total_review=getDetails(doSelect1("avr_id,vr_id,avr_name,comment,rating,date","ambit_vendor_review",array("vr_id"=>$_GET["id"])));
?>
									<a class="reviews_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?php echo count($total_review); ?> <?php echo $lang_88; ?></a>	| 
									<a class="write_review_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?php echo $lang_89; ?></a>
								</div>
								

							</div>
						</div>
					</div>
					
					
				</div>				
				
				
				
				
				
				
				<!-- Product Tabs -->
				<div class="producttab ">
	<div class="tabsslider  vertical-tabs col-xs-12">
		<ul class="nav nav-tabs col-lg-2 col-sm-3">
			<li class="active"><a data-toggle="tab" href="#tab-1"><?php echo $lang_115;  ?> </a></li>
			<li class="item_nonactive"><a data-toggle="tab" href="#tab-4"><?php echo $lang_268;  ?></a></li>		
			<li class="item_nonactive"><a data-toggle="tab" href="#tab-review"><?php echo $lang_88; ?> (<?php echo count($total_review); ?>)</a></li>
			<li class="item_nonactive"><a data-toggle="tab" href="#tab-5"><?php echo $lang_100; ?></a></li>
		</ul>
		<div class="tab-content col-lg-10 col-sm-9 col-xs-12">
			<div id="tab-1" class="tab-pane fade active in">
			<div class=" col-lg-10 col-sm-9 col-xs-12">
				<font color="blue" ><?php echo $lang_134;  ?> : </font><p><?php echo $v["address_one"]; ?></p>
			</div>
			
			<div class=" col-lg-10 col-sm-9 col-xs-12">
				<font color="blue" ><?php echo $lang_135;  ?> : </font><p><?php echo $v["address_two"]; ?></p>
			</div>
			</div>
			<div id="tab-review" class="tab-pane fade">
				<form>
					<div id="review">
						<table class="table table-striped table-bordered">
							<tbody>
<?php
foreach($review_details as $key2=>$val2){
?>						
							
								<tr>
									<td style="width: 50%;"><strong><?php echo $val2["avr_name"]; ?></strong></td>
									<td class="text-right"><?php echo get_date_str($val2["date"]); ?></td>
								</tr>
								<tr>
									<td colspan="2">
										<p><?php echo $val2["comment"]; ?></p>
										<div class="ratings">
											<div class="rating-box">
<?php
				$full_star=$val2["rating"];
				$no_star=5-$full_star;
				for($i=1;$i<=$full_star;$i++){
				?>
				<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
				<?php
				}
				for($i=1;$i<=$no_star;$i++){
				?>
				<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
				<?php
				}
				?>								
												
												
												
											</div>
										</div>
									</td>
								</tr>
								
<?php
}
if(count($total_review) > count($review_details)){
?>								
						<tr><td colspan="2"><a href="vendor_review.php?id=<?php echo $_GET["id"]; ?>"><h3><?php echo $lang_101; ?></h3></a></td></tr>
<?php
}
?>
							</tbody>
						</table>
						<div class="text-right"></div>
					</div>
					<h2 id="review-title"><?php echo $lang_89; ?></h2>
					<div class="contacts-form">
						<div class="form-group"> <span class="icon icon-user"></span>
							<input type="text" name="apr_name" id="apr_name" class="form-control" value="" placeholder="Your Name" > 
						</div>
						<div class="form-group"> <span class="icon icon-bubbles-2"></span>
							<textarea class="form-control" name="comment" id="comment"placeholder="Your Review" ></textarea>
						</div> 
						
						
						<div class="form-group">
						 <b><?php echo $lang_51; ?></b> <span><?php echo $lang_102; ?></span>&nbsp;
						<input type="radio" name="rating" value="1"> &nbsp;
						<input type="radio" name="rating"
						value="2"> &nbsp;
						<input type="radio" name="rating"
						value="3"> &nbsp;
						<input type="radio" name="rating"
						value="4"> &nbsp;
						<input type="radio" name="rating"
						value="5"> &nbsp;<span><?php echo $lang_103; ?></span>
						
						</div>
						<div class="buttons clearfix"><a id="button-review" class="btn buttonGray" onclick="submit_vendor_review('<?php echo $_GET["id"]; ?>');"><?php echo $lang_72?></a></div>
					</div>
				</form>
			</div>
			<div id="tab-4" class="tab-pane fade">
			
			
			<div class="product-box-desc">
									
										<div class="brand"><span><b><?php echo $lang_128;  ?> : </b></span> <?php echo ucfirst(trim($v["fname"])).' '.ucfirst(trim($v["lname"]));  ?></div>	
										<div class="brand"><span><b><?php echo $lang_207;  ?> : </b></span> <?php echo ucfirst(trim($v["company"]));  ?></div>	
										<div class="brand"><span><b><?php echo $lang_134;  ?> : </b></span><?php echo $v["address_one"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_135;  ?> : </b></span><?php echo $v["address_two"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_117;  ?> : </b></span><?php echo $v["cn_name"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_136;  ?> : </b></span><?php echo $v["ct_name"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_113;  ?> : </b></span><?php echo $v["email"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_59;  ?> : </b></span><?php echo $v["phone"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_131;  ?> : </b></span><?php echo $v["fax"]; ?>		</div>
									
			</div>	

			
			</div>
			<div id="tab-5" class="tab-pane fade">
			<form>
					<div id="review">
						<table class="table table-striped table-bordered">
							<tbody>
<?php
$qa_details=getDetails(doSelect1("avqa_id,ac_id,question,date,answer","ambit_vendor_qustn_ans",array("vr_id"=>trim($_GET["id"]),"ans_status"=>1),' LIMIT 0,2'));
$total_qa=getDetails(doSelect1("avqa_id,ac_id,question,date,answer","ambit_vendor_qustn_ans",array("vr_id"=>trim($_GET["id"]),"ans_status"=>1)));



foreach($qa_details as $key2=>$val2){
?>						
							
								<tr>
									<td style="width: 50%;"><strong><?php echo getCustomerName($val2["ac_id"]); ?></strong></td>
									<td class="text-right"><?php echo get_date_str($val2["date"]); ?></td>
								</tr>
								<tr>
									<td colspan="2">
										<p><b><font color="grey"><?php echo $lang_277; ?> : </font></b><?php echo $val2["question"]; ?></p>
										<div class="ratings">
										<p><b><font color="grey"><?php echo $lang_278; ?> : </font></b><?php echo $val2["answer"]; ?></p>	
										</div>
									</td>
								</tr>
								
<?php
}
if(count($total_qa) > count($qa_details)){
?>								
						<tr><td colspan="2"><a href="vendor_question_answer.php?id=<?php echo $_GET["id"]; ?>"><h3><?php echo $lang_272; ?></h3></a></td></tr>
<?php
}
?>
							</tbody>
						</table>
						<div class="text-right"></div>
					</div>
					<h2 id="review-title"><?php echo $lang_270; ?></h2>
					<div class="contacts-form">
						
						<div class="form-group"> <span class="icon icon-bubbles-2"></span>
							<textarea class="form-control" name="question" id="question" placeholder="<?php echo $lang_271; ?>" ></textarea>
						</div> 
						
						<div class="buttons clearfix"><a id="button-review" class="btn buttonGray" onclick="submit_vendor_question('<?php echo $_GET["id"]; ?>');"><?php echo $lang_72; ?></a></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php

}

?>
				<!-- //Product Tabs -->
				
				<!-- <?php echo $lang_3; ?> -->
<?php
include("product/product_post_by_vendor.php");

?>				

			<!-- end Related  Products-->
			
				
			</div>
			
			
		</div>
		<!--Middle Part End-->
	</div>
	<!-- //Main Container -->
	

	<!-- Footer Container -->
	<?php
	include("include/footer.php");
	?>