<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));

$_SESSION["main_menu"] = "footer_setting";
$_SESSION["sub_menu"]  = "blog";

include("include/header.php");
?>
<script type="text/javascript">
function validation(){
    var for_buyerss=$("#for_blog").val();
    if(for_buyers.trim()==""){
    alert("Please write Blog");
        $("#for_blog").focus();
        return false;
    }
}
function update_validation(id){
    var about=$("#for_blog").val();
    $.post("update_blog.php",{id:id,content:content},function(r){
        $("#ajax").html(r);
    });
}

function edit_blog(id){
    $.post("edit_blog.php",{ id:id },function(r){
        $("#ajax").html(r);
    });
}
function delete_blog(id){
    if(confirm("Do You Want To Delete This Blog?")){
        $.post("delete_blog.php", { id:id, set: 'delete_blog'}, function(r){
            if(r == 1){
                alert("Delete Successfully");
                window.location="blog.php";
            }
            if(r == 0){
                alert("Something Went Wrong....");
            }
        });
    }
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
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<?php
$about=getDetails(doselect1("content,id,photo,title","blog",array()));
?>
<span class="panel-title">
Blog
</span>
</div>
<div class="panel-body pn">
<!--<span style="text-decoration:none;color:blue;">Description:</span>-->
<!--<p style="text-align: justify;">-->
<?php //if(!empty($about)) echo $about[0]["content"]; else echo '<font color="red">Please write about above !</font>';  ?>
<!--</p>-->

<div class="table-responsive">
    <div class="text-right">
        <button id="addBlog" class="btn btn-primary mb10" onclick="edit_blog()">Add blog</button>
    </div>
    <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="va-m">Photo</th>
            <th class="va-m">Title</th>
            <th class="va-m">Content</th>
            <th class="va-m">Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach($about as $k=>$v){
                ?>
                <tr>
                    <td>
                        <img style="width: 100px;height: 100px;object-fit: cover;" src="../blog_photo/<?php echo $v["photo"]; ?>" alt="Photo">
                    </td>
                    <td><?php echo $v["title"]; ?></td>
                    <td>
                        <div style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">
                            <?php echo $v["content"]; ?>
                        </div>
                    </td>
                    <td>
                        <a href="javascript:void(0);" onclick="edit_blog('<?php echo $v["id"];  ?>');" title="Edit Blog"><img src="icon/edit.png" width="13" alt="Edit Blog" /></a>
                        <a href="javascript:void(0);" onclick="delete_blog('<?php echo $v["id"];  ?>');" title="Delete"><img src="icon/delete.png" width="19" alt="Delete Blog" /></a>
                    </td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>

</div>


<div class="panel-footer"></div>
</div>
</div>
</section>
</div> 
<!-- ajax div -->

<script src="assets/js/jquery/jquery-1.11.1.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
<script src="assets/js/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/js/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/js/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script src="assets/js/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/pages/tables-data.js"></script>

<?php
require_once("include/footer.php");
}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>
