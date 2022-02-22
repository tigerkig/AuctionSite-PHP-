
					<!-- Filters -->
					<div class="product-filter filters-panel">
						<div class="row">
							<div class="col-md-2 visible-lg">
								<div class="view-mode">
									<div class="list-view">
										<button class="btn btn-default grid " data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
										<button class="btn btn-default list active" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
									</div>
								</div>
							</div>
							
<?php
if(isset($_GET["page"]))
  $page = (int)$_GET["page"];
  else
  //$_GET["page"]=1;
  $page = 1;
  $setLimit =16;
  $pageLimit = ($page * $setLimit) - $setLimit;
  $limit=' LIMIT '.$pageLimit.','.$setLimit;
  

$select="vr_id,fname,lname,email,phone,fax,company,address_one,address_two,cn_name,ct_name,post_code,image";
$result=getDetails(doSelect1($select,"vendor_registration,ambit_country,ambit_city",array("country"=>"cn_id","city"=>"ct_id"),$limit));
$total_result=getDetails(doSelect1($select,"vendor_registration,ambit_country,ambit_city",array("country"=>"cn_id","city"=>"ct_id"),' LIMIT 0,100'));
$total_item=count($total_result);
$total_page=ceil(count($total_result)/$setLimit);
$page_item=count($result);
?>							
													
							
						</div>
					</div>
					<!-- //end Filters -->
					
					<!--changed listings-->
					<div class="products-list row list">
<?php
if(!empty($result)){
foreach($result as $k=>$v){					
?>	

	<div class="product-layout col-md-3 col-sm-4 col-xs-12 ">
		<div class="product-item-container">
			<div class="left-block">
<div class="product-image-container lazy second_img ">

<img data-src="vendor/vendor_image/<?php echo $v["image"]; ?>" src="vendor/vendor_image/<?php echo $v["image"]; ?>"  alt="<?php echo ucfirst(trim($v["fname"])).' '.ucfirst(trim($v["lname"])); ?>" title="<?php echo ucfirst(trim($v["fname"])).' '.ucfirst(trim($v["lname"])); ?>" class="img-responsive" />

</div>
								</div>
								<div class="right-block">
									<div class="caption">
										<h4><a href="vendor_details.php?id=<?php echo $v["vr_id"]; ?>"><?php echo ucfirst(trim($v["fname"])).' '.ucfirst(trim($v["lname"])); ?></a></h4>		
										<div class="ratings">
											<div class="ratings">
										<div class="rating-box">
										<a href="vendor_review.php?id=<?php echo $v["vr_id"];  ?>" data-toggle="tooltip" title="See Review">
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
				?>		</a>				
										</div>
									</div>
										</div>
										
										<div class="description item-desc hidden">
										<p>
										
									
										<div class="brand"><span><b><?php echo $lang_128;  ?> : </b></span> <?php echo ucfirst(trim($v["fname"])).' '.ucfirst(trim($v["lname"]));  ?></div>	
										<div class="brand"><span><b><?php echo $lang_207;  ?> : </b></span> <?php echo ucfirst(trim($v["company"]));  ?></div>	
										<div class="brand"><span><b><?php echo $lang_134;  ?> : </b></span><?php echo $v["address_one"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_135;  ?> : </b></span><?php echo $v["address_two"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_117;  ?> : </b></span><?php echo $v["cn_name"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_136;  ?> : </b></span><?php echo $v["ct_name"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_113;  ?> : </b></span><?php echo $v["email"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_59;  ?> : </b></span><?php echo $v["phone"]; ?>		</div>
										<div class="brand"><span><b><?php echo $lang_131;  ?> : </b></span><?php echo $v["fax"]; ?>		</div>
									
			
										</p>
										</div>
									</div>
									
									  <div class="button-group">
										<button class="addToCart" type="button"><i class="fa fa-phone"></i> <span class=""><?php echo $v["phone"];  ?></span></button>
										<button class="wishlist" style="width:60px;" type="button" data-toggle="tooltip" title="<?php echo $v["email"];  ?>"><i class="fa fa-envelope"></i></button>
										
									</div>
								</div><!-- right block -->

		</div>
	</div>
	
<?php
}
}else{
	?>
	<div class="product-layout col-md-3 col-sm-4 col-xs-12 ">
	<?php
	echo '<h3><font color="red">'.$lang_32.'</font></h3>';
}
?>	
</div>
	
	
	
</div>					<!--// End Changed listings-->
					<!-- Filters -->
					<div class="product-filter product-filter-bottom filters-panel" >
						<div class="row">
							<div class="col-md-2 hidden-sm hidden-xs">
								
							</div>
						   <div class="short-by-show text-center col-md-7 col-sm-8 col-xs-12">
								<div class="form-group" style="margin: 7px 10px">Showing <?php echo $aa=$pageLimit+1;  ?> to <?php echo $bb=$aa+$page_item-1;  ?> of <?php echo $total_item;  ?> (<?php echo $total_page;  ?> Pages)</div>
							</div>
							<div class="box-pagination col-md-3 col-sm-4 text-right">
							<ul class="pagination">

                    <?php
                    if(isset($_GET["page"])){
                    $query_string=explode("&",$_SERVER['QUERY_STRING']);
                    unset($query_string[count($query_string)-1]);
                    $query_string=implode("&",$query_string).'&';  
                    }else{
                    $query_string=$_SERVER['QUERY_STRING'].'&';
                    }
                    $url='vendor.php?'.$query_string;
                    if($page != 1){
                      $prev=$page-1;
                    ?>
                    <li><a href="<?php echo $url; ?>page=1" title="First"><i class="fa fa-angle-double-left"></i></a></li>
                    <li><a href="<?php echo $url; ?>page=<?php  echo $prev ?>"><i class="fa fa-chevron-left"></i></a></li>
                    <?php
                    }
                   ?>
                   <!-- new -->
                   <?php
$l=1;
$s=$page-5;
if($s < 1){
  $s=1;
  }
for($p=$s;$p<$page;$p++){
  if($p!=$page){
?>
<li><a href="<?php echo $url; ?>page=<?php echo $p; ?>"><?php echo $p;  ?></a></li>
<?php
}else{
?>
<li class="active"><a href="javascript:void(0);"><?php echo $p; ?></a></li>
<?php
}
$l++;
if($l==7){
  break;
}
}
if($total_page > 1){
$l=1;
for($p=$page;$p<=$total_page;$p++){
  if($p!=$page){
?>
<li><a href="<?php echo $url; ?>page=<?php echo $p; ?>"><?php echo $p;  ?></a></li>
<?php
}else{
?>
<li class="active"><a href="javascript:void(0);"><?php echo $p; ?></a></li>
<?php
}
$l++;
if($l==5){
  break;
}
}
}

                    if($page < $total_page){
                      $next=$page+1;
                      ?>
                      <li><a href="<?php echo $url; ?>page=<?php echo $next;  ?>"><i class="fa fa-chevron-right"></i></a></li>
                      <li><a href="<?php echo $url; ?>page=<?php echo $total_page;  ?>" title="Last"><i class="fa fa-angle-double-right"></i></a></li>
                      <?php
                      }
                      ?>
                    </ul>
							</div>
									
						 </div>
					</div>
					<!-- //end Filters -->