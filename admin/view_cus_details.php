

<?php
   require_once("function.php");
   if(isset($_POST["ac_id"])){
   
  $details=getDetails(doSelect1("name,email,address,landmark,country,city,phone,post_code,status","ambit_customer",array("ac_id"=>$_POST["ac_id"])));
   
   foreach($details as $k=>$v){
   ?>
<section id="content" class="table-layout animated fadeIn">
   <div class="" id="register" role="tabpanel">
      <div class="panel-heading">
         <span class="panel-title">
         Details &nbsp 
         </span>
      </div>
      <div class="panel">
         <div class="panel-body pn" id="ajax_heading">
            <font color="blue">Name</font>
            <p>
               <?php echo ucfirst($v["name"]);  ?>
            </p>
         </div>
         <div class="panel-body pn" id="ajax_desc">
            <font color="blue">Email</font>
            <p>
               <?php echo $v["email"];  ?>
            </p>
         </div>
         <div class="panel-body pn" id="ajax_desc">
            <font color="blue">Address</font>
            <p>
               <?php  echo $v["address"]; ?>
            </p>
         </div>
         <div class="panel-body pn" id="ajax_desc">
            <font color="blue">Landmark</font>
            <p>
               <?php
                  echo $v["landmark"];
                  ?>
            </p>
         </div>
         <div class="panel-body pn" id="ajax_desc">
            <font color="blue">Country</font>
            <p>
               <?php
                  echo ucfirst($v["country"]);
                  ?>
            </p>
         </div>
         <div class="panel-body pn" id="ajax_desc">
            <font color="blue">City</font>
            <p>
               <?php
                  echo ucfirst($v["city"]);
                  ?>
            </p>
         </div>
         <div class="panel-body pn" id="ajax_desc">
            <font color="blue">Phone</font>
            <p>
               <?php
                  echo $v["phone"];
                  ?>
            </p>
         </div>
         <div class="panel-body pn" id="ajax_desc">
            <font color="blue">Post Code</font>
            <p>
               <?php
                  echo $v["post_code"];
                  ?>
            </p>
         </div>
         <a href="customer_listing.php">Back</a>
         <div class="panel-footer"></div>
      </div>
      <hr/>
   </div>
</section>
<?php
   }
   }
   ?>

