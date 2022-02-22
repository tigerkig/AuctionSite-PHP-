<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["vendor_id"]) && $_SESSION["vendor_email"]){
   $vendor_details=getDetails(doSelect("*","vendor_registration",array("vr_id"=>$_SESSION["vendor_id"])));
   
   $_SESSION["main_menu"] = "dashboard";
   $_SESSION["sub_menu"]  = "add_product";
   
   include("include/header.php");
   ?>
   
<section id="content_wrapper">
   <header id="topbar" class="alt">
      <div class="topbar-left">
         <ol class="breadcrumb">
            <li class="breadcrumb-icon">
               <a href="dashboard1.html">
               <span class="fa fa-home"></span>
               </a>
            </li>
            <li class="breadcrumb-active">
               <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-link">
               <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-current-item">Add Product</li>
         </ol>
      </div>
   </header>
   <script type="text/javascript">
      function select_type(){
      	var posting_type=$("#posting_type").val().trim();
      	if(posting_type==0){
      		$("#ajax_select_type").hide();
      		$("#reserve_price").val('0');
      		$('#stock').prop('readonly', false);
      		
      	}else{
      		$("#reserve_price").val('');
      		$("#listing_duration").val('');
      		$("#ajax_select_type").show();
      		
      		$("#stock").val('1');
      		$('#stock').prop('readonly', true);
      		
      	}
      }
      
      $(document).ready(function(){
          var maxField = 20; //Input fields increment limitation
          var addButton = $('.add_button'); //Add button selector
          var wrapper = $('.add_feat'); //Input field wrapper
          var fieldHTML = '<div class="col-md-12"><div class="col-md-5"><div class="section"><label class="field prepend-icon"><input type="text" name="features_heading[]" id="features_heading" class="gui-input" placeholder="Features Heading"></label></div></div><div class="col-md-5"><div class="section"><label class="field append-icon"><input type="text" name="features_desc[]" id="features_desc" class="gui-input" placeholder="Features Description"></label></div></div><a href="#" class="remove_field">Remove</a></div>'; //New input field html 
          var x = 1; //Initial field counter is 1

          $(addButton).click(function(){ //Once add button is clicked
              if(x < maxField){ //Check maximum number of input fields
                  x++; //Increment field counter
                  $(wrapper).append(fieldHTML); // Add field html
              }
          });
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
               e.preventDefault(); $(this).parent('div').remove(); x--;
           })
      
          var maxField1 = 20; //Input fields increment limitation
          var addButton1 = $('.add_button1'); //Add button selector
          var wrapper1 = $('.add_feat1'); //Input field wrapper
          var fieldHTML1 = '<div class="col-md-12"><div class="col-md-6"><div class="section"><label class="field prepend-icon"><input type="number" name="weight[]" step="0.01" id="weight" class="gui-input" placeholder="Features Heading"></label></div></div><div class="col-md-4"><div class="section"><label class="field select"><select id="weight_unit" name="weight_unit[]"><option value="">Select Weight Unit</option>'+'<?php $weight_unit=getDetails(doSelect("awu_id,awu_unit","ambit_weight_unit",array()));foreach ($weight_unit as $k => $v) { ?><option value="<?php echo $v["awu_id"]; ?>"><?php echo $v["awu_unit"];  ?></option><?php } ?>'+'</select><i class="arrow double"></i></label></div></div><a href="#" class="remove_field1">Remove</a></div>'; //New input field html 
          var x = 1; //Initial field counter is 1
          $(addButton1).click(function(){ //Once add button is clicked
              if(x < maxField1){ //Check maximum number of input fields
                  x++; //Increment field counter
                  $(wrapper1).append(fieldHTML1); // Add field html
              }
          });
           $(wrapper1).on("click",".remove_field1", function(e){ //user click on remove text
               e.preventDefault(); $(this).parent('div').remove(); x--;
           })
      
          var maxField2 = 20; //Input fields increment limitation
          var addButton2 = $('.add_button2'); //Add button selector
          var wrapper2 = $('.add_feat2'); //Input field wrapper
          var fieldHTML2 = '<div class="col-md-6"><div class="col-md-5"><div class="section"><label class="field select"><select id="color" name="color[]"><option value="">Select Color</option><?php $color=getDetails(doSelect("apc_id,apc_name","ambit_product_color",array()));foreach ($color as $k => $v) { ?><option value="<?php echo $v["apc_id"]; ?>"><?php echo $v["apc_name"];  ?></option><?php } ?></select><i class="arrow double"></i></label></div></div><a href="#" class="remove_field2">Remove</a></div>'; //New input field html 
          var x = 1; //Initial field counter is 1
          $(addButton2).click(function(){ //Once add button is clicked
              if(x < maxField2){ //Check maximum number of input fields
                  x++; //Increment field counter
                  $(wrapper2).append(fieldHTML2); // Add field html
              }
          });
          $(wrapper2).on("click",".remove_field2", function(e){ //user click on remove text
               e.preventDefault(); $(this).parent('div').remove(); x--;
           })
      
          var maxField3 = 20; //Input fields increment limitation
          var addButton3 = $('.add_button3'); //Add button selector
          var wrapper3 = $('.add_feat3'); //Input field wrapper
          var fieldHTML3 = '<div class="col-md-12"><div class="col-md-5"><div class="section"><label class="field prepend-icon"><input type="number" step="0.01" name="size[]" id="size" class="gui-input" placeholder="Features Heading"></label></div></div><div class="col-md-5"><div class="section"><label class="field select"><select id="size_unit" name="size_unit[]"><option value="">Select Weight Unit</option>'+ '<?php $size_unit=getDetails(doSelect("asu_id,asu_name","ambit_size_unit",array()));foreach ($size_unit as $k => $v) {?><option value="<?php echo $v["asu_id"]; ?>"><?php echo $v["asu_name"];  ?></option><?php } ?>'+'</select><i class="arrow double"></i></label></div></div><a href="#" class="remove_field3">Remove</a></div>'; 
          //New input field html 
          var x = 1; //Initial field counter is 1
          $(addButton3).click(function(){ //Once add button is clicked
              if(x < maxField3){ //Check maximum number of input fields
                  x++; //Increment field counter
                  $(wrapper3).append(fieldHTML3); // Add field html
              }
          });
          $(wrapper3).on("click",".remove_field3", function(e){ //user click on remove text
               e.preventDefault(); $(this).parent('div').remove(); x--;
           })
      
        /*var keep_in=$("#keep_in").val();
        if(keep_in.trim()==""){
         alert("Select Product Posting Type");
         return false;
        }*/
      	$("#warranty_flag").on("change", function(e){
	      	var warranty_flag = $("#warranty_flag").val();
	      	if(warranty_flag == 1){
				$("#warranty_long").prop('disabled', false);	
			}else{
				$("#warranty_long").prop('disabled', 'desabled');
			}
		});
      	
      
      	$("#ajax_des").on('submit',(function(e){ 
			var name =$("#name").val();
	        if(name.trim()==""){
		         alert("Please Enter Product Name");
		         $("#name").focus();
		         return false;
	        }      	
      		
      		var brand =$("#brand").val();
	        if(brand.trim()==""){
		         alert("Please Select Product Brand");
		         $("#brand").focus();
		         return false;
	        }    
	        
	        var category =$("#category").val();
	        if(category.trim()==""){
		         alert("Please Select Product Category");
		         $("#category").focus();
		         return false;
	        }    
	        
	        var price = $("#price").val();
				if(price == 0){
					 alert("Please Enter Total Price.");
			         $("#price").focus();
			         return false;					
				}
         
	          var posting_type = $("#posting_type").val();
	          if(posting_type == 1){
	            var listing_duration = $("#listing_duration").val();
	              
	              if(listing_duration.trim()==""){
	                alert("Confirm Listing Duration Required");
	                $("#listing_duration").focus();
	                return false;
	              }
	              var curDate = new Date();
	      
	              //new Date(2017,10,5)
	              var lastDate = new Date(listing_duration); 
	        
	              var Diff_In_Time = lastDate.getTime() - curDate.getTime(); 
	              var Diff_In_Days = Diff_In_Time / (1000 * 3600 * 24);
	              
	              if(Diff_In_Days >= 30){
	                alert("The duration of the auction can be a maximum of 30 days.");
	                $("#listing_duration").focus();
	                return false;
	              }
	          }

				
				var reserve_price = $("#reserve_price").val();
				if(posting_type == 1 && reserve_price == 0){
					 alert("Please Enter Reserve Price.");
			         $("#reserve_price").focus();
			         return false;					
				}
          
          
          
	           var keep_in=$("#keep_in").val();
		        if(keep_in.trim()==""){
			         alert("Select Product Posting Type");
			         return false;
		        } 
	        
	          var tax = parseFloat($("#price").val() - $("#discount").val()) * 0.1025;
	          $("#tax").val(tax);
	          
	          var stock = $("#stock").val();
	          if(stock == ''){
               $("#stock").val(1);
            }
           var reserve = $('#reserve_price').val();
           var total_price = $('#price').val();
           console.log(reserve,total_price);
           if(reserve*1 > total_price*1){
               // if(confirm("Do you want to add this product?")){
               $.ajax({
                        url: "ajax_add_product.php",
                        type: "POST",
                        data:  new FormData(this),
                        contentType: false,
                           cache: false,
                        processData:false,
                        success: function(data){
                           if(data==1){
                                 alert("Product Added successfully.");
                                 window.location="add_product.php";
                           }else if(data==2){
                                 alert("Product Posting Limit Is Over.");
                                 // window.location="subscribe_package.php";
                           }else if(data==3){
                                 alert("Featured Product Posting Limit Is Over.");
                                 // window.location="subscribe_package.php";
                           }else {
                                 var dta=data.split("||");
                                 if(dta[0]==1){
                                    alert("Post Successfully.");
                                 }
                                 if(dta[1]==4){
                                    //alert("Some photo could not be uploaded..sorry");
                                    alert("Some photo could not be uploaded. Product photo Limit Is Over.");
                                    //window.location="subscribe_package.php";
                                    window.location="add_product.php"
                                 }
                           }
                        }       
                  });
            // }
           }else{
              toastr.error("You have to input Resever Price over than Total price.");
           }
      		
      	}));
      		  
      
      });
      
      	function fetch_sub_cat(){
          var pc_id=$("#category").val();
          $.ajax({
            url:'fetch_category.php?pc_id='+pc_id,
            type:'post',
            dataType:'text',
            cache:false,
            contentType:false,
            processData:false,
            success:function(response){
            //alert(response);
             $("#sub_cat").html(response); 
            }
          });
        }
      
        function fetch_sub_sub_cat(){
          var psc_id=$("#sub_cat").val();
      
          $.ajax({
            url:'fetch_category.php?psc_id='+psc_id,
            type:'post',
            dataType:'text',
            cache:false,
            contentType:false,
            processData:false,
            success:function(response){
            //alert(response);
             $("#sub_sub_cat").html(response); 
            }
          });
        }
   </script> 
   <section id="content" class="table-layout animated fadeIn">
      <div class="chute chute-center">
         <div class="mw1000 center-block">
            <div class="allcp-form">
               <div class="panel">
                  <div class="panel-heading">
                     <div class="panel-title"><?php echo $lang_151; ?></div>
                  </div>
                  <div class="panel-body">
                     <form method="post" action="javascript:void(0);" id="ajax_des" enctype="multipart/form-data">
                        <h6 class="mb20" id="spy1"><?php echo $lang_150; ?></h6>
                        <div class="row">
                           <div class="col-md-12">
                              <?php echo $lang_27;  ?> :
                              <div class="section">
                                 <label class="field">
                                 <input type="text" name="name" id="name" class="gui-input" placeholder="<?php //echo $lang_27; ?>">
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <?php echo $lang_152;  ?> :
                              <div class="section">
                                 <label class="field select">
                                    <select id="brand" name="brand" >
                                       <option value=""><?php //echo $lang_152; ?></option>
                                       <?php
                                          $brand=getDetails(doSelect("ab_id,ab_name","ambit_brand",array()));
                                          foreach ($brand as $k => $v) {
                                            # code...
                                          ?>
                                       <option value="<?php echo $v["ab_id"]; ?>"><?php echo $v["ab_name"];  ?></option>
                                       <?php
                                          }
                                          ?>
                                    </select>
                                    <i class="arrow"></i>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <!-- <div class="row">
                           <div class="col-md-6">
                           <div class="section">
                           <label class="field prepend-icon">
                           <input type="text" name="firstname" id="firstname" class="gui-input" placeholder="Input icon left">
                           </label>
                           </div>
                           </div>
                           <div class="col-md-6">
                           <div class="section">
                           <label class="field append-icon">
                           <input type="text" name="firstname" id="firstname" class="gui-input" placeholder="Input icon right">
                           </label>
                           </div>
                           </div>
                           </div> -->
                        <div class="row">
                           <div class="col-md-4">
                              <?php echo $lang_153;  ?> :
                              <div class="section">
                                 <label class="field select">
                                    <select id="category" name="category" onchange="fetch_sub_cat();">
                                       <option value=""><?php //echo $lang_153; ?></option>
                                       <?php
                                          $category=getDetails(doSelect("pc_id,pc_name","product_category",array()));
                                          foreach ($category as $k => $v) {
                                            # code...
                                          ?>
                                       <option value="<?php echo $v["pc_id"]; ?>"><?php echo $v["pc_name"];  ?></option>
                                       <?php
                                          }
                                          ?>
                                    </select>
                                    <i class="arrow"></i>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <?php echo $lang_154;  ?> :
                              <div class="section">
                                 <label class="field select">
                                    <select id="sub_cat" name="sub_cat" onchange="fetch_sub_sub_cat();">
                                       <option value=""><?php //echo $lang_154; ?></option>
                                    </select>
                                    <i class="arrow double"></i>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <?php echo $lang_155;  ?> :
                              <div class="section">
                                 <label class="field select">
                                    <select id="sub_sub_cat" name="sub_sub_cat">
                                       <option value=""><?php //echo $lang_155; ?></option>
                                    </select>
                                    <i class="arrow double"></i>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              A fun story associated with your product:
                              <div class="section">
                                 <label class="field prepend-icon">
                                 <textarea class="gui-textarea" id="description" name="description" placeholder="<?php echo $lang_156; ?>"></textarea>
                                 <label for="comment" class="field-icon">
                                 <i class="fa fa-list"></i>
                                 </label>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
	                        <div class="col-md-6">
	                          New or Used Product
	                          <div class="section">
	                             <label class="field select">
	                                <select id="new_flag" name="new_flag">
	                                   <option value=""></option>
	                                   <option value="1">New</option>
	                                   <option value="0">Used</option>	                                      
	                                </select>  
	                                <i class="arrow double"></i>                               
	                             </label>
	                          </div>
	                       </div>
                       
	                        <div class="col-md-6">
	                          Warranty Yes or No. If Yes How Long(Maximum is 6Mo.)
	                          <div class="section col-md-6" style="padding:0 0 0 0">
	                             <label class="field select">
	                                <select id="warranty_flag" name="warranty_flag">
	                                   <option value=""></option>
	                                   <option value="1">Yes</option>
	                                   <option value="0">No</option>	
	                                </select>  
	                                <i class="arrow double"></i>                               
	                             </label>
	                          </div>
	                    	
	                    
	                          <div class="section col-md-6" style="padding:0 0 0 0">
	                             <label class="field select">
	                                <select id="warranty_long" name="warranty_long">
	                                   <option value=""></option>
	                                   <option value="1">1 Months</option>
	                                   <option value="2">2 Months</option>
	                                   <option value="3">3 Months</option>
	                                   <option value="4">4 Months</option>
	                                   <option value="5">5 Months</option>
	                                   <option value="6">6 Months</option>                                      
	                                </select>    
	                                <i class="arrow double"></i>                             
	                             </label>
	                          </div>
                       		</div>
                       	</div>
                       
                       <div class="row">
                        	<div class="col-md-6">
	                          Is This Product Original or Imitation?
	                          <div class="section">
	                             <label class="field select">
	                                <select id="original_flag" name="original_flag">
	                                   <option value=""></option>
	                                   <option value="1">Original</option>
	                                   <option value="0">Imitation</option>	                                      
	                                </select>  
	                                <i class="arrow double"></i>                               
	                             </label>
	                          </div>
	                       </div>
	                       
	                        <div class="col-md-6">
	                          Can You Confirm The Authenticity Of The Product? Yes or No
	                          <div class="section">
	                             <label class="field select">
	                                <select id="auth_flag" name="auth_flag">
	                                   <option value=""></option>
	                                   <option value="1">Yes</option>
	                                   <option value="0">No</option>	                                      
	                                </select>     
	                                <i class="arrow double"></i>                            
	                             </label>
	                          </div>
	                       </div>
	                    </div>
                       
                       
                           
                        
                        <div class="row add_feat">
                           <div class="col-md-5">
                              <?php echo $lang_157;  ?> :
                              <div class="section">
                                 <label class="field prepend-icon">
                                 <input type="text" name="features_heading[]" id="features_heading" class="gui-input" placeholder="<?php //echo $lang_157; ?>">
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <?php echo $lang_158;  ?> :
                              <div class="section">
                                 <label class="field append-icon">
                                 <input type="text" name="features_desc[]" id="features_desc" class="gui-input" placeholder="<?php //echo $lang_158; ?>">
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <a href="javascript:void(0);" class="add_button" title="Add field"><?php echo $lang_159; ?></a>
                           </div>
                        </div>
                        <div class="row add_feat1">
                           <div class="col-md-6">
                              <?php echo $lang_53;  ?> :
                              <div class="section">
                                 <label class="field prepend-icon">
                                 <input type="number" name="weight[]" id="weight" step='0.01' class="gui-input" placeholder="<?php //echo $lang_53; ?>">
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <?php echo $lang_160;  ?> :
                              <div class="section">
                                 <label class="field select">
                                    <select id="weight_unit" name="weight_unit[]">
                                       <option value=""><?php //echo $lang_160; ?></option>
                                       <?php
                                          $weight_unit=getDetails(doSelect("awu_id,awu_unit","ambit_weight_unit",array()));
                                          foreach ($weight_unit as $k => $v) {
                                            # code...
                                          ?>
                                       <option value="<?php echo $v["awu_id"]; ?>"><?php echo $v["awu_unit"];  ?></option>
                                       <?php
                                          }
                                          ?>
                                    </select>
                                    <i class="arrow double"></i>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <a href="javascript:void(0);" class="add_button1" title="Add field"><?php echo $lang_161; ?></a>
                           </div>
                        </div>
                        <div class="row add_feat2">
                           <div class="col-md-6">
                              <?php echo $lang_95;  ?> :
                              <div class="section">
                                 <label class="field select">
                                    <select id="color" name="color[]">
                                       <option value=""><?php //echo $lang_162; ?></option>
                                       <?php
                                          $color=getDetails(doSelect("apc_id,apc_name","ambit_product_color",array()));
                                          foreach ($color as $k => $v) {
                                          ?>
                                       <option value="<?php echo $v["apc_id"]; ?>"><?php echo $v["apc_name"];  ?></option>
                                       <?php
                                          }
                                          ?>
                                    </select>
                                    <i class="arrow double"></i>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <a href="javascript:void(0);" class="add_button2" title="Add field"><?php echo $lang_163; ?></a>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                        <div class="row add_feat3">
                           <div class="col-md-6">
                              <?php echo $lang_96;  ?> :
                              <div class="section">
                                 <label class="field prepend-icon">
                                 <input type="number" name="size[]" id="size" step='0.01' class="gui-input" placeholder="<?php //echo $lang_96; ?>">
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <?php echo $lang_164;  ?> :
                              <div class="section">
                                 <label class="field select">
                                    <select id="size_unit" name="size_unit[]">
                                       <option value=""><?php //echo $lang_164; ?></option>
                                       <?php
                                          $size_unit=getDetails(doSelect("asu_id,asu_name","ambit_size_unit",array()));
                                          foreach ($size_unit as $k => $v) {
                                            # code...
                                          ?>
                                       <option value="<?php echo $v["asu_id"]; ?>"><?php echo $v["asu_name"];  ?></option>
                                       <?php
                                          }
                                          ?>
                                    </select>
                                    <i class="arrow double"></i>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <a href="javascript:void(0);" class="add_button3" title="Add field"><?php echo $lang_165; ?></a>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              Posting Type :
                              <div class="section">
                                 <label class="field select">
                                    <select id="posting_type" onchange="select_type();" name="posting_type" >
                                       <option value="1" selected>For auction</option>
                                       <!-- <option value="0"  >Only for sale</option> -->
                                    </select>
                                    <i class="arrow"></i>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              Currency :
                              <div class="section">
                                 <label class="field select">
                                    <select id="currency" name="currency">
                                       <?php
                                          $currency=getDetails(doSelect("acu_id,currency,unit_price","ambit_currency",array()));
                                          foreach ($currency as $k => $v) {
                                          ?>
                                       <option value="<?php echo $v["acu_id"]; ?>" <?php if($v["unit_price"]==1) echo 'selected';  ?> ><?php echo $v["currency"];  ?></option>
                                       <?php
                                          }
                                          ?>
                                    </select>
                                    <i class="arrow double"></i>
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <?php echo $lang_176;  ?> :
                              <div class="section">
                                 <label class="field">
                                 <input type="number" name="price[]" id="price" step="0.01" class="gui-input" placeholder="<?php //echo $lang_47; ?>">
                                 </label>
                              </div>
                           </div>
                           <!-- <div class="col-md-4">
                              <div class="section">
                              <label class="field">
                              <input type="text" name="price[]" id="tax" class="gui-input" placeholder="<?php echo $lang_166; ?>">
                              </label>
                              </div>
                              </div> -->
                           <input type="hidden" name="price[]" id="tax" class="gui-input" placeholder="<?php //echo $lang_166; ?>" value="10.25" readonly>
                           <div class="col-md-6">
                              <?php echo $lang_39;  ?> :
                              <div class="section">
                                 <label class="field">
                                 <input type="number" name="price[]" id="discount" value="0" step="0.01" class="gui-input" placeholder="<?php //echo $lang_167; ?>">
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <?php echo $lang_168;  ?> :
                              <div class="section">
                                 <label class="field">
                                 <input type="number" name="price[]" id="shipping" value="0" step="0.01" class="gui-input" placeholder="<?php //echo $lang_168; ?>">
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="row" style="margin-bottom:10px;">
                           <!-- <div id="ajax_select_type" style="display:none;"> -->
                           <div id="ajax_select_type" style="display:block;">
                              <div class="col-md-4" style="background-color:#1e6dd4cc;color:yellow;font-size: 1.2em;">
                                 Reserve Price :
                                 <div class="section">
                                    <label class="field">
                                    <input type="number" name="reserve_price" id="reserve_price" step="0.01" class="gui-input" placeholder="" required>
                                    </label>
                                 </div>
                              </div>

                              <div class="col-md-4" style="background-color:#1e6dd4cc;color:yellow;font-size: 1.2em;">
                                  Start Date:
                                 <div class="section">
                                    <label class="field">
                                    <input type="text" name="listing_start" id="listing_start" class="gui-input" placeholder="" required>
                                    <!-- <input type="date" name="listing_start" value="0000-00-00" id="listing_start" class="gui-input" placeholder="" required> -->
                                    </label>
                                 </div>
                              </div>
                              <div class="col-md-4" style="background-color:#1e6dd4cc;color:yellow;font-size: 1.2em;">
                                 End Duration :
                                 <div class="section">
                                    <label class="field">
                                    <input type="text" name="listing_duration" id="listing_duration" class="gui-input" placeholder="" required>
                                    <!-- <input type="date" name="listing_duration" value="0000-00-00" id="listing_duration" class="gui-input" placeholder="" required> -->
                                    </label>
                                 </div>
                              </div>

                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <?php echo $lang_169;  ?>
                              <div class="section">
                                 <label class="field">
                                 <input type="number" name="stock" id="stock" class="gui-input">
                                 </label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <?php echo $lang_170;  ?> :
                              <div class="section">
                                 <label class="field">
                                 <input type="text" name="video" id="video" class="gui-input" placeholder="<?php //echo $lang_170; ?>">
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <?php echo $lang_171; ?>
                              <div class="section">
                                 <label class="field select">
                                    <select id="keep_in" name="keep_in" >
                                       <option value=""><?php //echo $lang_171; ?></option>
                                       <option value="0"><?php echo $lang_172; ?></option>
                                       <option value="1"><?php echo $lang_173; ?></option>
                                    </select>
                                    <i class="arrow"></i>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <span>Please upload all photos at once. Recommended size 600&times600 jpg files.</span>
                              <div class="section">
                                 <label class="field">
                                 <input type="file" name="image[]" id="image" multiple class="gui-input" >
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <input class="btn btn-default btn-primary" type="submit" name="submit" value="<?php echo $lang_150; ?>" >
							   <a href="https://m.usps.com/m/PricesCalculate" class="btn btn-default btn-primary" target="_blank" style="font-size:14px;">Shipping Calculator(USPS) </a>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</section>
