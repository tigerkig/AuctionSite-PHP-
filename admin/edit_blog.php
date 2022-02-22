<script type="text/javascript">
$(document).ready(function() {
    $("#photo").change(function (e) {
        if (this.files && this.files[0]) {
            $('#photoPreview').css('display', 'block');
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photoPreview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    })

    $("#ajax_des").on('submit',(function(e){
        const photo = $("#photo").get(0).files;
        const title = $("#title").val();
        const content = $("#about").val();
        const id = $("#id").val();
        if ((photo.length > 0 || id != "" ) && title && content) {
            $.ajax({
                url: "update_blog.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    //alert(data);
                    if(data == 1){
                        window.location = "blog.php";
                    }
                    if(data == 0){
                        alert("Something Went Wrong !");
                    }
                },
                error: function()
                {
                }
            });
        } else {
            alert("Insert fields!")
        }
    }));
});
</script>

<?php
require_once("function.php");
?>

<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update How It Works
</span>
</div>
<?php
$about=getDetails(doselect1("content,id,photo,title","blog",array("id"=>$_POST["id"])));
?>
<form method="post" action="javascript:void(0);" id="ajax_des" enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="photo">Photo:</label>
<br />
<?php
    if (isset($about[0]["photo"])) {
        ?>
        <img src="../blog_photo/<?php echo $about[0]["photo"]; ?>" alt="Photo" id="photoPreview" class="h-100 mb10">
<?php
    } else {
        ?>
        <img src="" alt="Photo" id="photoPreview" class="h-100 mb10" style="display: none;">
    <?php
    }
?>
<input class="mb10" id="photo" type="file" name="photo" accept="image/*">
<label for="title" class="mb10" style="width: 100%;">
    Title:
    <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="<?php echo $about[0]["title"];?>">
</label>
<label for="about" class="field prepend-icon" style="width: 100%;">
    Content:
    <textarea name="content"  class="form-control" id="about" placeholder="Update Blog.........." rows="10" cols="100" style="width: 100%; height: 247px;"><?php echo $about[0]["content"];  ?></textarea>
</label>
</div>
<input type="hidden" name="id" id="id" value="<?php echo $about[0]["id"];  ?>">
<div class="section">
<div class="pull-right">
<input type="submit" name="update"  class="btn  btn-primary" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>