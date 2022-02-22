<?php
 require_once("function.php");
 if(isset($_GET["pc_id"])){
 $sub_cat=getDetails(doSelect("psc_id,psc_name","product_sub_category",array("psc_pc_id"=>$_GET["pc_id"])));
						?>
						
            <option value="0">Select Sub Category</option>
						<?php

                        foreach ($sub_cat as $k => $v) {
                        
                         ?>
                        <option value="<?php echo $v["psc_id"]; ?>"><?php echo $v["psc_name"];  ?></option>
                        <?php
                      }
}

if(isset($_GET["psc_id"])){
 $sub_sub_cat=getDetails(doSelect("pssc_id,pssc_name","product_sub_sub_cat",array("pssc_psc_id"=>$_GET["psc_id"])));
						?>
						
            <option value="0">Select Sub sub Category</option>
						<?php

                        foreach ($sub_sub_cat as $k => $v) {
                        
                         ?>
                        <option value="<?php echo $v["pssc_id"]; ?>"><?php echo $v["pssc_name"];  ?></option>
                        <?php
                      }
}

?>