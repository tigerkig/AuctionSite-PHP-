<?php
require_once("function.php");
doUpdate("site_settings",$_POST,array("st_id"=>$_POST["st_id"]));
?>
<section id="content" class="table-layout animated fadeIn">
<div class="" id="register" role="tabpanel">
<div class="panel">
<div class="panel-heading">
<span class="panel-title">
Site Settings
</span>
</div>
<div class="panel-body pn" id="a14">
<font color="blue">Title &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('14');"><img src="icon/edit.png" width="12" /></a><p>
<?php  echo get_site_settings(14); ?>
</p>
</div>

<div class="panel-body pn" id="a25">
<font color="blue">Site Name &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('25');"><img src="icon/edit.png" width="12" /></a><p>
<?php  echo get_site_settings(25); ?>
</p>
</div>

<div class="panel-body pn" id="a34">
<font color="blue">Footer Text &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('34');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(34); ?>
</p>
</div>

<div class="panel-body pn" id="a18">
<font color="blue">Default Country &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings_country('18');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  $id=get_site_settings(18); echo ucfirst(seeMoreDetails("cn_name","ambit_country",array("cn_id"=>$id))); ?>
</p>
</div>

<div class="panel-body pn" id="a19">
<font color="blue">Currency &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('19');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(19); ?>
</p>
</div>
<div class="panel-body pn" id="a20">
<font color="blue">Currency Sign &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('20');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(20); ?>
</p>
</div>
<div class="panel-body pn" id="a29">
<font color="blue">Withdraw Limit &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('29');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(29); ?>
</p>
</div>
<div class="panel-body pn" id="a30">
<font color="blue">Commision &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_commision_settings('30');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  
$val=get_site_settings(30); 
$val=explode("||",$val);
echo 'Minimum Price :'.currency().$val[0].'<br/>';
echo 'Otherwise Percentage :'.$val[1].'%';
?>
</p>
</div>
<div class="panel-body pn" id="a15">
<font color="blue">Meta Keyword &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('15');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(15); ?>
</p>
</div>

<div class="panel-body pn" id="a16">
<font color="blue">Meta Description &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('16');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(16); ?>
</p>
</div>

<div class="panel-body pn" id="a24">
<font color="blue">Working Hours &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('24');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(24); ?>
</p>
</div>

<div class="panel-body pn" id="a31">
<font color="blue">Facebook Account &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('31');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(31); ?>
</p>
</div>
<div class="panel-body pn" id="a32">
<font color="blue">Twitter Account &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('32');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(32); ?>
</p>
</div>
<div class="panel-body pn" id="a33">
<font color="blue">Youtube Account &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings('33');"><img src="icon/edit.png" width="12" /></a>
<p>
<?php  echo get_site_settings(33); ?>
</p>
</div>


<div class="panel-body pn" id="a17">
<font color="blue">Logo &nbsp</font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_site_settings_logo('17');"><img src="icon/edit.png" width="12" /></a>
<p>
<img src="../sitelogo//<?php  echo get_site_settings(17); ?>" width="130" />
</p>
</div>


<div class="panel-footer"></div>
</div>
</div>
</section>