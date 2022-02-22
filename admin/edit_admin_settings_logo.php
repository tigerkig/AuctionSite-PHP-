<?php
require_once("function.php");
?>
<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update Logo
</span>
</div>
 
<form method="post" action=""   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="field" class="field prepend-icon">
<input type="file" name="login_page_logo" id="image" value="" />
</label>
<img src="assets/img/<?php echo seeMoreDetails("login_page_logo","admin",array());  ?>" width="160" />
</div>


<div class="section">
<div class="pull-right">
<input type="submit" name="update" class="btn  btn-primary"  value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>