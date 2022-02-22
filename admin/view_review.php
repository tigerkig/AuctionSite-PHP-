<?php
require_once("function.php");
if(isset($_POST["apr_id"])){

$review=getDetails(doSelect1("apr_id,apr_apa_id,apr_name,comment,rating,date,status","ambit_product_review",$_POST));

foreach($review as $k=>$v){
?>
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel-heading">
<span class="panel-title">
Review &nbsp 
</span>
</div>
<div class="panel">
<div class="panel-body pn" id="ajax_heading">
<font color="blue">Product Name</font><p>
<?php echo getProductName($v["apr_apa_id"]);  ?>
</p>
</div>

<div class="panel-body pn" id="ajax_desc">
<font color="blue">Review By</font><p>
<?php echo ucfirst($v["apr_name"]);  ?>
</p>
</div>
<div class="panel-body pn" id="ajax_desc">
<font color="blue">Rating</font><p>
<?php  echo $v["rating"]; ?>
</p>
</div>
<div class="panel-body pn" id="ajax_desc">
<font color="blue">Comment</font><p>
<?php
echo $v["comment"];
?>
</p>
</div>
<div class="panel-body pn" id="ajax_desc">
<font color="blue">Date</font><p>
<?php  echo date("jS F, Y",strtotime($v["date"])); ?>
</p>
</div>
<a href="review_approve.php">Back</a>

<div class="panel-footer"></div>
</div>
<hr/>
</div>
</section>
<?php
}
}
?>