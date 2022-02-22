<!DOCTYPE html>
<?php
include("cron_files/renew_auction.php");

?>


<html lang="en">
   <head>
      <?php
      //$page_info = $_SERVER['REQUEST_URI'];
      $page_info = $_SERVER['PHP_SELF'];

      $title = get_site_settings(14);
      $keyword = get_site_settings(15);
      $description = get_site_settings(16);

      if(strpos($page_info, 'about_us') != false && strpos($page_info, 'about_us') > 0){
         $title = get_site_settings(35);
         $keyword = get_site_settings(36);
         $description = get_site_settings(37);
	   }

      if(strpos($page_info, 'for_sellers') != false && strpos($page_info, 'for_sellers') > 0){
         $title = get_site_settings(38);
         $keyword = get_site_settings(39);
         $description = get_site_settings(40);
      }

      if(strpos($page_info, 'contact') != false && strpos($page_info, 'contact') > 0){
         $title = get_site_settings(41);
         $keyword = get_site_settings(42);
         $description = get_site_settings(43);
      }

      if(strpos($page_info, 'for_buyers') != false && strpos($page_info, 'for_buyers') > 0){
         $title = get_site_settings(44);
         $keyword = get_site_settings(45);
         $description = get_site_settings(46);
      }

      if(strpos($page_info, 'blog') != false && strpos($page_info, 'blog') > 0){
         $title = get_site_settings(47);
         $keyword = get_site_settings(48);
         $description = get_site_settings(49);
      }

      if(strpos($page_info, 'search') != false && strpos($page_info, 'search') > 0){
         $title = get_site_settings(50);
         $keyword = get_site_settings(51);
         $description = get_site_settings(52);
      }
      
      ?>

      <title><?php echo $title;  ?></title>
      <meta charset="utf-8">
      <meta name="keywords" content="<?php echo $keyword;  ?>" />
      <meta name="description" content="<?php echo $description;  ?>" />
      <meta name="robots" content="index, follow" />

      <meta name="keywords" content="<?php echo $keywords_extra;?>"/>
      <!-- Mobile specific metas
         ============================================ -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <!-- Favicon
         ============================================ -->
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
      <link rel="shortcut icon" href="ico/favicon.png">
      <!-- Google web fonts
         ============================================ -->
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
      <!-- Libs CSS
         ============================================ -->
      <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
      <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
      <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
      <link href="css/themecss/lib.css" rel="stylesheet">
      <link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
      <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
      <!-- Theme CSS
         ============================================ -->
      <link href="css/themecss/so_megamenu.css" rel="stylesheet">
      <link href="css/themecss/so-categories.css" rel="stylesheet">
      <link href="css/themecss/so-listing-tabs.css" rel="stylesheet">
      <link id="color_scheme" href="css/theme.css" rel="stylesheet">
      <link id="color_scheme" href="css/starability-all.min.css" rel="stylesheet">
      <link href="css/responsive.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   
      <?php
         if (strpos($_SERVER['HTTP_HOST'], 'itechscripts.com') !== false) {
         ?>
      <script type="text/javascript">
         var _gaq = _gaq || [];
         _gaq.push(['_setAccount', 'UA-25344887-1']);
         _gaq.push(['_trackPageview']);
         (function() {
           var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
           ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
           var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
         })();         
        
      </script>
      <?php
         }
         ?>
         
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
      var target_path='<?php echo $_SERVER["REQUEST_URI"]; ?>';
      
         window.addEventListener("beforeunload", function (e) {  
         
		  /*  $.ajax({
			    url: "cart_empty.php", 
				type: 'post',
				dataType: 'text',
	            data: {id:1},
	            cache:false,
	            contentType:false,
      			processData:false,
	  			//async:false,
				success: function(response){
					if(response.success == 1){
											
					}
				},
				 error: function (jqXhr, textStatus, errorMessage) {
			            $('p').append('Error' + errorMessage);
			    }
			});
			*/
			/*$.post(
		      	"cart_empty.php",{msg:'cart_empty'},function(r){
		      	
		      	}
	      	);*/
		    
	    });
	    
      
      	function change_language(id){
      	$.ajax({
      		url:'change_language.php?id='+id,
      		type:'post',
      		dataType:'text',
      		cache:false,
      		contentType:false,
      		processData:false,
      		success:function(response){
      			location.reload();
      		}
      	});
      }
      
      function change_currency(id){
      	$.ajax({
      		url:'change_currency.php?id='+id,
      		type:'post',
      		dataType:'text',
      		cache:false,
      		contentType:false,
      		processData:false,
      		success:function(response){
      			location.reload();
      		}
      	});
      }
      
      function set_vendor(){
      	var vr_id=$("#vr_id").val().trim();
      	$.ajax({
      		url:'set_vendor.php?vr_id='+vr_id,
      		type:'post',
      		dataType:'text',
      		cache:false,
      		contentType:false,
      		processData:false,
      		success:function(response){
      			location.reload();
      		}
      	});
      }
      
      function logout(){
      	$.post("ajax_logout.php",{},function(r){
      		if(r==1){
      			window.location="index.php";
      		}
      
      	});
      }
      
      function remove_compare(){
      	$.post(
      	"remove_compare.php",{msg:'all'},function(r){
      		window.location="index.php";
      	}
      	);
      }
      
      function remove_compare1(id){
      	$.post(
      	"remove_compare.php",{msg:'one',id:id},function(r){
      	if(r > 0){
      		window.location="compare.php";
      	}else{
      	window.location="index.php";
      	}	
      	}
      	);
      }
      //function 
   </script>
   <body class="common-home res layout-home1">
      <div id="wrapper" class="wrapper-full banners-effect-7">
      <!-- Header Container  -->
      <header id="header" class=" variantleft type_1">
      <!-- Header Top -->
      <div class="header-top compact-hidden">
         <div class="container">
            <div class="row">
               <div class="header-top-left form-inline col-sm-6 col-xs-12 compact-hidden">
                  <div class="form-group languages-block ">
                     <form action="" method="post" enctype="multipart/form-data" id="bt-language">
                        <?php if(($_COOKIE['lang_id']=='English')||($_COOKIE['lang_id']=='')){?>
                        <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                        <img src="image/demo/flags/gb.png" alt="English" title="<?php  echo $lang_246; ?>">
                        <span class=""><?php  echo $lang_246; ?></span>
                        <span class="fa fa-angle-down"></span>
                        </a>
                        <?php } ?>
                        <?php if($_COOKIE['lang_id']=='Spanish'){?>
                        <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                        <img src="image/demo/flags/sp.png" alt="Spanish" title="<?php  echo $lang_247; ?>">
                        <span class=""><?php  echo $lang_247; ?></span>
                        <span class="fa fa-angle-down"></span>
                        </a>
                        <?php } ?>
                        <ul class="dropdown-menu">
                           <li><a href="javascript:change_language('English')"><img class="image_flag" src="image/demo/flags/gb.png" alt="<?php  echo $lang_246; ?>" title="<?php  echo $lang_246; ?>" /> <?php  echo $lang_246; ?> </a></li>
                           <li> <a href="javascript:change_language('Spanish')"> <img class="image_flag" src="image/demo/flags/sp.png" alt="<?php  echo $lang_247; ?>" title="<?php  echo $lang_247; ?>" /> <?php  echo $lang_247; ?> </a> </li>
                        </ul>
                     </form>
                  </div>
                  <div class="form-group languages-block ">
                     <form action="" method="post" enctype="multipart/form-data" id="bt-currency">
                        <?php if($_COOKIE['acu_id']==''){?>
                        <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                           <!-- <span class=""><?php  echo seeMoreDetails("currency","ambit_currency",array("unit_price"=>1)); ?></span> -->
                           <span class=""><?php  echo seeMoreDetails("currency","ambit_currency",array("acu_id"=>1)); ?></span>
                           <span class="fa fa-angle-down"></span>
                        </a>
                        <?php }else{ ?>
                        <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                        <span class=""><?php  echo seeMoreDetails("currency","ambit_currency",array("acu_id"=>$_COOKIE['acu_id'])); ?></span>
                        <span class="fa fa-angle-down"></span>
                        </a>
                        <?php
                           }
                           ?>
                        <ul class="dropdown-menu">
                           <?php
                              $currency=getDetails(doSelect("acu_id,currency,unit_price","ambit_currency",array()));
                              foreach($currency as $k=>$v){
                              ?>
                           <li><a href="javascript:change_currency('<?php echo $v["acu_id"]; ?>')"> <?php echo $v["currency"]; ?> </a></li>
                           <?php
                              }
                              ?>
                        </ul>
                     </form>
                  </div>
               </div>
               <div class="header-top-right collapsed-block text-right  col-sm-6 col-xs-12 compact-hidden">
                  <h5 class="tabBlockTitle visible-xs"><?php  echo $lang_251; ?><a class="expander " href="#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>
                  <div class="tabBlock" id="TabBlock-1">
                     <ul class="top-link list-inline">
                        <li class="account" id="my_account">
                           <?php
                              if(!isset($_SESSION["ac_id"])){
                              ?>						
                           <a href="#" title="My Account" class="btn btn-xs dropdown-toggle" data-toggle="dropdown"> <span ><?php  echo $lang_241; ?></span> <span class="fa fa-angle-down"></span></a>
                           <ul class="dropdown-menu ">
                              <li><a href="register.php"><i class="fa fa-user"></i> <?php  echo $lang_104; ?></a></li>
                              <li><a href="login.php"><i class="fa fa-pencil-square-o"></i> <?php  echo $lang_70; ?></a></li>
                           </ul>
                           <?php
                              }else{
                              ?>	
                           <a href="#" title="My Account" class="btn btn-xs dropdown-toggle" data-toggle="dropdown"> <span > <?php echo $_SESSION["name"]; ?></span> <span class="fa fa-angle-down"></span></a>
                           <ul class="dropdown-menu ">
                              <li><a href="update_profile.php" ><i class="fa fa-pencil-square-o"></i> <?php  echo $lang_127; ?></a></li>
                              <li><a href="order-history.php" ><i class="fa fa-pencil-square-o"></i> <?php  echo $lang_252; ?></a></li>
                              <li><a href="change_password.php" ><i class="fa fa-pencil-square-o"></i> <?php  echo $lang_286; ?></a></li>
                              <li><a href="won_auction.php" ><i class="fa fa-pencil-square-o"></i> <?php  echo $lang_299; ?></a></li>
                              <li><a href="purchase_auction.php" ><i class="fa fa-pencil-square-o"></i><?php  echo $lang_300; ?></a></li>
                              <li><a href="my_bid.php" ><i class="fa fa-pencil-square-o"></i> <?php  echo $lang_301; ?></a></li>
                              <li><a href="javascript:void(0);" onclick="logout();"><i class="fa fa-pencil-square-o"></i> <?php  echo $lang_226; ?></a></li>
                           </ul>
                           <?php
                              }
                              ?>						
                        </li>
                        <?php
                           if(isset($_SESSION["ac_id"])){
                           		//$wish_count=getDetails(doSelect1("*","ambit_add2wish",array("aaw_ac_id"=>$_SESSION["ac_id"])));
                           		$sql = "SELECT a.`apa_id`, a.`name`, a.stock, a.price, a.selling_price, COALESCE(b.shipment_status, 0) as shipment_status, c.aaw_apa_id FROM ambit_product_add AS a ";
								$sql .= " LEFT JOIN ambit_shipment_status AS b ";
								$sql .= " ON a.`apa_id`=b.`ass_apa_id` ";
								$sql .= " JOIN ambit_add2wish AS c ";
								$sql .= " ON  a.`apa_id`=c.`aaw_apa_id` ";
								$sql .= " WHERE a.stock > 0 AND (b.shipment_status != 1 OR  ISNULL(b.shipment_status)) AND aaw_ac_id=".$_SESSION["ac_id"];
								$sql .= " GROUP BY a.apa_id ";
								$sql .= " ORDER BY a.apa_id";
					  			$wish_count=getDetails(doSelect3($sql)); 
					  			      
                                $wish='Wish List ('.count($wish_count).')';
                           }else{
                           	$wish='Wish List (0)';
                           }
                           ?>
                        <li class="wishlist"><a href="wishlist.php" id="wishlist-total" class="top-link-wishlist" title="<?php echo $wish;  ?>"><span id="wish"><?php echo $wish; ?></span></a></li>
                        <li class="checkout"><a href="checkout.php" class="top-link-checkout" title="Checkout"><span ><?php  echo $lang_34; ?></span></a></li>
                        <li class="login"><a href="cart.php" title="Shopping Cart"><span ><?php  echo $lang_25; ?></span></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         function add_wishlist(product_id){
         	}
         function refresh_item(aad_cart_id,aad_cart_apa_id){
         	//alert("sidd");
         	var quantity=$("#quanty_num"+aad_cart_id).val();
         	//alert(quantity);
         	$.post(
         	"ajax_update_add_cart.php",
         	{quantity:quantity,aad_cart_id:aad_cart_id,aad_cart_apa_id:aad_cart_apa_id,msg:'login'},
         	function(r){
         		if(r == 0) {
         			alert("The order quantity exceeded the stock.\nThe order quantity has been changed to stock.");	
         		}
         		location.reload();
         	}
         	);
         }
         function refresh_session_item(id){
         	//alert("sidd");
         	
         	var quantity=$("#quanty_num"+id).val();
         	//alert(quantity);
         	$.post(
         	"ajax_update_add_cart.php",
         	{quantity:quantity,id:id,msg:'with_out_login'},
         	function(r){	
         		if(r == 0) {
         			alert("The order quantity exceeded the stock.\nThe order quantity has been changed to stock.");	
         		}
         		location.reload();
         	}
         	);
         }
         
         
         /* function quantity_num_plus(pr_id,image,name,target,stock){
         	var id=$("#product_quantitiy").val();
         	var id=parseInt(id)+1;
         	//alert(id);
         	$.post(
         	"ajax_add_quantity.php",
         	{quantity:id,pr_id:pr_id,image:image,name:name,target:target,stock:stock},
         	function(r){
         	$("#recnt_cart").html(r);	
         	}
         	);
         } */		
         	
         	function submit_review(id){
         		//alert("sidd");
         		var apr_apa_id=id;
         		var apr_name=$("#apr_name").val();
         		var comment=$("#comment").val();
         		var rating=$("input[name='rating']:checked").val();
         		if(apr_name.trim()==""){
         			alert("Name Required !");
         			$("#apr_name").focus();
         			return false;
         		}
         		
         		if(comment.trim()==""){
         			alert("Comment Required !");
         			$("#comment").focus();
         			return false;
         		}
         		if (!rating) {
         			alert("Please Give Your Rating.....");
         			return false;
         		}
         		$.post(
         		"ajax_submit_review.php",
         		{apr_name:apr_name,apr_apa_id:apr_apa_id,comment:comment,rating:rating},
         		function(r){
         		if(r==1){	
         		$("#apr_name").val("");
         		$("#comment").val("");
         		$("input:radio").attr("checked", false);
         		alert("Your Review Submitted Successfully....");
         		}
         		if(r==0){	
         		$("#apr_name").val("");
         		$("#comment").val("");
         		$("input:radio").attr("checked", false);
         		alert("Something Went Wrong....");
         		}
         		if(r==3){	
         		$("#apr_name").val("");
         		$("#comment").val("");
         		$("input:radio").attr("checked", false);
         		alert("You HAve to Login First....");
         		window.location="login.php";
         		}
         		}
         		);
         	}
         	
         	function submit_question(id){
         		//alert("sidd");
         		var apa_id=id;
         		var question=$("#question").val();
         		
         		
         		
         		if(question.trim()==""){
         			alert("question Required !");
         			$("#question").focus();
         			return false;
         		}
         
         		$.post(
         		"ajax_submit_question.php",
         		{apa_id:apa_id,question:question},
         		function(r){
         		if(r==1){	
         		$("#question").val("");
         		alert("Your Question Submitted Successfully....");
         		}
         		if(r==0){	
         		$("#question").val("");
         		alert("Something Went Wrong....");
         		}
         		if(r==3){	
         		$("#question").val("");
         		alert("You Have to Login First....");
         		window.location="login.php";
         		}
         		}
         		);
         	}
         	
         	function submit_vendor_question(id){
         		//alert("sidd");
         		var vr_id=id;
         		var question=$("#question").val();
         		
         		
         		
         		if(question.trim()==""){
         			alert("question Required !");
         			$("#question").focus();
         			return false;
         		}
         
         		$.post(
         		"ajax_submit_vendor_question.php",
         		{vr_id:vr_id,question:question},
         		function(r){
         		if(r==1){	
         		$("#question").val("");
         		alert("Your Question Submitted Successfully....");
         		}
         		if(r==0){	
         		$("#question").val("");
         		alert("Something Went Wrong....");
         		}
         		if(r==3){	
         		$("#question").val("");
         		alert("You Have to Login First....");
         		window.location="login.php";
         		}
         		}
         		);
         	}
         	
         	function submit_vendor_review(id){
         		//alert("sidd");
         		var vr_id=id;
         		var avr_name=$("#apr_name").val();
         		var comment=$("#comment").val();
         		var rating=$("input[name='rating']:checked").val();
         		if(avr_name.trim()==""){
         			alert("Name Required !");
         			$("#apr_name").focus();
         			return false;
         		}
         		
         		if(comment.trim()==""){
         			alert("Comment Required !");
         			$("#comment").focus();
         			return false;
         		}
         		if (!rating) {
         			alert("Please Give Your Rating.....");
         			return false;
         		}
         		
         		$.post(
         		"ajax_vendor_submit_review.php",
         		{avr_name:avr_name,vr_id:vr_id,comment:comment,rating:rating},
         		function(r){
         		if(r==1){	
         		$("#apr_name").val("");
         		$("#comment").val("");
         		$("input:radio").attr("checked", false);
         		alert("Your Review Submitted Successfully....");
         		}
         		if(r==0){	
         		$("#apr_name").val("");
         		$("#comment").val("");
         		$("input:radio").attr("checked", false);
         		alert("Something Went Wrong....");
         		}
         		if(r==3){	
         		$("#apr_name").val("");
         		$("#comment").val("");
         		$("input:radio").attr("checked", false);
         		alert("You Have to Login First....");
         		window.location="login.php";
         		}
         		}
         		);
         	}
         	
         	
         	function remove_cart(id){
         	//alert("sidd");
         	//alert(id);
         	$.post(
         	"remove_cart.php?msg="+'remove_cart',
         	{id:id},
         	function(r){
         		//alert(r);
         		if(r.trim()=='1'){
         			location.reload();
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
         
         function buy_now(){
           alert("You Have to Login First");
           window.location='login.php';
         }
         
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
         	alert(r[1]+' Items left');
         	}
         }
         );
         
         }
         
         function empty_alert(){
         	//alert("Item not available...sorry");
         	alert("Out of stock.");
         }
      </script>