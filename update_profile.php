

<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["ac_id"])){
   include("include/header.php");
   
   ?>
<script type="text/javascript">
   function fetch_city(){
      var cn_id=$("#country").val();
      $.ajax({
        url:'fetch_state.php?cn_id='+cn_id,
        type:'post',
        dataType:'text',
        cache:false,
        contentType:false,
        processData:false,
        success:function(response){
        //alert(response);
         $("#city").html(response); 
        }
      });
    }
   
   
   
   
   $(document).ready(function() {
	   $("#ajax_des").on('submit',(function(e){  
		   var nick_name=$("#nick_name").val();
		   var name		=$("#name").val();
		   var address	=$("#address").val();
		   var landmark	=$("#landmark").val();
		   var country	=$("#country").val();
		   var city		=$("#city").val();
		   var phone	=$("#phone").val();
		   var post_code=$("#post_code").val();
		   
		   nick_name = nick_name.trim();
		   nick_name = nick_name.toLowerCase();
		   if(nick_name==""){
			   alert("Nickname Required");
			   $("#nick_name").focus();
			   return false;
	   		}else if(nick_name=="admin" || nick_name=="administrator" || nick_name=="auction" || nick_name=="ouslet" || nick_name=="email address" || nick_name=="auction ouslet"){
				alert("A prohibited term for Nickname has been entered.\nPlease enter again.");
				$("#nick_name").val('');
				$("#nick_name").focus();
			   return false;
			}
	   		
	   		if(name.trim()==""){
			   alert("Name Required");
			   $("#name").focus();
			   return false;
	   		}
	   
		   if(address.trim()==""){
			   alert("Address Required");
			   $("#address").focus();
			   return false;
		   }
		   /*if(landmark.trim()==""){
			   alert("Landmark Required");
			   $("#landmark").focus();
			   return false;
		   }*/
		   if(country.trim()==""){
			   alert("Country Required");
			   $("#country").focus();
			   return false;
		   }
		   if(city.trim()==""){
			   alert("City Required");
			   $("#city").focus();
			   return false;
		   }
		   if(phone.trim()==""){
			   alert("Phone Required");
			   $("#phone").focus();
			   return false;
		   }
		   
		   if(isNaN(phone)){
		   		alert("Phone Invalid");
		      $("#phone").val("");
		      $("#phone").focus();
		   		return false;
		   }
		   
		   if(post_code.trim()==""){
			   alert("Post Code Required");
			   $("#post_code").focus();
			   return false;
		   }
	   	   
		   $.ajax({
		        url: "ajax_update_profile.php",
		   		type: "POST",
		   		data:  new FormData(this),
		   		contentType: false,
		      	cache: false,
		   		processData:false,
		   		success: function(data)
		   	    {
			   		if(data==1){
			   			alert("Update Successfully");
			   			window.location="index.php";
			   		}
			   		if(data==0){
			   			alert("Update Failed");
			   		}
		   	    },
		   	    error: function() 
		       	{
		       	}	        
		    });	   
	   }));	   	  
     });
</script>
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
      <li><a href="javascript:void(0);"><?php echo $lang_127; ?></a></li>
   </ul>
   <?php
      $select="ac_id,nick_name, name,email,address,landmark,country,city,phone,post_code";
      $cus_dtls=getDetails(doSelect1($select,"ambit_customer",array("ac_id"=>$_SESSION["ac_id"])));
      foreach($cus_dtls as $k6=>$v6){
      ?>
   <div class="row">
      <div id="content" class="col-sm-12">
         <h1 class="title"><?php echo $lang_127; ?></h1>
         <form action="javascript:void(0);" method="post" enctype="multipart/form-data" class="form-horizontal account-register clearfix" id="ajax_des">
            <fieldset id="account">
               <legend><?php echo $lang_108; ?></legend>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-firstname"><?php echo $lang_323; ?></label>
                  <div class="col-sm-10">
                     <input type="text" name="nick_name" id="nick_name" value="<?php echo $v6["nick_name"]; ?>" placeholder="Nickname" class="form-control">
                  </div>
               </div>
               
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-firstname"><?php echo $lang_128; ?></label>
                  <div class="col-sm-10">
                     <input type="text" name="name" id="name" value="<?php echo $v6["name"]; ?>" placeholder="Name" class="form-control">
                  </div>
               </div>
            </fieldset>
            <fieldset id="address3">
               <legend><?php echo $lang_114; ?></legend>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-address-1"><?php echo $lang_115; ?></label>
                  <div class="col-sm-10">
                     <input type="text" name="address" id="address" value="<?php echo $v6["address"]; ?>" placeholder="Address" id="input-address-1" class="form-control">
                  </div>
               </div>
              <!-- <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-address-2"><?php echo $lang_116; ?></label>
                  <div class="col-sm-10">
                     <input type="text" name="landmark" id="landmark" value="<?php echo $v6["landmark"]; ?>" placeholder="Landmark" id="input-address-2" class="form-control">
                  </div>
               </div>-->
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-country"><?php echo $lang_117; ?></label>
                  <div class="col-sm-10">
                  	    <input type="text" name="country" id="country" value="<?php echo $v6["country"]; ?>" placeholder="Country" class="form-control">
                
                     <!--<select name="country" id="country" class="form-control" onchange="fetch_city();">
                        <option  value="0" ><?php echo $lang_118; ?></option>
                        <?php
                           $country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
                           foreach ($country as $k => $v) {
                             # code...
                           ?>
                        <option value="<?php echo $v["cn_id"]; ?>" <?php if($v6["country"]==$v["cn_id"]) echo 'selected';   ?>   ><?php echo $v["cn_name"];  ?></option>
                        <?php
                           }
                           ?>
                     </select>-->
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-zone"><?php echo $lang_69; ?></label>
                  <div class="col-sm-10">
                	 <input type="text" name="city" id="city" value="<?php echo $v6["city"]; ?>" placeholder="City" class="form-control">
                
                     <!--<select name="city" id="city" class="form-control" >
                        <option value="0"> --- <?php echo $lang_69; ?> --- </option>
                        <?php
                           $city=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$v6["country"])));
                           foreach ($city as $k => $v) {
                           ?>
                        <option value="<?php echo $v["ct_id"]; ?>" <?php if($v6["city"]==$v["ct_id"]) echo 'selected';   ?>   ><?php echo $v["ct_name"];  ?></option>
                        <?php
                           }
                                         ?>	
                     </select>-->
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-postcode"><?php echo $lang_59; ?></label>
                  <div class="col-sm-10">
                     <input type="text" name="phone" id="phone" value="<?php  echo $v6["phone"]; ?>" placeholder="Phone No" id="input-postcode" class="form-control">
                  </div>
               </div>
               <div class="form-group required">
                  <label class="col-sm-2 control-label" for="input-postcode"><?php echo $lang_119; ?></label>
                  <div class="col-sm-10">
                     <input type="text" name="post_code" id="post_code" value="<?php  echo $v6["post_code"]; ?>" placeholder="Post Code" id="input-postcode" class="form-control">
                  </div>
               </div>
            </fieldset>
            <div class="buttons">
               <div class="pull-right">
               		<input type="submit" value="<?php echo $lang_72; ?>" class="btn btn-primary">
               </div>
            </div>
         </form>
      </div>
   </div>
   <?php
      }
      ?>
</div>
<!-- //Main Container -->
<!-- Footer Container -->
<?php
   include("include/footer.php");
   }else{
   echo '<script>window.location="login.php";</script>';
   }
   ?>

