 <?php
  require_once("function.php");
  if(isset($_GET["cn_id"])){
    $city=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$_GET["cn_id"])));
?>
						
    <option value="0"><?php echo $lang_69;  ?></option>
<?php
      foreach ($city as $k => $v) {
?>
      <option value="<?php echo $v["ct_id"]; ?>"><?php echo $v["ct_name"];  ?></option>
<?php
    }
  }

  if(isset($_GET["cn_name"])){
  	//$country_info = getDetails(doSelect("cn_id,cn_name","ambit_country",array("cn_name"=>$_GET["cn_name"])));
  	$country_info = getDetails(doSelect("cn_id,cn_name","ambit_country",array("cn_id"=>$_GET["cn_name"])));
  	/*if($country_info == NULL){
		$status=doInsert($_GET,"ambit_country");
		$country_info = getDetails(doSelect("cn_id,cn_name","ambit_country",array("cn_name"=>$_GET["cn_name"])));
	}*/
    $city=getDetails(doSelect("ct_id,ct_name","ambit_city",array("ct_cn_id"=>$country_info[0]["cn_id"])));
?>
            
<?php
	if($city != NULL){
		
      	foreach ($city as $k => $v) {
?>
      		<option value="<?php echo $v["ct_name"]; ?>"></option>
<?php
    	}
	}else{
?>
		<option value=""></option>
<?php
	}
  }
?>
					  