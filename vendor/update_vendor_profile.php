<script type="text/javascript">
$(document).ready(function() {
  $("#ajax_des").on('submit',(function(e){  
//alert("sidd");
/* var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var fname=$("#fname").val();
var lname=$("#lname").val();
var email=$("#email").val();
var phone=$("#phone").val();
var fax=$("#fax").val();
var company=$("#company").val();
var address_one=$("#address_one").val();
var address_two=$("#address_two").val();
var country=$("#country").val();
var city=$("#city").val();
var post_code=$("#post_code").val();
var password=$("#password").val();
var cpassword=$("#cpassword").val();
if(fname.trim()==""){
  alert("First Name Required");
  $("#fname").focus();
  return false;
}
if(lname.trim()==""){
  alert("Last Name Required");
  $("#lname").focus();
  return false;
}
if(email.trim()==""){
  alert("Email Required");
  $("#email").focus();
  return false;
}
if(!regex.test(email)){
      alert("email invalid");
      $("#email").val("");
      $("#email").focus();
      return false;
    }
if(phone.trim()==""){
  alert("Phone Required");
  $("#phone").focus();
  return false;
}

if(isNaN(phone)){
  alert("Phone Invalid");
    $("#phone").val("");
    $("#phone").focus();
  return false;
}

    if(fax.trim()==""){
  alert("Fax Required");
  $("#fax").focus();
  return false;
}

   if(company.trim()==""){
  alert("Company Required");
  $("#company").focus();
  return false;
}

if(address_one.trim()==""){
  alert("Address Required");
  $("#address_one").focus();
  return false;
}

if(address_two.trim()==""){
  alert("Address Required");
  $("#address_two").focus();
  return false;
}

if(country.trim()=="0"){
  alert("Country Required");
  $("#country").focus();
  return false;
}

if(city.trim()=="0"){
  alert("City Required");
  $("#city").focus();
  return false;
}

if(post_code.trim()==""){
  alert("Post Code Required");
  $("#post_code").focus();
  return false;
}

if(password.trim()==""){
  alert("Password Required");
  $("#password").focus();
  return false;
}

if(cpassword.trim()==""){
  alert("Confirm Password Required");
  $("#cpassword").focus();
  return false;
}

if(password != cpassword){
  alert("Password Mismatch");
  $("#cpassword").val("");
  $("#cpassword").focus();
  return false;
}
*/
$.ajax({
      url: "update_vendor_registration.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      success: function(data)
        {

     // alert(data);
     if(data==1){
        alert("Update Successfull");
        window.location="index.php";
      }
      if(data==0){
        alert("Updation Failed");
      }
        },
        error: function() 
        {
        }         
     });

  }));
      
    });
</script>
<?php
session_start();
require_once("function.php");
$select="vr_id,fname,lname,email,phone,fax,company,address_one,address_two,cn_name,ct_name,post_code,image,status,newsletter,country,city";
$result=getDetails(doSelect1($select,"vendor_registration,ambit_country,ambit_city",array("vr_id"=>$_SESSION["vendor_id"],"cn_id"=>"country","ct_id"=>"city")));
foreach($result as $k2=>$v2){
?>

<section id="content" class="table-layout animated fadeIn">

 
<div class="chute chute-center">
<div class="mw1000 center-block">
 
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="panel-title"><?php echo $lang_127; ?>
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="ajax_des" enctype="multipart/form-data">
 
<div class="row">
<div class="col-md-6">
<div class="section">
<?php echo $lang_111; ?> :
<label class="field">
<input type="text" name="fname" id="fname" class="gui-input" placeholder="<?php echo $lang_111; ?>" value="<?php echo $v2["fname"]; ?>">
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<?php echo $lang_112; ?> :
<label class="field">
<input type="text" name="lname" id="lname" class="gui-input" placeholder="<?php echo $lang_112; ?>" value="<?php echo $v2["lname"]; ?>">
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<?php echo $lang_113; ?> :
<label class="field">
<input type="text" name="email" id="email" class="gui-input" placeholder="<?php echo $lang_113; ?>" value="<?php echo $v2["email"]; ?>">
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<?php echo $lang_133; ?> :
<label class="field">
<input type="text" name="company" id="company" class="gui-input" placeholder="<?php echo $lang_133; ?>" value="<?php echo $v2["company"]; ?>">
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<?php echo $lang_59; ?> :
<label class="field">
<input type="text" name="phone" id="phone" class="gui-input" placeholder="<?php echo $lang_59; ?>" value="<?php echo $v2["phone"]; ?>">
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<?php echo $lang_131; ?> :
<label class="field">
<input type="text" name="fax" id="fax" class="gui-input" placeholder="<?php echo $lang_131; ?>" value="<?php echo $v2["fax"]; ?>">
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="section">
<?php echo $lang_134; ?> :
<label class="field prepend-icon">
<textarea class="gui-textarea" id="address_one" name="address_one" placeholder="<?php echo $lang_134; ?>"><?php echo $v2["address_one"]; ?></textarea>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<?php echo $lang_135; ?> :
<label class="field prepend-icon">
<textarea class="gui-textarea" id="address_two" name="address_two" placeholder="<?php echo $lang_135; ?>"><?php echo $v2["address_two"]; ?></textarea>
<label for="comment" class="field-icon">
<i class="fa fa-list"></i>
</label>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="section">
<?php echo $lang_117; ?> :
<label class="field select">
<select id="country" name="country" onchange="fetch_city();">
<option value=""><?php echo $lang_118; ?></option>
<?php
                        $country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
                        foreach ($country as $k => $v) {
                          # code...
                        ?>
                        <option value="<?php echo $v["cn_id"]; ?>" <?php  if(trim($v2["country"])==$v["cn_id"]){ echo 'selected'; } ?> ><?php echo $v["cn_name"];  ?></option>
                        <?php
                      }
                      ?>
</select>
<i class="arrow double"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<?php echo $lang_136; ?> :
<label class="field select">
<select id="city" name="city">
<option value=""><?php echo $lang_69; ?></option>
<?php
                        $city=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>trim($v2["country"]))));
                        foreach ($city as $k => $v) {
                          # code...
                        ?>
                        <option value="<?php echo $v["ct_id"]; ?>" <?php  if(trim($v2["city"])==$v["ct_id"]){ echo 'selected'; } ?> ><?php echo $v["ct_name"];  ?></option>
                        <?php
                      }
                      ?>
</select>
<i class="arrow double"></i>
</label>
</div>
</div>
</div>
 

<div class="row">
<div class="col-md-6">
<div class="section">
<?php echo $lang_26; ?> :
<label class="field">
<input type="file" name="image" id="image" multiple class="gui-input" >
</label>

</div>
<img src="vendor_image/<?php echo $v2["image"] ?>" width="100px">
</div>
<div class="col-md-6">
<div class="section">
<?php echo $lang_204; ?> :<br/>
<label class="field">
<input type="radio" name="newsletter" id="price" class="gui-radio"  value="0" <?php  if($v2["newsletter"]==0) echo 'checked'; ?> >No
<input type="radio" name="newsletter" id="price" class="gui-radio" value="1" <?php  if($v2["newsletter"]==1) echo 'checked'; ?> >Yes
</label>
</div>
</div>

</div>


<input class="btn btn-default btn-primary" type="submit" name="submit" value="<?php echo $lang_205; ?>" >
</form>
 
</div>
</div>
</div>
</div>
</div>
 
</section>
<?php
}
?>