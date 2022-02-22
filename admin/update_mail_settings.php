<?php
   require_once("function.php");
   doUpdate("mail_body_settings",$_POST,array("mbs_id"=>$_POST["mbs_id"]));
   ?>
<section id="content" class="table-layout animated fadeIn">
   <div class="" id="register" role="tabpanel">
      <div class="panel">
         <div class="panel-heading">
            <span class="panel-title">
            Mail Body Structure
            </span>
         </div>
         <div class="panel-body pn" id="a1">
            <font color="blue">Mail Send To Vendor &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('1');"><img src="icon/edit.png" width="12" /></a>
            <p>
               <?php  echo get_mail_settings(1); ?>
            </p>
         </div>
         <div class="panel-body pn" id="a2">
            <font color="blue">Mail Send To Admin &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('2');"><img src="icon/edit.png" width="12" /></a>
            <p>
               <?php  echo get_mail_settings(2); ?>
            </p>
         </div>
         <div class="panel-body pn" id="a3">
            <font color="blue">Mail Send To Buyer &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('3');"><img src="icon/edit.png" width="12" /></a>
            <p>
               <?php  echo get_mail_settings(3); ?>
            </p>
         </div>
         <div class="panel-body pn" id="a4">
            <font color="blue">After Shipping Mail Send To Buyer &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('4');"><img src="icon/edit.png" width="12" /></a>
            <p>
               <?php  echo get_mail_settings(4); ?>
            </p>
         </div>
         <div class="panel-body pn" id="a5">
            <font color="blue">After Shipping Mail Send To Vendor &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('5');"><img src="icon/edit.png" width="12" /></a>
            <p>
               <?php  echo get_mail_settings(5); ?>
            </p>
         </div>
         <div class="panel-body pn" id="a6">
               <font color="blue">After Verification Of The Takeover Of The Product By The Buyer &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('6');"><img src="icon/edit.png" width="12" /></a>
               <p>
                  <?php  echo get_mail_settings(6); ?>
               </p>
            </div
               >
            <div class="panel-body pn" id="a7">
               <font color="blue">After Sending a Request Of The Seller For The Withdrawal Of Money &nbsp </font><a href="javascript:void(0);" title="Edit & Update" onclick="edit_mail_settings('7');"><img src="icon/edit.png" width="12" /></a>
               <p>
                  <?php  echo get_mail_settings(7); ?>
               </p>
            </div>
         <div class="panel-footer"></div>
      </div>
   </div>
</section>