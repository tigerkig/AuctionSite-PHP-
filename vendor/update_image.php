<?php
require_once("function.php");
doDelete("ambit_product_image",array("api_id"=>$_POST["api_id"]));
?>


<div class="clearfix"></div>
              <?php
              $pro_pic=getDetails(doSelect("api_id,image","ambit_product_image",array("api_apa_id"=>$_POST["id"])));
              foreach ($pro_pic as $k => $v) {
              ?>
             <!--  <img src="properties_photo/<?php //echo $v["app_photo"]; ?>" width="100" /> -->
             <div class="col-md-3">
             <div  style="position: relative;width:200;">

<a href="product_photo/<?php echo $v["image"];  ?>"><img src="product_photo/<?php echo $v["image"];  ?>" height="100px" width="100px"  /></a>
<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["api_id"];?>');" title="Delete"><img src="icon/cross.png" style="position: absolute; top:0; left: 800;height:15px;width:15px;" /></a>
              </div>
              </div>
              <?php
               }
               ?>