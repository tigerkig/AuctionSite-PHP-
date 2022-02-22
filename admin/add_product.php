

<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["id"]) && $_SESSION["username"]){
   $admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
   
   $_SESSION["main_menu"] = "add_features";
   $_SESSION["sub_menu"]  = "add_brand";
   
   include("include/header.php");
   ?>
<script type="text/javascript">
   function error_border(id){
   	$("#"+id).css("border", "2px solid red");
   }
   function no_border(id){
   	$("#"+id).css("border", "2px solid SlateGrey  ");
   }
   	function add_brand_validation(){
   	var ab_name=$("#ab_name").val();
   	no_border("ab_name");
   	if(ab_name.trim()==""){
   		alert("Please Type Brand Name");
   		error_border('ab_name');
   		return false;
   	}
   	$.post(
   		"add_update_brand.php",
   		{ab_name:ab_name,msg:'add_brand'},
   		function(r){
   			if(r==1){
   			alert("Brand added successfully");
   			}
   			//$("#ajax").html(r[2]);
   			window.location="add_brand.php";
   		}
   		);
   	}
   
   function update_brand_validation(){
   	//alert("sidd");
   	var ab_id=$("#ab_id").val();
   	no_border('ab_id');
   	if(ab_id==0){
   		alert("Please Select Brand");
   		error_border('ab_id');
   		return false;
   	}
   	
   	var ab_name=$("#new_ab_name").val();
   
   	if(ab_name.trim()==""){
   	alert("Please Type Brand");
   	//$("#new_country").focus();
   	error_border('new_ab_name');
   	return false;
   	}
   	$.post(
   	"add_update_brand.php",
   	{ab_name:ab_name,ab_id:ab_id,msg:'update_brand'},
   	function(r){
   		
   			if(r==1){
   	alert("Brand updated successfully");
   	}
   	//$("#ajax").html(r[2]);
   	window.location="add_brand.php";
   	}
   	);
   }
   
   function delete_brand_validation()
   {
   	var ab_id=$("#delete_ab_id").val();
   	no_border('delete_ab_id');
   	if(ab_id==0){
   		alert("Please select Brand");
   		error_border('delete_ab_id');
   		return false;
   	}
   	$.post(
   	"add_update_brand.php",
   	{ab_id:ab_id,msg:'delete_brand'},
   	function(r){
   			if(r==1){
   	alert("Brand deleted successfully");
   	}
   	//$("#ajax").html(r[2]);
   	window.location="add_brand.php";
   	}
   	);
   }
   
   function get_desc(){
   	var asb_id=$("#asb_id").val();
   	$.post(
   	"add_update_brand.php",
   	{asb_id:asb_id,msg:'get_desc'},
   	function(r){
   		$("#desc").text(r);
   	}
   	);
   }
   function changeStatus(ab_id){
   		$.post("ajax_top_search_approve.php",{ab_id:ab_id},function(r){
   			if(r==1){	
   		location.reload();	
   	}else{
   		alert("Something went wrong !");
   		}
   	});
   	}
   function approve_sbrand_validation(){
   	var asb_id=$("#asb_id").val();
   	no_border('asb_id');
   	if(asb_id==0){
   		alert("Please Select Brand");
   		error_border('asb_id');
   		return false;
   	}
   	$.post(
   	"add_update_brand.php",
   	{asb_id:asb_id,msg:'add_suggest_brand'},
   	function(r){
   			if(r==1){
   	alert("Brand added successfully");
   	}
   	window.location="add_brand.php";
   	}
   	);
   
   }
   
   function delete_sbrand_validation(){
   	var asb_id=$("#asb_id").val();
   	no_border('asb_id');
   	if(asb_id==0){
   		alert("Please Select Brand");
   		error_border('asb_id');
   		return false;
   	}
   	$.post(
   	"add_update_brand.php",
   	{asb_id:asb_id,msg:'delete_suggest_brand'},
   	function(r){
   			if(r==1){
   	alert("Brand Deleted successfully");
   	}
   	window.location="add_brand.php";
   	}
   	);
   
   }
</script>
<section id="content_wrapper">
<div id="topbar-dropmenu-wrapper">
   <div class="topbar-menu row">
      <div class="col-xs-4 col-sm-2">
         <a href="#" class="service-box bg-danger">
         <span class="fa fa-music"></span>
         <span class="service-title">Audio</span>
         </a>
      </div>
      <div class="col-xs-4 col-sm-2">
         <a href="#" class="service-box bg-success">
         <span class="fa fa-picture-o"></span>
         <span class="service-title">Images</span>
         </a>
      </div>
      <div class="col-xs-4 col-sm-2">
         <a href="#" class="service-box bg-primary">
         <span class="fa fa-video-camera"></span>
         <span class="service-title">Videos</span>
         </a>
      </div>
      <div class="col-xs-4 col-sm-2">
         <a href="#" class="service-box bg-alert">
         <span class="fa fa-envelope"></span>
         <span class="service-title">Messages</span>
         </a>
      </div>
      <div class="col-xs-4 col-sm-2">
         <a href="#" class="service-box bg-system">
         <span class="fa fa-cog"></span>
         <span class="service-title">Settings</span>
         </a>
      </div>
      <div class="col-xs-4 col-sm-2">
         <a href="#" class="service-box bg-dark">
         <span class="fa fa-user"></span>
         <span class="service-title">Users</span>
         </a>
      </div>
   </div>
</div>
<header id="topbar" class="alt">
   <div class="topbar-left">
      <ol class="breadcrumb">
         <li class="breadcrumb-icon">
            <a href="dashboard1.html">
            <span class="fa fa-home"></span>
            </a>
         </li>
         <li class="breadcrumb-active">
            <a href="dashboard1.html">Dashboard</a>
         </li>
         <li class="breadcrumb-link">
            <a href="index.html">Home</a>
         </li>
         <li class="breadcrumb-current-item">Dashboard</li>
      </ol>
   </div>
   <div class="topbar-right">
      <div class="ib topbar-dropdown">
         <label for="topbar-multiple" class="control-label">Reporting Period</label>
         <select id="topbar-multiple" class="hidden">
            <optgroup label="Filter By:">
               <option value="1-1">Last 30 Days</option>
               <option value="1-2" selected="selected">Last 60 Days</option>
               <option value="1-3">Last Year</option>
            </optgroup>
         </select>
      </div>
      <div class="ml15 ib va-m" id="sidebar_right_toggle">
         <div class="navbar-btn btn-group btn-group-number mv0">
            <button class="btn btn-sm btn-default btn-bordered prn pln">
            <i class="fa fa-bar-chart fs22 text-default"></i>
            </button>
         </div>
      </div>
   </div>
</header>
<div id="ajax">
   <section id="content" class="table-layout animated fadeIn">
      <!-- <div class="chute chute-center"> -->
      <div class="" id="register" role="tabpanel">
         <div class="panel">
            <div class="panel-heading">
               <span class="panel-title">
               Add Brand
               </span>
            </div>
            <form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
               <div class="panel-body pn">
                  <div class="section">
                     <!-- <label for="field" class="field prepend-icon"> -->
                     <!-- <input type="text" name="ab_name" id="ab_name" value="" style="margin: 0px; width: 938px;height:40px;" /> -->
                     <input class="form-control" type="text" name="ab_name" id="ab_name" value=""/>
                     <!-- </label> -->
                  </div>
                  <br/>
                  <div class="section">
                     <div class="pull-right">
                        <input type="submit" name="update" class="btn  btn-primary" onclick="add_brand_validation();" value="Add"  />
                     </div>
                  </div>
               </div>
               <div class="panel-footer"></div>
            </form>
            <hr>
            <div class="panel-heading">
               <span class="panel-title">
               Update Brand
               </span>
            </div>
            <form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
               <div class="panel-body pn">
                  <div class="section">
                     <!-- <label for="field" class="field prepend-icon"> -->
                     <!-- <select  id="ab_id" style="margin: 0px; width: 938px; height:40px;"> -->
                     <select class="form-control"  id="ab_id">
                        <option value="0">Select Brand</option>
                        <?php
                           $brand=getDetails(doSelect("ab_id,ab_name","ambit_brand",array()));
                           foreach($brand as $k=>$v){
                           ?>
                        <option value="<?php echo $v["ab_id"]; ?>" >
                           <?php echo $v["ab_name"];  ?>
                        </option>
                        <?php
                           }
                           ?>
                     </select>
                     <!-- </label> -->
                  </div>
                  <br/>
                  <div class="section">
                     <!-- <label for="field" class="field prepend-icon"> -->
                     <!-- <input type="text"  id="new_ab_name" value="" style="margin: 0px; width: 938px;height:40px;" /> -->
                     <input class="form-control" type="text"  id="new_ab_name" value=""/>
                     <!-- </label> -->
                  </div>
                  <br/>
                  <div class="section">
                     <div class="pull-right">
                        <input type="submit" name="update" class="btn  btn-primary" onclick="update_brand_validation();" value="Update" />
                     </div>
                  </div>
               </div>
               <div class="panel-footer"></div>
            </form>
            <hr>
            <div class="panel-heading">
               <span class="panel-title">
               Delete Brand
               </span>
            </div>
            <form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
               <div class="panel-body pn">
                  <div class="section">
                     <!-- <label for="field" class="field prepend-icon"> -->
                     <!-- <select  id="delete_ab_id" style="margin: 0px; width: 938px;height:40px;"> -->
                     <select class="form-control"  id="delete_ab_id">
                        <option value="0">Select Brand</option>
                        <?php
                           $brand=getDetails(doSelect("ab_id,ab_name","ambit_brand",array()));
                           foreach($brand as $k=>$v){
                           ?>
                        <option value="<?php echo $v["ab_id"]; ?>" >
                           <?php echo $v["ab_name"];  ?>
                        </option>
                        <?php
                           }
                           ?>
                     </select>
                     <!-- </label> -->
                  </div>
                  <br/>
                  <div class="section">
                     <div class="pull-right">
                        <input type="submit" name="update" class="btn  btn-primary" onclick="delete_brand_validation();" value="Delete" />
                     </div>
                  </div>
               </div>
               <div class="panel-footer"></div>
            </form>
            <hr/>
            <hr>
            <div class="panel-heading">
               <span class="panel-title">
               Sggest Brand
               </span>
            </div>
            <form method="post" action="javascript:void(0);"   enctype="multipart/form-data" >
               <div class="panel-body pn">
                  <div class="section">
                     <!-- <label for="field" class="field prepend-icon"> -->
                     <!-- <select  id="asb_id" style="margin: 0px; width: 938px;height:40px;" onchange="get_desc();"> -->
                     <select class="form-control" id="asb_id" onchange="get_desc();">
                        <option value="0">Select Suggest Brand</option>
                        <?php
                           $brand=getDetails(doSelect("asb_id,asb_name,asb_desc","ambit_suggest_brand",array()));
                           foreach($brand as $k=>$v){
                           ?>
                        <option value="<?php echo $v["asb_id"]; ?>" >
                           <?php echo $v["asb_name"];  ?>
                        </option>
                        <?php
                           }
                           ?>
                     </select>
                     <!-- </label> -->
                  </div>
                  <br/>
                  <div class="section">
                     <!-- <label for="field" class="field prepend-icon"> -->
                     <!-- <textarea style="width: 938px; height: 156px;" readonly id="desc"></textarea> -->
                     <textarea class="form-control" readonly id="desc"></textarea>
                     <!-- </label> -->
                  </div>
                  <br/>
                  <div class="section">
                     <div class="">
                        <input type="submit" name="update" class="btn  btn-primary" onclick="approve_sbrand_validation();" value="Approve" />
                        <input type="submit" name="update" class="btn  btn-primary" onclick="delete_sbrand_validation();" value="Delete" />
                     </div>
                  </div>
               </div>
               <div class="panel-footer"></div>
            </form>
            <hr/>
         </div>
      </div>
   </section>
   <section id="content" class="table-layout animated fadeIn">
      <div class="chute chute-center">
         <div class="row">
            <!--  -->
            <div class="col-md-12">
               <div class="panel panel-visible" id="spy6">
                  <div class="panel-heading">
                     <div class="panel-title hidden-xs">
                        Brand Listing 
                        <?php
                           $result=getDetails(doSelect("ab_id,ab_name,top_search_status","ambit_brand",array()));
                           
                           ?>
                     </div>
                  </div>
                  <div class="panel-body pn">
                     <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                           <thead>
                              <tr>
                                 <th class="va-m">Sl. No:</th>
                                 <th class="va-m">Brand Name</th>
                                 <th class="va-m">Top Search Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $i=1;
                                 foreach($result as $k=>$v){
                                 
                                 ?>
                              <tr>
                                 <td><?php echo $i;  ?></td>
                                 <td><?php echo $v["ab_name"];  ?></td>
                                 <td><?php if($v["top_search_status"]==1)echo '<img src="icon/tick1.png" width="20">';else echo '<img src="icon/cross.png" width="20">';  ?> <a href="javascript:void(0);" onclick="changeStatus('<?php echo $v["ab_id"];  ?>');" title="Change Status"><img src="icon/edit.png" width="13" /></a> </td>
                              </tr>
                              <?php
                                 $i++;
                                 }
                                 ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<!-- ajax div -->
<?php
   require_once("include/footer.php");
   }else{
   	echo '<script>window.location="utility-login.php";</script>';
   }
   ?>

