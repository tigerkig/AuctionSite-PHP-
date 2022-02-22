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
<script type="text/javascript">
function remove_cart(id){
	//alert("sidd");
	$.post(
	"remove_cart.php?msg="+'remove_cart',
	{id:id},
	function(r){
		if(r==1){
			window.location="cart.php";
		}
	}
	);
}

function remove_guest_cart(id,key){
	//alert("sidd");
	$.post(
	"remove_cart.php?msg="+'remove_guest_cart',
	{id:id,key:key},
	function(r){
		//alert(r);
		if(r==1){
			window.location="cart.php";
		}
	}
	);
}
</script>
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="index.php"><i class="fa fa-home"></i></a></li>
			<li><a href="search_product.php"><?php echo $lang_46; ?></a></li>
			<li><a href="product.php?id=<?php echo $_GET["id"]; ?>"><?php echo getProductName($_GET["id"]);  ?></a></li>
			<li><a href="review.php?id=<?php echo $_GET["id"]; ?>"><?php echo $lang_88; ?></a></li>
		</ul>
		
		<div class="row">
			<!--Middle Part Start-->
			<?php
			$image=getDetails(doSelect1('image,api_apa_id',"ambit_product_image",array("api_apa_id"=>$_GET["id"])));
			?>
			<a href="product.php?id=<?php echo $_GET["id"]; ?>" title="<?php echo getProductName($_GET["id"]);  ?>"><div style="position: relative;margin: auto;width: 100px;"><img src="vendor/product_photo/<?php echo $image[0]["image"]; ?>" width="100px" ></div></a>
        <div id="content" class="col-sm-12">
          <h2 class="title"><?php echo $lang_124; ?> <a href="product.php?id=<?php echo $_GET["id"]; ?>" title="<?php echo getProductName($_GET["id"]);  ?>"><font color="brown"><?php echo getProductName($_GET["id"]);  ?></font></a></h2>
            <div class="table-responsive form-group">
              <table class="table table-striped table-bordered">
							<tbody>
<?php
if(isset($_GET["page"]))
  $page = (int)$_GET["page"];
  else
  //$_GET["page"]=1;
  $page = 1;
  $setLimit =10;
  $pageLimit = ($page * $setLimit) - $setLimit;
  $limit=' LIMIT '.$pageLimit.','.$setLimit;
$select="apr_id,apr_apa_id,apr_name,comment,rating,date";
$from="ambit_product_review";
$where=array("apr_apa_id"=>$_GET["id"]);
$total_review_details=getDetails(doSelect1($select,$from,$where));
$total_page=ceil(count($total_review_details)/$setLimit);
$review_details=getDetails(doSelect1($select,$from,$where,$limit));
foreach($review_details as $key2=>$val2){
?>						
							
								<tr>
									<td style="width: 50%;"><strong><?php echo $val2["apr_name"]; ?></strong></td>
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
?>								

							</tbody>
						</table>
					<ul class="pagination">
                    <?php
                    if(isset($_GET["page"])){
                    $query_string=explode("&",$_SERVER['QUERY_STRING']);
                    unset($query_string[count($query_string)-1]);
                    $query_string=implode("&",$query_string).'&';  
                    }else{
                    $query_string=$_SERVER['QUERY_STRING'].'&';
                    }
                    $url='review.php?'.$query_string;
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
					<?php
					if(empty($total_review_details)){
						echo '<h2><font color="red">No Data Found !</font></h2>';
					}
					?>
            </div>
        </div>
        <!--Middle Part End -->
			
		</div>
	</div>
	<!-- //Main Container -->
	<script type="text/javascript">
	$('.date').datetimepicker({
		pickTime: false
	});
	</script>

	<!-- Footer Container -->
		<?php
	include("include/footer.php");
	?>