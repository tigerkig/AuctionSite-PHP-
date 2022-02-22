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
<script>
    function showModal(id) {
        $.post("blog_modal.php",{ id: id },function(r){
            $("#blogModalContent").html(r);
            $("#blogDetail").modal("show");
        });
    }
</script>

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
			<li><a href="blog.php"><?php echo $lang_290;  ?></a></li>
		</ul>
		
		<div class="row">
			<div id="content" class="col-sm-12">
			
				<div class="blog about-demo-1">
                    <h2 class="about-title"><span><?php echo $lang_290;  ?></span></h2>
					<div class="row">
					<?php
					$about = getDetails(doSelect("id,content,title,photo","blog",array()));
					foreach($about as $k=>$v){
					?>
						<div class="col-12 blog-info" onclick="showModal(<?php echo $v["id"]; ?>)">
                            <img src="./blog_photo/<?php echo $v["photo"]; ?>" alt="Blog Photo">
                            <div>
                                <h3><?php echo $v["title"];  ?></h3>
                                <div class="blog-content"><?php echo $v["content"];  ?></div>
                            </div>
						</div>
					<?php
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Main Container -->

    <div class="modal fade" id="blogDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="blogModalContent">

                </div>
            </div>
        </div>
    </div>

<style>
    .blog h2 {
        font-weight: bold;
    }
    .blog-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #dddddd;
        cursor: pointer;
    }
    .blog-info:hover {
        box-shadow: 0 1px 6px 0 rgb(0 0 0 / 20%);
    }
    .blog-info img {
        min-width: 100px;
        height: 100px;
        object-fit: cover;
        margin-left: 10px;
        margin-right: 20px;
    }
    .blog-info h3 {
        font-weight: bold;
    }
    .blog-content {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
    .modal-header {
        border: transparent;
    }

    .blog .row .blog-info div {
        margin-top: 0px;
    }
    .blog .row .blog-info div h3 {
        margin-top: 0px;
    }
</style>
	<!-- Footer Container -->
<?php
    include("include/footer.php");
?>