<?php
   session_start();
   require_once("function.php");
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <!-- Basic page needs
         ============================================ -->
      <!-- <title>Market - Premium Multipurpose HTML5/CSS3 Theme</title> -->
      <meta charset="utf-8" />
      <meta name="keywords" content="<?php echo get_site_settings(15);  ?>" />
      <meta name="description" content="<?php echo get_site_settings(16);  ?>" />
      <meta name="author" content="Rudolf Sechovec" />
      <meta name="robots" content="index, follow" />
      <!-- Mobile specific metas
         ============================================ -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <!-- Favicon
         ============================================ -->
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
      <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
      <link rel="shortcut icon" href="ico/favicon.png" />
      <!-- Google web fonts
         ============================================ -->
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
      <!-- Libs CSS
         ============================================ -->
      <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css" />
      <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
      <link href="js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" />
      <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet" />
      <link href="css/themecss/lib.css" rel="stylesheet" />
      <link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
      <!-- Theme CSS
         ============================================ -->
      <link href="css/themecss/so_megamenu.css" rel="stylesheet" />
      <link href="css/themecss/so-categories.css" rel="stylesheet" />
      <link href="css/themecss/so-listing-tabs.css" rel="stylesheet" />
      <link id="color_scheme" href="css/theme.css" rel="stylesheet" />
      <link href="css/responsive.css" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      
           <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-187584630-1">
		</script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-187584630-1');
		</script>
      
      
   </head>
   <script type="text/javascript">  
   		
   		
      function my_cart(product_id,image,name){	
      var quantity=$("#product_quantitiy").val();	
      var path="<?php echo $_SERVER['REQUEST_URI'];  ?>";	
      $.post(
      'ajax_stock_check.php',
      {product_id:product_id,quantity:quantity},
      function(r){
      	var r=r.split('||');
      	if(r[0]==1){
      	cart.add(product_id,image,name,quantity,path);		
      	}else{
      	// alert(r[1]+' Items left');
         toastr.info(r[1]+' Items left');
      	}
      }
      );	
      }
      
   </script>
   
   <style>
	   .zoomWindow{
	   		cursor:zoom-in !important;
	   }   	
   </style>
   
   <body class="res layout-subpage">
      <div id="wrapper" class="wrapper-full ">
         <!-- Main Container  -->
         <div class="main-container container">
            <div class="row">
               <!--Middle Part Start-->
               <div id="content" class="col-md-12 col-sm-12">
                  <div class="alert alert-warning insert_alert" role="alert" id="end_time_alert" style="margin-bottom: 15px; display:none"><a class="close" onclick="$(this).parents('div').first().slideUp();">×</a><?php echo $lang_359; ?></div>
                  <?php
                  	$view_count =	seeMoreDetails("view_count","ambit_product_add",array("apa_id"=>$_GET["id"]));
                  	$view_count += 1;
                  	$status = doUpdate("ambit_product_add", array("view_count" => $view_count), array("apa_id" => $_GET["id"]));
                     $select="apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,status,video,stock,posting_type,listing_duration,listing_start, view_count,TIME_TO_SEC(TIMEDIFF(listing_duration,NOW())) as diff_time";
                     $result=getDetails(doSelect1($select,"ambit_product_add",array("apa_id"=>$_GET["id"])));
                     date_default_timezone_set("America/Chicago");
                     $curdatetime = strtotime(date("Y-m-d H:i:s"));
                     foreach($result as $k=>$v){
                     
                     ?>	
                  <div class="alert alert-warning insert_alert" role="alert" id="end_time_alert" style="margin-bottom: 15px; display:none"><a class="close" onclick="$(this).parents('div').first().slideUp();">×</a><?php echo $lang_359; ?></div>

                  <div class="product-view row">
                     <div class="left-content-product col-lg-10 col-xs-12">
                        <div class="row">
                           <div class="content-product-left class-honizol col-sm-6 col-xs-12 ">
                              <div class="alert alert-success insert_alert" role="alert" id="won_user_alert" style="display:none"><a class="close" onclick="$(this).parents('div').first().slideUp();">×</a><?php echo $lang_360; ?></div>
                              <div class="alert alert-danger insert_alert" role="alert" id="no_reserve_alert" style="display:none"><a class="close" onclick="$(this).parents('div').first().slideUp();">×</a><?php echo $lang_361; ?></div>
                              <div class="alert alert-danger insert_alert" role="alert" id="fail_user_alert" style="display:none"><a class="close" onclick="$(this).parents('div').first().slideUp();">×</a><?php echo $lang_362; ?></div>
                              <div class="alert alert-danger insert_alert" role="alert" id="smaller_reserve_alert" style="display:none"><a class="close" onclick="$(this).parents('div').first().slideUp();">×</a><?php echo $lang_363; ?></div>
                              
                              <?php if(strtotime($v["listing_start"]) > $curdatetime){?>
                                 <div class="alert alert-warning insert_alert" role="alert" id="fail_user_alert"><a class="close" onclick="$(this).parents('div').first().slideUp();">×</a><?php echo $lang_364; ?></div>
                              <?php }?>
                              <div class="large-image  " style="height:360px">
                                 <?php
                                    $select1="api_id,image,status";
                                    $main_image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$_GET["id"]),' LIMIT 0,1'));
                                    $main_image=$main_image[0]["image"];
                                    $cart_image=$main_image;
                                    ?>								
                                 <img itemprop="image" class="product-image-zoom" src="vendor/product_photo/<?php echo $main_image; ?>" style="width:100%;height:100%" data-zoom-image="vendor/product_photo/<?php echo $main_image; ?>" title="<?php echo $v["name"]; ?>" alt="<?php echo $v["name"]; ?>" style="cursor:zoom-in">
                              </div>
                              <?php
                                 if(trim($v["video"]) != ""){
                                 ?>
                              <a class="thumb-video pull-left" href="<?php echo $v["video"]; ?>"><i class="fa fa-youtube-play"></i>
                              </a>
                              <?php
                                 }
                                 ?>
                              <div id="thumb-slider" class="owl-theme owl-loaded owl-drag full_slider">
                                 <?php
                                    $image=getDetails(doSelect1($select1,"ambit_product_image",array("api_apa_id"=>$_GET["id"])));
                                    foreach($image as $k1=>$v1){
                                    ?>
                                 <a data-index="<?php echo $k1; ?>" class="img thumbnail " data-image="vendor/product_photo/<?php echo $v1["image"]; ?>" title="<?php echo $v["name"]; ?>">
                                 <img src="vendor/product_photo/<?php echo $v1["image"]; ?>" title="<?php echo $v["name"]; ?>" alt="<?php echo $v["name"]; ?>" style="height:124px">
                                 </a>
                                 <?php
                                    }
                                    ?>
                              </div>
                           </div>
                           <div class="content-product-right col-sm-6 col-xs-12">
                              <div class="title-product">
                                 <h1><?php echo $v["name"]; ?></h1>
                              </div>
                              <!-- Review ---->
                              <div class="box-review form-group">
                                 <div class="ratings">
                                    <div class="rating-box">
                                       <?php
                                          $rate=getDetails(doSelect1("count(*) as count,SUM(rating) as sum","ambit_product_review",array("apr_apa_id"=>$v["apa_id"])));
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
                                    $review_details=getDetails(doSelect1("apr_id,apr_apa_id,apr_name,comment,rating,date","ambit_product_review",array("apr_apa_id"=>$_GET["id"]),' ORDER BY rand() LIMIT 0,2'));
                                    $total_review=getDetails(doSelect1("apr_id,apr_apa_id,apr_name,comment,rating,date","ambit_product_review",array("apr_apa_id"=>$_GET["id"])));
                                    ?>
                                 <a class="reviews_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?php echo count($total_review); ?> <?php echo $lang_88; ?></a>	| 
                                 <a class="write_review_button" href="#" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;"><?php echo $lang_89; ?></a>
                                 &nbsp;|&nbsp; Number of views: <?php echo $v["view_count"];?>		
                              </div>
                              <div class="product-label form-group" style="display:flex;justify-content: space-between;">
                                    <div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
                                       <?php
                                          $price_part=explode("||",$v["price"]);
                                          if(trim($price_part[0])!=""){
                                       ?>
                                       <span class="price-new" id="high_bid">
                                          <?php 
                                          $highest_bid_amount = higest_bid_amount($v["apa_id"]);
                                          if($highest_bid_amount != 0){
                                             echo higest_bid($v["apa_id"]);
                                          }
                                          else {
                                             echo currency1($v["currency"],$price_part[0] - $price_part[2]); 
                                          }

                                          ?>
                                          </span> 
                                          <?php
                                             }
                                             if(trim($price_part[2])!="" && trim($price_part[2])!='0'){
                                          ?>
                                          <span class="price-old"><?php echo currency1($v["currency"],$old=$price_part[0]);?></span>
                                          <?php
                                             }
                                          ?>

                                          <div id="last_bid_1"></div>         
                                       <?php
                                          if($v["posting_type"]==1){
                                          ?>
                                       <?php 
                                             $highest_bid_amount = higest_bid_amount($v["apa_id"]);
                                             if($highest_bid_amount != 0){
                                          ?>
                                       <?php 
                                             $query = "SELECT nick_name FROM ambit_customer AS a JOIN ambit_product_bid AS b ON a.ac_id = b.cus_id WHERE bid_amount =".$highest_bid_amount." AND b.apa_id=".$v["apa_id"];
                                       
                                             $buyer_detail = getDetails(doSelect3($query));
                                             $nick_name = $buyer_detail[0]["nick_name"];
                                             echo '<div id="last_bid"><button class="label label-percent" id="btnBid">Last Bid : '.higest_bid($v["apa_id"]).' <br/> Bidder: '.$nick_name.'</button></div>';
                                             }                                  
                                          }
                                          ?>
                                    </div>



                                       
                                 
                                 <div class="stock col-sm-6 col-xs-12"><span><?php echo $lang_50; ?>:</span> 
                                    <?php
                                       if(trim($v["stock"]) > 0){
                                       	$stock=trim($v["stock"]);
                                       ?>
                                    <span class="status-stock"><?php echo $lang_90; ?></span>
                                    <?php
                                       }else{
                                       	$stock=trim($v["stock"]);
                                       ?>
                                    <span class="status-stock" style="color:red"><?php echo $lang_91; ?></span>
                                    <?php
                                       }
                                       ?>
                              <?php 
                                 date_default_timezone_set("America/Chicago");
                                 $curdatetime = strtotime(date("Y-m-d H:i:s"));
                                 if(strtotime($v["listing_start"]) < $curdatetime && strtotime($v["listing_duration"]) > $curdatetime && $v["posting_type"] == '0'){ ?>
                                    <script>$(document).ready(function (){ $('.countdown_box').hide(); })</script>
                              <?php } ?>  
                           <div class="countdown_box" style="display:none">
                              <div class="countdown_inner">
                                 <div class="title" style="text-align:center"><?php echo $lang_365; ?></div>
                                 <div class="defaultCountdown-<?php echo $v["apa_id"]; ?>" style="display:flex"></div>
                                 <input id="gettimer" type="hidden" >
                              </div>
                           </div>
                           <!--end countdown box-->

                           <script>
                              var name, high_bid_price = '<?php echo higest_bid_amount($v["apa_id"])?>';
                              var  reserve_price = '<?php echo $v["reserve_price"]?>';
                              $(function() {
                                 let d = new Date();
                                 let timestamp = d.getTime();
                                 var diffTime = <?php echo $v['diff_time']; ?> ;
                                 var listing_duration = timestamp + diffTime * 1000;
                                 var changed_duration = new Date(listing_duration);
                                 var user_name = '<?php echo $_SESSION["name"]; ?>';
                                 console.log("sdfsdfsdf");
                                 $('.defaultCountdown-<?php echo $v["apa_id"]; ?>').countdown(changed_duration, function(event) {
                                    var $this = $(this).html(event.strftime(''
                                    + '<div class="time-item time-day" id="day" style="margin:0px 10px 10px 10px;color:red;font-size:15px;font-weight:10px"><div class="num-time">%D</div><div class="name-time"></div></div>'
                                    + '<div style="margin-top:0px;color:red;font-size:15px;font-weight:10px">:</div>'
                                    + '<div class="time-item time-hour" id="time" style="margin:0px 10px 10px 10px;color:red;font-size:15px;font-weight:10px"><div class="num-time">%H</div><div class="name-time"> </div></div>'
                                    + '<div style="margin-top:0px;color:red;font-size:15px;font-weight:10px">:</div>'
                                    + '<div class="time-item time-min" id="min" style="margin:0px 10px 10px 10px;color:red;font-size:15px;font-weight:10px"><div class="num-time">%M</div><div class="name-time"> </div></div>'
                                    + '<div style="margin-top:0px;color:red;font-size:15px;font-weight:10px">:</div>'
                                    + '<div class="time-item time-sec" id="second" style="margin:0px 10px 10px 10px;color:red;font-size:15px;font-weight:10px"><div class="num-time">%S</div><div class="name-time"> </div></div>'));
                                    if(event.strftime('%D%H%M%S') == '00000000'){
                                       if(name == user_name){
                                          if(reserve_price*1 <= high_bid_price*1)
                                          {
                                             $("#won_user_alert").show();
                                          }
                                          else
                                          {
                                             $("#no_reserve_alert").show();
                                          }
                                       }else
                                       {
                                          if(reserve_price*1 <= high_bid_price*1)
                                          {
                                             $("#smaller_reserve_alert").show();
                                          }else{
                                             $("#fail_user_alert").show();
                                          }
                                       }
                                       $('.countdown_box').hide();
                                       $('#recnt_cart').hide();
                                       $('#end_time_alert').show();
                                    }
                                 });
                                 
                              });
                              var id = '<?php echo $_GET["id"]; ?>';
                              setInterval(function(){ 
                                 $.ajax({
                                    url: 'get_high_bid.php',
                                    type:'post',
                                    data: {'id':id},
                                    success: function(data) {
                                       var default_old_price = '<?php echo currency1($v["currency"],$price_part[0] - $price_part[2]);  ?>';
                                       val = JSON.parse(data);
                                       myArray = val[1].split(" ");
                                       name = val[2];
                                       reserve_price = val[3];
                                       high_bid_price = val[4];
                                       if(myArray[1] != 0)
                                       {
                                          $('#last_bid').html('');
                                          $('#high_bid').html(val[1]);
                                          $('#last_bid_1').html('<div id="last_bid"><button class="label label-percent" id="btnBid">Last Bid : '+val[1] +' <br/> Bidder: '+val[0]+'</button></div>')
                                       }else{
                                          $('#high_bid').html(default_old_price);
                                          $('#last_bid').html('');
                                       }
                                    },
                                 });
                              }, 3000);

                           </script>


                              </div>
                              </div>
                              <div class="product-box-desc">
                                 <div class="inner-box-desc">
                                    <div class="brand"><span><?php echo $lang_49; ?>: </span><a href="#"><?php echo seeMoreDetails("ab_name","ambit_brand",array("ab_id"=>$v["brand"]));  ?></a>		</div>
                                 </div>
                              </div>
                              <?php
                                 if(trim($v["features"])!=""){
                                 
                                 ?>							
                              <div class="product-box-desc">
                                 <div class="inner-box-desc">
                                    <?php
                                       $feature=explode("||",$v["features"]);
                                       foreach($feature as $k3=>$v3){
                                       	$feat_desc=explode(":",$v3);
                                       ?>									
                                    <div class="reward"><span><?php  echo $feat_desc[0]; ?>:</span> <?php  echo $feat_desc[1]; ?></div>
                                    <?php
                                       }
                                       ?>	
                                 </div>
                              </div>
                              <?php
                                 }
                                 ?>
                              <?php
                                 if(trim($v["weight"])!=""){
                                 
                                 ?>							
                              <div class="product-box-desc">
                                 <div class="inner-box-desc">
                                    <?php
                                       $weights=explode("||",$v["weight"]);
                                       foreach($weights as $k3=>$v3){
                                       	$weight_desc=explode(":",$v3);
                                       ?>									
                                    <div class="reward"><span><?php echo $lang_53; ?>:</span> <?php  echo $weight_desc[0].seeMoreDetails("awu_unit","ambit_weight_unit",array("awu_id"=>$weight_desc[1])); ?></div>
                                    <?php
                                       }
                                       ?>	
                                 </div>
                              </div>
                              <?php
                                 }
                                 ?>		
                              <?php
                                 if(trim($v["apa_vr_id"])!=""){
                                 
                                 ?>							
                              <div class="product-box-desc">
                                 <div class="inner-box-desc">
                                  <?php
                                    $query = " SELECT c.cn_name, c.cn_iso_code FROM ambit_product_add AS a ";
									 $query .= "JOIN vendor_registration AS b ";
									 $query .= "JOIN ambit_country AS c ";
									 $query .= "ON a.apa_vr_id = b.vr_id AND b.country = c.cn_id ";
									 $query .= "WHERE a.apa_id=".$v["apa_id"];
									 
									 $country_data = getDetails(doSelect3($query));                                    
                                    ?>
                                  
                                    <div class="reward" style="padding-bottom: 30px">
                                    	<div  class="col-sm-6 col-xs-12" style="padding-left: 0px !important"><span><?php echo $lang_92; ?>:</span> <?php  echo seeMoreDetails("company","vendor_registration",array("vr_id"=>$v["apa_vr_id"])); ?></div>
                                       	<div class="col-sm-6 col-xs-12"><span><?php echo $lang_117; ?>: <?php  //echo $country_data[0]['cn_name']; ?><img src="image/flags/<?php echo strtolower($country_data[0]['cn_iso_code']);?>.png"  style="padding-left:10px;"/></span></div>
                                    </div>
                                	
                                    <div class="reward">
                                    <?php
                                   	if($v["posting_type"] == 1){
									?>
                                    	<div class="row">
                                    		<div class="col-sm-6 col-xs-12"><a href="" data-toggle="modal" data-target="#product_by_seller"><?php echo $lang_333; ?></a></div>
											<div class="col-sm-6 col-xs-12"><a href="" data-toggle="modal" data-target="#bid_history"><?php echo $lang_316; ?></a></div>
											<div class="col-sm-6 col-xs-12"><a href="" data-toggle="modal" data-target="#auctioneer_list"><?php echo $lang_322; ?></a></div>
											<div class="col-sm-6 col-xs-12"><a href="" data-toggle="modal" data-target="#similar_auction_products"><?php echo $lang_332; ?></a></div>
											
										</div>
										<?php	
									}
									?>
                                    </div>
                                	
                                       	
                                  </div>  
                              </div>
                              <?php
                                 }
                                 ?>							
                              <div class="product-box-desc">
                                 <div class="inner-box-desc">
                                    <?php
                                       if(trim($price_part[1])!=""){
                                       ?>
                                    <div class="price-tax col-sm-6 col-xs-12" style="padding-left:0px !important"><span><?php echo $lang_93; ?>:</span><?php echo currency1($v["currency"],$price_part[1]);  ?></div>
                                    <?php
                                       }
                                       ?>
                                    <?php
                                       if(trim($price_part[2])!="" && trim($price_part[2])!="0"){
                                       ?>
                                    <div class="price-tax col-sm-6 col-xs-12"><span><?php echo $lang_39; ?>:</span><?php echo currency1($v["currency"],$price_part[2]);  ?></div>
                                    <?php
                                       }
                                       ?>
                                    <?php
                                       if(trim($price_part[3])!=""){
                                       ?>
                                    <div class="price-tax"><span><?php echo $lang_29; ?>:</span> <?php echo currency1($v["currency"],$price_part[3]);  ?></div>
                                    <?php
                                       }
                                       ?>
                                 </div>
                              </div>
                              <div id="product">
                                 <h4><?php echo $lang_94; ?></h4>
                                 <?php
                                    if(trim($v["size"])!=""){
                                    ?>									
                                 <div class="image_option_type form-group required">
                                    <label class="control-label"><?php echo $lang_96; ?></label>
                                    <ul class="product-options clearfix"id="input-option231">
                                       <?php
                                          $sizes=explode("||",$v["size"]);
                                          foreach($sizes as $k2=>$v2){
                                          $size=explode(":",$v2);
                                          
                                          ?>
                                       <li class="radio">
                                          <label>
                                          <input class="image_radio" type="radio" name="option[231]" value="33"> 
                                          <img src="image/demo/colors/green.jpg" data-original-title="<?php echo $size[0].' '.seeMoreDetails("asu_name","ambit_size_unit",array("asu_id"=>$size[1])); ?>" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
                                          <label> </label>
                                          </label>
                                       </li>
                                       <?php
                                          }
                                          ?>								
                                       <li class="selected-option">
                                       </li>
                                    </ul>
                                 </div>
                                 <?php
                                    }
                                    ?>		
                                 <div class="image_option_type form-group required">
                                    <label class="control-label"><?php echo $lang_95; ?></label>
                                    <ul class="product-options clearfix"id="input-option231">
                                       <?php
                                          $colors=explode("||",$v["color"]);
                                          foreach($colors as $k2=>$v2){
                                          $color=getDetails(doSelect1("apc_name,image","ambit_product_color",array("apc_id"=>$v2)));
                                          
                                          ?>
                                       <li class="radio">
                                          <label>
                                          <input class="image_radio" type="radio" name="option[231]" value="33"> 
                                          <img src="image/demo/colors/<?php echo $color[0]["image"]; ?>" data-original-title="<?php echo $color[0]["apc_name"]; ?>" class="img-thumbnail icon icon-color">				<i class="fa fa-check"></i>
                                          <label> </label>
                                          </label>
                                       </li>
                                       <?php
                                          }
                                          ?>								
                                       <li class="selected-option">
                                       </li>
                                    </ul>
                                 </div>
                                 <?php
                                    // $yesterday = date("'Y-m-d H:i:s", strtotime( '-1 days' ) );											
                                    //if($v["posting_type"]==1 && $stock > 0 && strtotime($v["listing_duration"]) > time() ){
                                    // if($v["posting_type"]==1 && $stock > 0 && strtotime($v["listing_duration"]) > strtotime($yesterday) ){
                                    if($v["posting_type"]==1 && $stock > 0 && strtotime($v["listing_duration"]) >$curdatetime && strtotime($v["listing_start"]) < $curdatetime){
                                 ?>
                                    <script>$(document).ready(function (){ $('.countdown_box').show(); })</script>

                                 <div class="cart" id="recnt_cart" >
                                    <button onclick="bid_now();" id="bid_now_button" style="background-color: #3498db;height:46px;" class="addToCart" type="button"  ><i class="fa fa-gavel fa-2x"></i> <span class=""><?php echo $lang_308; ?></span></button>
                                    <?php
                                       if(isset($_SESSION["ac_id"])){
                                       $my_bid=trim(seeMoreDetails('MAX(bid_amount)','ambit_product_bid',array("apa_id"=>trim($_GET["id"]),"cus_id"=>$_SESSION["ac_id"],"bid_status"=>1)));
                                       if($my_bid!=''){
                                       ?>
                                    <button onclick="bid_retract();" id="bid_retract_button" style="background-color: #3498db;height:46px;" class="addToCart" type="button"  ><i class="fa fa-gavel fa-2x"></i> <span class=""><?php echo $lang_366; ?></span></button>
                                    <button  id="bid_value_button" style="background-color: #3498db;height:46px;" class="addToCart" type="button"  ><i class="fa fa-gavel fa-2x"></i> <span class=""><?php echo $lang_367; ?> <?php echo currency1(unit_currency(),$my_bid);  ?></span></button>
                                    <?php
                                       }
                                       }
                                       ?>
                                    <input type="text" id="bid_value"  onkeypress="return only_number(event);"   value=""  style="border: 2px solid #c89f11;height:45px;display:none;" >
                                    <input type="button" id="bid_submit" onclick="bid_submit_amnt()" style="background-color: #3498db;display:none;" value="Submit"  class="btn btn-mega btn-lg" >
                                 </div>
                                 <br>
                                 <?php
                                    }
                                    ?>
                                 <!--	<div class="box-checkbox form-group required">
                                    <label class="control-label">Checkbox</label>
                                    <div id="input-option232">
                                    	<div class="checkbox">
                                    		<label for="checkbox_1"><input type="checkbox" name="option[232][]" value="36" id="checkbox_1"> Checkbox 1 (+$12.00)</label>
                                    	</div>
                                    	<div class="checkbox">
                                    		<label for="checkbox_2"><input type="checkbox" name="option[232][]" value="36" id="checkbox_2"> Checkbox 2 (+$36.00)</label>
                                    	</div>
                                    	<div class="checkbox">
                                    		<label for="checkbox_3"><input type="checkbox" name="option[232][]" value="36" id="checkbox_3"> Checkbox 3 (+$24.00)</label>
                                    	</div>
                                    	<div class="checkbox">
                                    		<label for="checkbox_4"><input type="checkbox" name="option[232][]" value="36" id="checkbox_4"> Checkbox 4 (+$48.00)</label>
                                    	</div>
                                    </div>
                                    </div> -->
                                 <div class="form-group box-info-product">
                                   <!-- <div class="option quantity">
                                       <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
                                          <label><?php echo $lang_97; ?></label>
                                          <input class="form-control" type="text" name="quantity" id="product_quantitiy"
                                             value="1">
                                          <input type="hidden" name="product_id" value="50">
                                          <span class="input-group-addon product_quantity_down">−</span>
                                          <span class="input-group-addon product_quantity_up">+</span>
                                       </div>
                                    </div>-->
                                    <!--<div class="cart">-->
                                       <!-- <input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" <?php if($stock > 0){ ?> onclick="my_cart('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"];?>');" <?php } ?> data-original-title="Add to Cart"> -->
                                       <!--<input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" 
                                          <?php if($stock > 0){ 
                                             $v["name"] = str_replace("'", "@#@#@#@#", $v["name"]);
                                             ?> 
                                          onclick="my_cart('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"];?>');" 
                                          <?php } ?> data-original-title="Add to Cart">
                                    </div>-->
                                    <div class="add-to-links wish_comp">
                                       <ul class="blank list-inline">
                                          <?php
                                             if(!isset($_SESSION["ac_id"])){
                                             ?>
                                          <li class="wishlist">
                                             <a class="icon" data-toggle="tooltip" title=""
                                                onclick="wishlist.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
                                             </a>
                                          </li>
                                          <?php
                                             }else{
                                             	?>
                                          <li class="wishlist">
                                             <a class="icon" data-toggle="tooltip" title=""
                                                onclick="wishlist3.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
                                             </a>
                                          </li>
                                          <?php
                                             }
                                             ?>
                                          <li class="compare">
                                             <a class="icon" data-toggle="tooltip" title=""
                                                onclick="compare.add('<?php echo $v["apa_id"]; ?>','<?php echo $cart_image; ?>','<?php echo $v["name"];?>','1','<?php echo $_SERVER["REQUEST_URI"]; ?>');" data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <!-- end box info product -->
                           </div>
                        </div>
                     </div>
                     <!-- <section class="col-lg-2 hidden-sm hidden-md hidden-xs slider-products">
                        <div class="module col-sm-12 four-block">
                        	<div class="modcontent clearfix">
                        		<div class="policy-detail">
                        			<div class="banner-policy">
                        				<div class="policy policy1">
                        					<a href="#"> <span class="ico-policy">&nbsp;</span>	90 day
                        					<br> money back </a>
                        				</div>
                        				<div class="policy policy2">
                        					<a href="#"> <span class="ico-policy">&nbsp;</span>	In-store exchange </a>
                        				</div>
                        				<div class="policy policy3">
                        					<a href="#"> <span class="ico-policy">&nbsp;</span>	lowest price guarantee </a>
                        				</div>
                        				<div class="policy policy4">
                        					<a href="#"> <span class="ico-policy">&nbsp;</span>	shopping guarantee </a>
                        				</div>
                        			</div>
                        		</div>
                        	</div>
                        </div>
                        </section> -->
                  </div>
                  <?php
                     }
                     
                     ?>
                  <script type="text/javascript">
                     // Cart add remove functions
                     var cart = {
                     	'add': function(product_id, quantity) {
                     	
                     		parent.addProductNotice('Product added to Cart', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3><a href="#">Apple Cinema 30"</a> added to <a href="#">shopping cart</a>!</h3>', 'success');
                     	}
                     }
                     
                     var wishlist = {
                     	'add': function(product_id) {
                     		parent.addProductNotice('Product added to Wishlist', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3>You must <a href="#">login</a>  to save <a href="#">Apple Cinema 30"</a> to your <a href="#">wish list</a>!</h3>', 'success');
                     	}
                     }
                     var compare = {
                     	'add': function(product_id) {
                     		parent.addProductNotice('Product added to compare', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>', 'success');
                     	}
                     }
                     
                     
                  </script>
               </div>
            </div>
            <!--Middle Part End-->
         </div>
         <!-- //Main Container -->
         <style type="text/css">
            #wrapper{box-shadow:none;}
            #wrapper > *:not(.main-container){display: none;}
            #content{margin:0}
            .container{width:100%;}
            .product-info .product-view,.left-content-product,.box-info-product{margin:0;}
            .left-content-product .content-product-right .box-info-product .cart input{padding:12px 16px;}
            .left-content-product .content-product-right .box-info-product .add-to-links{ width: auto;  float: none; margin-top: 0px; }
         </style>
      </div>
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
      
      
      
<script src="assets/js/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/js/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/js/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="assets/js/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
      <!-- Theme files
         ============================================ -->
      <script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
      <script type="text/javascript" src="js/themejs/addtocart.js"></script>
      <script type="text/javascript" src="js/themejs/application.js"></script>
   </body>
</html>
<script>
	var target_path='<?php echo $_SERVER["REQUEST_URI"]; ?>';
	
   function bid_now(){
   	var target_path='<?php echo $_SERVER["REQUEST_URI"]; ?>';
   	$.post(
   	'check_login.php',
   	{target_path:target_path},
   	function(r){
   		if(r==1){
   		check_bidder();
   		}else{
   		window.location='login.php';
   		}
   	}
   	);
   	
   }
   
   function check_bidder(){
   	$.post(
   	'ajax_check_bidder.php',
   	{apa_id:<?php echo $_GET["id"]; ?>},
   	function(r){
   		if(r==404){
   			// alert("Sorry! you have placed higest bid.");
            toastr.error("Sorry! you have placed higest bid.");
   			return false;
   		// }else{
   			
   		// 	$("#bid_value").show(500);
   		// 	$("#bid_value").focus();
   		// 	$("#bid_now_button").hide(500);
   		// 	$("#bid_submit").show(500);	
   		// }
   		}else if(r==1){
   			
   			$("#bid_value").show(500);
   			$("#bid_value").focus();
   			$("#bid_now_button").hide(500);
   			$("#bid_submit").show(500);	
   		}else if(r==2){
   			window.location='register_detail.php';	
   		}
   		
   	}
   	);
   }
   
   function bid_retract(){
   	$.post(
   	'ajax_bid_retract.php',
   	{apa_id:<?php echo $_GET["id"]; ?>},
   	function(r){
   		// alert(r);
         toastr.info("Your price is "+r);

   		location.reload();
   	}
   	);
   }
   
   function only_number(value)
          {
             var charCode = (value.which) ? value.which : value.keyCode;
             if (charCode != 46 && charCode > 31  && (charCode < 48 || charCode > 57)){
                return false;
   		  }else{
             return true;
   		  }
   		  
          }
   
   // function bid_submit_amnt(){
   // 	var bid_value=$("#bid_value").val().trim();
   // 	$.post(
   // 	'ajax_post_bid.php',
   // 	{bid_amount:bid_value,apa_id:<?php echo $_GET["id"]; ?>},
   // 	function(r){
   // 		//alert(r);
   // 		var r=r.split("||");
   // 		if(r[0]==1){
   // 			location.reload();
   // 		}else if(r[0]==2){
   // 			alert("Sorry! now higest bid is :"+r[1]);
   // 		}else if(r[0]==404){
   // 			alert("Sorry! you have placed higest bid.");
   // 		}else{
   // 			alert("Failed");
   // 		}
   // 	}
   // 	);
   // }

   function bid_submit_amnt(){
        var bid_value=$("#bid_value").val().trim();
		if(bid_value > 100000){
			toastr.error("You can't input over than 100000");
		}else{

			$.post(
				'ajax_post_bid.php',
				{bid_amount:bid_value,apa_id:<?php echo $_GET["id"]; ?>},
				function(r){
					var r=r.split("||");
					if(r[0]==1){
						location.reload();
					}else if(r[0]==2){
						toastr.error("Sorry! now higest bid is :"+r[1]);
					}else if(r[0]==404){
						toastr.error("Sorry! you have placed higest bid.");
					}else{
						toastr.error("Failed");
					}
				}
			);

		}
        
    }
</script>

<?php
include_once("auction_product_modal.php");
?>