<aside id="sidebar_right" class="nano affix">
   <div class="sidebar-right-wrapper nano-content">
      <div class="sidebar-block br-n p15">
         <h6 class="title-divider text-muted mb20"> Visitors Stats
            <span class="pull-right"> 2015
            <i class="fa fa-caret-down ml5"></i>
            </span>
         </h6>
         <div class="progress mh5">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%">
               <span class="fs11">New visitors</span>
            </div>
         </div>
         <div class="progress mh5">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
               <span class="fs11 text-left">Returnig visitors</span>
            </div>
         </div>
         <div class="progress mh5">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
               <span class="fs11 text-left">Orders</span>
            </div>
         </div>
         <h6 class="title-divider text-muted mt30 mb10">New visitors</h6>
         <div class="row">
            <div class="col-xs-5">
               <h3 class="text-primary mn pl5">350</h3>
            </div>
            <div class="col-xs-7 text-right">
               <h3 class="text-warning mn">
                  <i class="fa fa-caret-down"></i> 15.7% 
               </h3>
            </div>
         </div>
         <h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>
         <div class="row">
            <div class="col-xs-5">
               <h3 class="text-primary mn pl5">660</h3>
            </div>
            <div class="col-xs-7 text-right">
               <h3 class="text-success-dark mn">
                  <i class="fa fa-caret-up"></i> 20.2% 
               </h3>
            </div>
         </div>
         <h6 class="title-divider text-muted mt25 mb10">Orders</h6>
         <div class="row">
            <div class="col-xs-5">
               <h3 class="text-primary mn pl5">153</h3>
            </div>
            <div class="col-xs-7 text-right">
               <h3 class="text-success mn">
                  <i class="fa fa-caret-up"></i> 5.3% 
               </h3>
            </div>
         </div>
         <h6 class="title-divider text-muted mt40 mb20"> Site Statistics
            <span class="pull-right text-primary fw600">Today</span>
         </h6>
      </div>
   </div>
