<?php
require_once("function.php");
doUpdate1("ambit_faq",$_POST,array("id"=>$_POST["id"]));
?>
<section id="content" class="table-layout animated fadeIn">
 
<!-- <div class="chute chute-center"> -->
  
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Add FAQ
</span>
</div>
 
<form method="post" action=""   enctype="multipart/form-data" onsubmit="return validation();">
<div class="panel-body pn">

<div class="section">
<!-- <label for="question" class="field prepend-icon"> -->
<textarea class="form-control" name="question" id="question" placeholder="Write Question.........." rows="2" cols="100"></textarea>
<br/>
<!-- </label> -->
</div>

<div class="section">
<!-- <label for="answer" class="field prepend-icon"> -->
<textarea class="form-control" name="answer" id="answer" placeholder="Write Answer.........." rows="5" cols="100"></textarea>
<br/>
<!-- </label> -->
</div>


<div class="section">
<div class="pull-right">
<input type="submit" name="submit" class="btn  btn-primary" value="Submit" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>
<?php
if(isset($_POST["submit"])){
unset($_POST["submit"]);
doInsert($_POST,"ambit_faq");
echo '<script>alert("FAQ added Successfully");window.location="add_faq.php";</script>';
}
?>


<div id="ajax">
<section id="content" class="animated fadeIn">
<div class="mt40">
<h5 class="text-muted mb20 mtn"> FAQ </h5>
<div class="panel-group accordion" id="accordion1">
<?php
$faq=getDetails(doSelect1("id,question,answer","ambit_faq",array()));
if(!empty($faq)){
foreach($faq as $k=>$v){
?>


<div class="panel" >
<div class="panel-heading" >
<a class="accordion-toggle accordion-icon link-unstyled collapsed" style="background-color:#C0C0C0;" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_<?php echo $v["id"]; ?>">
<?php echo $v["question"]; ?>
</a>
<img src="icon/delete.png" title="Delete" style="cursor:pointer" onclick="delete_faq('<?php echo $v["id"]; ?>')" width="25" />
<img src="icon/edit.png" title="Edit" style="cursor:pointer" onclick="edit_faq('<?php echo $v["id"]; ?>')" width="15" />
</div>
<div id="accordion1_<?php echo $v["id"]; ?>" class="panel-collapse collapse" style="height: 0px;">
<div class="panel-body">
<?php
echo $v["answer"];
?>
</div>
</div>
</div>
<?php
}
}else{
	echo '<font color="red">Please add FAQ</font>';
}
?>
</div>
</div>
</section>
</div>