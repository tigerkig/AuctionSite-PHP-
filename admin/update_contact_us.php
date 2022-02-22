<?php
require_once("function.php");
if(isset($_POST["id"])){
doUpdate1("ambit_contact_us",$_POST,array("id"=>$_POST["id"]));
}
?>
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<?php
$contact_details=getDetails(doselect1("*","ambit_contact_us",array()));
?>
<span class="panel-title">
Contact Us &nbsp <?php if(!empty($contact_details)) { ?> <a href="javascript:void(0);" title="Edit & Update" onclick="edit_contact('<?php echo $contact_details[0]["id"];  ?>');"><img src="icon/edit.png" width="15" /></a><?php } ?>
</span>
</div>
<div class="panel-body pn">
<font color="blue">ADDRESS: </font><p>
<?php echo $contact_details[0]["address"];  ?>
</p>
</div>

<div class="panel-body pn">
<font color="blue">PHONE: </font><p>
<?php echo $contact_details[0]["phone"];  ?>
</p>
</div>


<div class="panel-body pn">
<font color="blue">EMAIL: </font>
<p>
<?php echo $contact_details[0]["email"];  ?>
</p>
</div>


<div class="panel-footer"></div>
</div>
</div>
</section>