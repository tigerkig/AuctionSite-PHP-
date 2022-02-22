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
   function remove_wish(id){
   	//alert("sidd");
   	$.post(
   	"remove_wish.php",
   	{aaw_id:id},
   	function (r){
   		if(r==1){
   			alert("Remove Successfully");
   			window.location="<?php  echo $_SERVER['REQUEST_URI']; ?>";
   		}
   	}
   	);
   }
   
   
</script>
<!-- Main Container  -->
<div class="main-container container">
   <ul class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i></a></li>
      <li><a href="wishlist.php"><?php echo $lang_137; ?></a></li>
   </ul>
   <div class="row">
      <!--Middle Part Start-->
      <div id="content" class="col-sm-12">
         <h2 class="title"><?php echo $lang_137; ?></h2>
         <div class="table-responsive">
            <table class="table table-bordered table-hover" id="datatable2">
               <thead>
                  <tr>
                     <td class="text-center"><?php echo $lang_26; ?></td>
                     <td class="text-left"><?php echo $lang_27; ?></td>
                     <td class="text-left"><?php echo $lang_90; ?></td>
                     <td class="text-left"><?php echo $lang_38; ?></td>
                     <td class="text-center"><?php echo $lang_138; ?></td>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     if(isset($_SESSION["ac_id"])){
	                    
	                     
						$sql = "SELECT a.`apa_id`, a.`name`, a.stock, a.price, a.selling_price, COALESCE(b.shipment_status, 0) as shipment_status, c.aaw_apa_id, c.aaw_id FROM ambit_product_add AS a ";
						$sql .= " LEFT JOIN ambit_shipment_status AS b ";
						$sql .= " ON a.`apa_id`=b.`ass_apa_id` ";
						$sql .= " JOIN ambit_add2wish AS c ";
						$sql .= " ON  a.`apa_id`=c.`aaw_apa_id` ";
						$sql .= " WHERE a.stock > 0 AND (b.shipment_status != 1 OR  ISNULL(b.shipment_status)) AND aaw_ac_id=".$_SESSION["ac_id"];
						$sql .= " GROUP BY a.apa_id ";
						$sql .= " ORDER BY a.apa_id";
						  $cus_wish_dtls=getDetails(doSelect3($sql));                   
	                     
                     	foreach($cus_wish_dtls as $k=>$v){
				  ?>						
		                  <tr>
		                     <?php
		                        $image=getDetails(doSelect1('image',"ambit_product_image",array("api_apa_id"=>$v["aaw_apa_id"]),' LIMIT 0,1'));
		                        $cart_image=$image[0]["image"];
		                        ?>
		                     <td class="text-center">
		                        <a  href="product.php?id=<?php echo $v["aaw_apa_id"] ?>"><img style="border:1px solid #bebebe; padding:2px; bordr-radius:4px" width="70px" height="50px" src="vendor/product_photo/<?php echo $cart_image; ?>" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop">
		                        </a>
		                     </td>
		                     <td class="text-left"><a href="product.php?id=<?php echo $v["aaw_apa_id"] ?>"><?php echo getProductName($v["aaw_apa_id"]);  ?></a>
		                     </td>
		                     <td class="text-left"><?php echo $v["stock"]; ?></td>
		                     <td class="text-left">
		                        <?php
		                        	$price_list = explode('||', $v["price"]);
		                        ?>
		                        <div class="price"> <?php  echo currency1(currency($v["aaw_apa_id"]),$price_list[0]); ?></div>
		                     </td>
		                     <td class="text-center">
		                        <!-- <button class="btn btn-primary"
		                           title="" data-toggle="tooltip"
		                           onclick="cart.add('<?php echo $v['aaw_apa_id']; ?>','<?php echo $cart_image; ?>',
		                           '<?php 
		                              $product = str_replace("'", "@#@#@#@#", getProductName($v["aaw_apa_id"]));
		                              echo $product;
		                              ?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');"
		                           type="button" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i>
		                        </button> -->
		                        <a class="btn btn-danger" title="" data-toggle="tooltip" href="javascript:void(0);" onclick="remove_wish('<?php echo $v['aaw_id']; ?>');" data-original-title="Remove"><i class="fa fa-times"></i></a>
		                     </td>
		                  </tr>
                  <?php
                     	}
                    
                     }else{
                     	?>
		                  <tr>
		                     <td colspan="6"><font color="red"><?php echo $lang_32; ?> </font></td>
		                  </tr>
                  <?php
                     }
                     ?>					
               </tbody>
            </table>
          
         </div>
      </div>
      <!--Middle Part End-->
   </div>
</div>
<!-- //Main Container -->
<!-- Footer Container -->
<?php
   include("include/footer.php");
   ?>
