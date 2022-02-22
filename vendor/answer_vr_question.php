<script type="text/javascript">
function vendor_qa_update(){
	//alert("sidd");
	var answer=$("#answer").val();
	if(answer.trim()==""){
		var ans_status=0;
	}else{
		var ans_status=1;
	}
	var avqa_id=$("#avqa_id").val();
	$.post(
	"update_vr_qa.php",
	{answer:answer,avqa_id:avqa_id,ans_status:ans_status},
	function(r){
		if(r==1){
			location.reload();
		}else{
		alert("Something Went Wrong !");
	}
	}
	);
}

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
<?php echo $lang_280; ?>
</span>
</div>
<?php
$qa=getDetails(doSelect("avqa_id,ac_id,question,answer,date,ans_status","ambit_vendor_qustn_ans",array("avqa_id"=>$_POST["avqa_id"])));

?>
<form method="post" action="javascript:void(0);" id="ajax_des"   enctype="multipart/form-data" >
<div class="panel-body pn">

<div class="section">
<label for="about" class="field prepend-icon">
<textarea name="question" id="question"  rows="10" cols="30" style="width: 938px; height: 70px;" readonly ><?php echo $qa[0]["question"];  ?></textarea>
</label>
</div>
<div class="section">
<label for="about" class="field prepend-icon">
<textarea name="answer" id="answer"  rows="10" cols="30" style="width: 938px; height: 70px;"  ><?php echo $qa[0]["answer"];  ?></textarea>
</label>
</div>
<input type="hidden" name="avqa_id" id="avqa_id" value="<?php echo $qa[0]["avqa_id"];  ?>">
<div class="section">
<div class="pull-right">
<input type="submit" name="update"  class="btn  btn-primary" onclick="vendor_qa_update();" value="Update" />
</div>
</div>
 
</div>
 
<div class="panel-footer"></div>
</form>
</div>
 
</div>
</section>