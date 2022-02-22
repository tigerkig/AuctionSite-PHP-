<?php
require_once("function.php");
$select='id,name,pg_id,status';
$from='payment_gateway';
$where=array("id"=>$_POST["id"]);
$result=getDetails(doSelect1($select,$from,$where));
foreach($result as $k=>$v){
?>

<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Update Account Details
</span>
</div>
 
<form method="post" action=""   enctype="multipart/form-data" >
<div class="panel-body pn">


<div class="section">
Account Name:
<label for="answer" class="field prepend-icon">
<input type="text" name="name" id="" value="<?php echo $v["name"];  ?>" style="margin: 0px; width: 938px;" />
</label>
</div>

<div class="section">
Account Id:
<label for="Price" class="field prepend-icon">
<input type="text" name="pg_id" id="pg_id" value="<?php echo $v["pg_id"];  ?>" style="margin: 0px; width: 938px;" />
</label>
</div>

<div class="section">
Status &nbsp
<label for="Price" class="field prepend-icon">
<input type="radio" name="status" value="0" <?php if($v["status"]==0) echo 'checked';  ?> >InActive &nbsp &nbsp &nbsp
<input type="radio" name="status" value="1"  <?php if($v["status"]==1) echo 'checked';  ?> >Active
</label>
</div>


<input type="hidden" name="id" value="<?php echo $_POST["id"]; ?>">
<br/>
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
<?php
}
?>