</aside>

<style>body{min-height:2300px;}.content-header b,.allcp-form .panel.heading-border:before,.allcp-form .panel .heading-border:before{transition:all 0.7s ease;}@media (max-width: 800px) {.allcp-form .panel-body{padding:18px 12px;}.option-group .option{display:block;}.option-group .option+.option{margin-top:8px;}}</style>
<?php
   require_once("include/footer.php");
   
   }else{
   	echo '<script>window.location="vendor_login.php";</script>';
   }
   ?>
<script>
   var d = new Date(); 
   var t = d.toLocaleString('en-US', { timeZone: 'America/Chicago' });
   var chicagoDate = new Date(t);
   var year    = chicagoDate.getFullYear();
   var month   = chicagoDate.getMonth()+1; 
   var day     = chicagoDate.getDate();
   var hour    = chicagoDate.getHours();
   var minute  = chicagoDate.getMinutes();
   var defaultDate = year + '-' + month + '-' + day + ' ' + hour + ':' + minute;
   $("#listing_start").datetimepicker({
      dateFormat: 'yy-mm-dd',
      numberOfMonths: 1,
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      showButtonPanel: false,
      defaultValue: defaultDate,
      minDate: chicagoDate,
      beforeShow: function (input, inst) {
         var newclass = 'allcp-form';
         var themeClass = $(this).parents('.allcp-form').attr('class');
         var smartpikr = inst.dpDiv.parent();
         if (!smartpikr.hasClass(themeClass)) {
            inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
         }
      },
      onShow: function () {
            this.setOptions({
                maxDate:$('#listing_duration').val()?$('#listing_duration').val():false,
                maxTime:$('#listing_duration').val()?$('#listing_duration').val():false
            });
        },
      onClose: function( selectedDate ) {
         $( "#listing_duration" ).datetimepicker( "option", "minDate", selectedDate );
      }
   });

   $("#listing_duration").datetimepicker({
      dateFormat: 'yy-mm-dd ',
      numberOfMonths: 1,
      prevText: '<i class="fa fa-chevron-left"></i>',
      nextText: '<i class="fa fa-chevron-right"></i>',
      showButtonPanel: false,
      minDate: chicagoDate,
      beforeShow: function (input, inst) {
         var newclass = 'allcp-form';
         var themeClass = $(this).parents('.allcp-form').attr('class');
         var smartpikr = inst.dpDiv.parent();
         if (!smartpikr.hasClass(themeClass)) {
               inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
         }
      },
      onClose: function( selectedMaxDate ) {
         $( "#listing_start" ).datetimepicker( "option", "maxDate", selectedMaxDate );
      }
   });   



</script>