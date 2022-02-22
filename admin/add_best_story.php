

<?php
   session_start();
   require_once("function.php");
   if(isset($_SESSION["id"]) && $_SESSION["username"]){
   $admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
   
   $_SESSION["main_menu"] = "add_features";
   $_SESSION["sub_menu"]  = "add_best_story";
   
   include("include/header.php");
   ?>
<script type="text/javascript">
   function error_border(id){
   	$("#"+id).css("border", "2px solid red");
   }
   function no_border(id){
   	$("#"+id).css("border", "2px solid SlateGrey  ");
   }
  
  
   	function add_best_story(best_id){
	   	var best_story = $("#best_story" + best_id).val();
	   	no_border("best_story" + best_id);
	   	if(best_story.trim()==""){
	   		alert("Please Type Best Story #" + best_id);
	   		error_border('best_story');
	   		return false;
	   	}
	   	var action = "add_best_story";
	   	$.post(
	   		"ajax_add_best_story.php",
	   		{best_id: best_id, comment: best_story, action: action},
	   		function(r){
	   			if(r==1){
	   				alert("Best story #" + best_id + " added successfully");
	   				window.location="add_best_story.php";
	   			}else if(r==0){
					window.location="add_best_story.php";
				}else if(r == 2){
					alert("Please Select Best Story #" + best_id );
					window.location="reward_approve.php";
				}
	   			
	   		}
	   	);
   	}
  
   	function update_best_story(best_id){
	   	var best_story = $("#best_story" + best_id).val();
	   	no_border("best_story" + best_id);
	   	if(best_story.trim()==""){
	   		alert("Please Type Best Story #" + best_id);
	   		error_border('best_story');
	   		return false;
	   	}
	   	var action = "update_best_story";
	   	$.post(
	   		"ajax_add_best_story.php",
	   		{best_id: best_id, comment: best_story, action: action},
	   		function(r){
	   			if(r==1){
	   				alert("Best story #" + best_id + " updated successfully");
	   				window.location="add_best_story.php";
	   			}else if(r==0){
					window.location="add_best_story.php";
				}else if(r == 2){
					alert("Please Select Best Story #" + best_id );
					window.location="reward_approve.php";
				}
	   		}
	   	);
   	}
  
   	function delete_best_story(best_id){
	   	var best_story = $("#best_story" + best_id).val();
	   	no_border("best_story" + best_id);
	   
	   	var action = "delete_best_story";
	   	$.post(
	   		"ajax_add_best_story.php",
	   		{best_id: best_id, comment: best_story, action: action},
	   		function(r){
	   			if(r==1){
	   				alert("Best story #" + best_id + " deleted successfully");
	   				window.location="add_best_story.php";
	   			}else if(r==0){
					window.location="add_best_story.php";
				}else if(r == 2){
					alert("Please Select Best Story #" + best_id );
					window.location="reward_approve.php";
				}
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
                Best Story #1
               </span>
            </div>
            <form method="post" action="javascript:void(0);" >
               <div class="panel-body pn">
               <?php               
                $best_story1 = getDetails(doSelect("best_id,apa_id, comment","best_story",array("best_id" => 1)));               
                ?>
                  <div class="section">                    
                      <textarea class="form-control"  id="best_story1" rows="5" placeholder="This best funny story was created by a seller."><?php echo $best_story1[0]['comment'];?></textarea>
                  </div>
                  <br/>
                  <div class="section">
                     <div class="pull-right">
                        <input type="button" name="add"    class="btn  btn-primary" onclick="add_best_story(1);" value="Add" />
                        <input type="button" name="update" class="btn  btn-primary" onclick="update_best_story(1);" value="Update" />
                        <input type="button" name="delete" class="btn  btn-primary" onclick="delete_best_story(1);" value="Delete" />
                     </div>
                  </div>
               </div>
            </form>
         	
         	<hr/>
         	
         	 <div class="panel-heading">
               <span class="panel-title">
                Best Story #2
               </span>
            </div>
            <form method="post" action="javascript:void(0);" >
               <div class="panel-body pn">
               <?php               
                $best_story1 = getDetails(doSelect("best_id,apa_id, comment","best_story",array("best_id" => 2)));               
                ?>
                  <div class="section">                    
                      <textarea class="form-control"  id="best_story2" rows="5" placeholder="This best funny story was created by a seller."><?php echo $best_story1[0]['comment'];?></textarea>
                  </div>
                  <br/>
                  <div class="section">
                     <div class="pull-right">
                        <input type="button" name="add"    class="btn  btn-primary" onclick="add_best_story(2);" value="Add" />
                        <input type="button" name="update" class="btn  btn-primary" onclick="update_best_story(2);" value="Update" />
                        <input type="button" name="delete" class="btn  btn-primary" onclick="delete_best_story(2);" value="Delete" />
                     </div>
                  </div>
               </div>
            </form>
            
            <hr/>
            
             <div class="panel-heading">
               <span class="panel-title">
                Best Story #3
               </span>
            </div>
            <form method="post" action="javascript:void(0);" >
               <div class="panel-body pn">
               <?php               
                $best_story1 = getDetails(doSelect("best_id,apa_id, comment","best_story",array("best_id" => 3)));               
                ?>
                  <div class="section">                    
                      <textarea class="form-control"  id="best_story3" rows="5" placeholder="This best funny story was created by a seller."><?php echo $best_story1[0]['comment'];?></textarea>
                  </div>
                  <br/>
                  <div class="section">
                     <div class="pull-right">
                        <input type="button" name="add"    class="btn  btn-primary" onclick="add_best_story(3);" value="Add" />
                        <input type="button" name="update" class="btn  btn-primary" onclick="update_best_story(3);" value="Update" />
                        <input type="button" name="delete" class="btn  btn-primary" onclick="delete_best_story(3);" value="Delete" />                  
                    </div>
                  </div>
               </div>
            </form>
         	
  
            
   
           
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

