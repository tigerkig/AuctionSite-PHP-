<?php
   session_start();
   require_once("function.php");

   $select="apa_id,reserve_price";
   $result=getDetails(doSelect1($select,"ambit_product_add",array("apa_id"=> $_POST['id'])));

   $highest_bid_amount = higest_bid_amount($_POST['id']);
   $query = "SELECT nick_name, name FROM ambit_customer AS a JOIN ambit_product_bid AS b ON a.ac_id = b.cus_id WHERE bid_amount =".$highest_bid_amount." AND b.apa_id=".$_POST['id'];
   $buyer_detail = getDetails(doSelect3($query));
   $data[0] = $buyer_detail[0]["nick_name"];
   $data[2] = $buyer_detail[0]["name"];
   foreach($result as $k=>$v){
      $data[1] = higest_bid($v["apa_id"]);
      $data[3] = $v["reserve_price"];
   }
   $data[4] = $highest_bid_amount;
   echo json_encode($data);
?>
