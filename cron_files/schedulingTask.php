<?php
$db_name="iauction435";
$conn=mysqli_connect("localhost","dbauctionre42","h6NxHZEw+h&8ZUQ?",$db_name);

function doSelect($select,$table,$condition=array(),$orderBy=""){
	global $conn;
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,$k."='".mysqli_real_escape_string($conn,$v)."'");	
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="SELECT ".$select." FROM ".$table.$where.$orderBy;
	//echo $query;
	return mysqli_query($conn,$query);
}
function doSelect1($select,$table,$condition=array(),$orderBy=""){
	global $conn;
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,$k."=".mysqli_real_escape_string($conn,$v)."");	
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="SELECT ".$select." FROM ".$table.$where.$orderBy;
	//echo $query;
	return mysqli_query($conn,$query);
}
function doSelect2($select,$table,$condition=array(),$orderBy=""){
	global $conn;
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,$k."=".mysqli_real_escape_string($conn,$v)."");	
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="SELECT ".$select." FROM ".$table.$where.$orderBy;
	// echo $query;
	//return mysql_query($query);
	return $query;
}
function doSelect3($query){
	global $conn;
	return mysqli_query($conn,$query);
}


function getDetails($query){

	$dbdata=array();
	if($query){
		$rows=mysqli_num_rows($query);
		if($rows >= 1){
			while($data=mysqli_fetch_assoc($query)){
				array_push($dbdata, $data);
			}
		}
	}
	return $dbdata;
}

function doUpdate($table,$field=array(),$condition=array()){
	global $conn;
	$dbdata=array();
	$set=" SET ";
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($field)){
		foreach($field as $k=>$v){
			array_push($dbdata,"`".$k."`='".mysqli_real_escape_string($conn,$v)."'");
		}
	$set.=implode(",",$dbdata);
	}
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,"`".$k."`='".mysqli_real_escape_string($conn,$v)."'");	
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="UPDATE ".$table.$set.$where;
	//echo $query;
	return mysqli_query($conn,$query);
}


function doDelete($table,$condition=array()){
	global $conn;
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,"`".$k."`='".mysqli_real_escape_string($conn,$v)."'");	
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="DELETE FROM ".$table.$where;
	//echo $query;
	return mysqli_query($conn,$query);
}

function get_site_settings($id=""){
	$result=getDetails(doSelect1("st_value","site_settings",array("st_id"=>$id)));
	return $result[0]["st_value"];
}


function seeMoreDetails($select,$from,$where){
	$result=getDetails(doSelect1($select,$from,$where));
	if(!empty($result)){
		return $result[0][$select];
	}
}

function getCustomerName($id){
	$name=getDetails(doSelect1("name","ambit_customer",array("ac_id"=>$id)));
	$name=$name[0]["name"];
	return $name;
}

function getCustomerEmail($id){
	$email=getDetails(doSelect1("email","ambit_customer",array("ac_id"=>$id)));
	$email=$email[0]["email"];
	return $email;
}

function currency_amount_to_unit1($currency,$price){
	$currency=trim($currency);
	$price=trim($price);
	$prev_price=trim(seeMoreDetails("unit_price","ambit_currency",array("acu_id"=>$currency)));
	
	//$con_price=trim(seeMoreDetails("unit_price","ambit_currency",array("unit_price"=>1)));	
	$con_price=trim(seeMoreDetails("unit_price","ambit_currency",array("acu_id"=>1)));	
	
	$cal=($con_price/$prev_price)*$price;
	return $cal;
}

function diff_date($date1,$date2){
$now =strtotime($date1);
$date =strtotime($date2);
$datediff = $now - $date;
$day=floor($datediff / (60 * 60 * 24));
return $day;
}

function addDaysWithDate($date,$days){
    $date = strtotime("+".$days." days", strtotime($date));
    return  date("Y-m-d", $date);
}






date_default_timezone_set("America/Chicago");
$curdatetime = date("Y-m-d H:i:s");

  $select = "apa_id,apa_vr_id,name,category,sub_cat,sub_sub_cat,features,description,weight,color,brand,size,currency,price,reserve_price, selling_price,status,stock,posting_type,listing_duration, posting_date, view_count";
	$query = doSelect2($select, "ambit_product_add");
	// $query = doSelect2($select, "ambit_product_add");
	// $query .= " AND CONCAT(listing_duration, ' ',TIME(posting_date)) <='".$curdatetime."' and status = 1 and posting_type =1 ORDER BY apa_id DESC";
	$query .= " AND listing_duration <= '".$curdatetime."' and status = 1 and posting_type =1 ORDER BY apa_id DESC";
   $suspend_auction = getDetails(doSelect3($query));

/* echo '<pre>';
print_r($suspend_auction); */
foreach($suspend_auction as $k=>$v){
	$highest_bid=trim(seeMoreDetails('MAX(bid_amount)','ambit_product_bid',array("apa_id"=>$v["apa_id"],"auction_status"=>1)));
	if($highest_bid==''){
		$highest_bid=0;
	}
	// echo $highest_bid;300.00 400.00 50.00 80.00 3.50

      
	$reserve_price=currency_amount_to_unit1($v["currency"],$v["reserve_price"]);
	if($highest_bid != 0 && $highest_bid >= $reserve_price){
		$won_cus_id=trim(seeMoreDetails('cus_id','ambit_product_bid',array("bid_amount"=>$highest_bid,"apa_id"=>$v["apa_id"],"auction_status"=>1)));

		$looser_cus_id=getDetails(doSelect('cus_id','ambit_product_bid',array("apa_id"=>$v["apa_id"],"cus_id !"=>$won_cus_id,"auction_status"=>1),' GROUP BY cus_id'));
		
		//doUpdate('ambit_product_bid',array("status"=>1),array("apa_id"=>$v["apa_id"],"bid_amount"=>$highest_bid,'cus_id'=>$won_cus_id,"auction_status"=>1));
		doUpdate('ambit_product_bid',	array("status"=>1, "auction_status"=>0),	array("apa_id"=>$v["apa_id"],	"bid_amount"=>$highest_bid,	'cus_id'=>$won_cus_id,	"auction_status"=>1));
		doUpdate('ambit_product_add',array("status"=>0, "stock" => 0),array("apa_id"=>$v["apa_id"]));
		//doUpdate('ambit_product_bid',array("auction_status"=>0),array("apa_id"=>$v["apa_id"],"auction_status"=>1));
		
		foreach($looser_cus_id as $k1=>$v1){
			doUpdate('ambit_product_add',array("status"=>0, "stock" => 0),array("apa_id"=>$v["apa_id"]));
			$to =getCustomerEmail($v1["cus_id"]);
			$subject = "Auction Notification";
			//$txt = "Sorry!. You have lose this auction. <a href='".$_SERVER["HTTP_HOST"]."/product.php?id=".$v["apa_id"]."'>Click Here</a>";
			$txt = "Sorry!. You lose the auction.";
			$headers = "From: ".get_site_settings(23). "\r\n" ."CC: ".$to;
			mail('tigerkig714@outlook.com',$subject,$txt,$headers);
		}
		
			$to =getCustomerEmail($won_cus_id);
			$subject = "Auction Notification";
			//$txt = "Sorry!. You have Wone this auction. <a href='".$_SERVER["HTTP_HOST"]."/product.php?id=".$v["apa_id"]."'>Click Here</a>";
			$txt = "You Won the auction! \n Congratulations";
			$headers = "From: ".get_site_settings(23). "\r\n" ."CC: ".$to;
			mail('tigerkig714@outlook.com',$subject,$txt,$headers);
				
	}else{
		//FOR RENEW
		$posting_date=date('Y-m-d',strtotime($v["posting_date"]));
		$renew_day=diff_date($v["listing_duration"],$posting_date);
		$renew_date=addDaysWithDate($v["listing_duration"],$renew_day);

		//echo $renew_date;
		//doUpdate('ambit_product_add',array("listing_duration"=>$renew_date),array("apa_id"=>$v["apa_id"]));
		doUpdate('ambit_product_add',array("status"=>0),array("apa_id"=>$v["apa_id"]));
		
		$looser_cus_id=getDetails(doSelect('cus_id','ambit_product_bid',array("apa_id"=>$v["apa_id"]),' GROUP BY cus_id'));
		foreach($looser_cus_id as $k1=>$v1){
			
				$to =getCustomerEmail($v1["cus_id"]);
				$subject = "Auction Notification";
				$txt = "Sorry!. You have lose this auction. <a href='".$_SERVER["HTTP_HOST"]."/product.php?id=".$v["apa_id"]."'>Click Here</a>";
				$headers = "From: ".get_site_settings(23). "\r\n" ."CC: ".$to;
				mail('tigerkig714@outlook.com',$subject,$txt,$headers);
		}
	}
}

//$auction_buy_product = getDetails(doSelect("abpa_id, bid_id, payment_method, TIME_TO_SEC(TIMEDIFF(NOW(), date)) as diff_time", "ambit_buy_product_auction", array("payment_method" => 1, "status" => 1)));

//$shipment_auction_list = getDetails(doSelect("ass_apa_id, ass_ac_id,ass_vr_id,quantity, shipment_status, order_id, payment_status, TIME_TO_SEC(TIMEDIFF(NOW(), date)) as diff_time", "ambit_shipment_status_auction", array("payment_status" => 0, "cancel_status" => 0)));
$shipment_auction_list = getDetails(doSelect("ass_apa_id, ass_ac_id,ass_vr_id,quantity, shipment_status, order_id, payment_status, TIME_TO_SEC(TIMEDIFF('".$curdatetime."', date)) as diff_time", "ambit_shipment_status", array("payment_status" => 0, "cancel_status" => 0, "auction_flag" => 1)));

foreach($shipment_auction_list as $k => $v){
	if($v["diff_time"]  >= 3600){
		$productDetails=getDetails(doSelect1("stock","ambit_product_add",array("apa_id"=>$v["ass_apa_id"])));
		$current_stock = $productDetails[0]['stock'];
		$quantity = $v['quantity'];
		$new_stock = $current_stock + $quantity;
		
		doUpdate('ambit_product_add', array("posting_type" => 1, "stock" => $new_stock), array("apa_id" => $v["ass_apa_id"]));
		//doDelete("ambit_shipment_status_auction", array("ass_apa_id" => $v["ass_apa_id"]));
		doDelete("ambit_shipment_status", array("ass_apa_id" => $v["ass_apa_id"], "auction_flag" => 1));
		
		//mail send to Admin
		$from=get_site_settings(23);
		$to =get_site_settings(23);

		$subject  = "Confirmation Message";
		$customer = getCustomerName($v["ass_ac_id"]);
		$string   = "Customer ".$customer." didn't pay for the won auction.";
		
		//$product =getCustomerName($_v["ass_ac_id"]);	
		
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail('tigerkig714@outlook.com',$subject,$string,$headers);
	}
}

// won auction -> don't pay in 1hour
$purchase_status_list = getDetails(doSelect3("SELECT id, apa_id, cus_id, bid_amount FROM ambit_product_bid WHERE STATUS = 1 AND auction_status = 0 AND purchase_status = 0;"));
foreach($purchase_status_list as $k => $bid_list){
	// $pasting_time = getDetails(doSelect3("SELECT TIME_TO_SEC(TIMEDIFF(NOW(),CONCAT(listing_duration, ' ', TIME(posting_date)))) as diff_time FROM ambit_product_add WHERE apa_id=".$bid_list["apa_id"]));
	$pasting_time = getDetails(doSelect3("SELECT TIME_TO_SEC(TIMEDIFF(NOW(),listing_duration)) as diff_time FROM ambit_product_add WHERE apa_id=".$bid_list["apa_id"]));

	$diff_time = $pasting_time[0]["diff_time"];
	if($diff_time  >= 3600){
		doDelete("ambit_product_bid", array("id" => $bid_list["id"]));
		doUpdate('ambit_product_add',array("status"=>1, "posting_type" => 1, "stock" => 1, "listing_duration" => $curdatetime, "posting_date" => $curdatetime ),array("apa_id"=>$bid_list["apa_id"]));

		
		//mail send to Admin
		$from	=	get_site_settings(23);
		//$to 	=	get_site_settings(23);
		$to		=	$from;

		$subject  = "Confirmation Message";
		
		$buyer_info = getDetails(doSelect("name, email", "ambit_customer", array("ac_id" => $bid_list["cus_id"])));
		
		$string   = "Hello, Admin. The buyer(".$buyer_info[0]["name"]." - ".$buyer_info[0]["email"].") didn't pay the product won in the auction.";
		
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail('tigerkig714@outlook.com',$subject,$string,$headers);
	}
	
}


$sql = "select a.apa_id, a.posting_type, b.date, TIME_TO_SEC(TIMEDIFF('".$curdatetime."', date)) as diff_time, b.ass_ac_id, b.payment_status from ambit_product_add as a ";
$sql .= "join ambit_shipment_status as b ";
$sql .= "On a.apa_id = b.ass_apa_id ";
$sql .= "where a.listing_duration != '0000-00-00' and b.shipment_status = 1 and b.payment_status = 0 and cancel_status = 0";
// echo $sql;
$shipment_list = getDetails(doSelect3($sql));

foreach($shipment_list as $k => $v){
	if($v["diff_time"]  >= 3600){
		$productDetails=getDetails(doSelect1("stock","ambit_product_add",array("apa_id"=>$v["apa_id"])));
		$current_stock = $productDetails[0]['stock'];
		$quantity = $v['quantity'];
		$new_stock = $current_stock + $quantity;
		
		doUpdate('ambit_product_add', array("posting_type" => 1,"stock" => $new_stock), array("apa_id" => $v["apa_id"]));
		doDelete("ambit_shipment_status", array("ass_apa_id" => $v["apa_id"]));
		//doDelete("ambit_buy_product", array("ass_apa_id" => $v["ass_apa_id"]));
		
		//mail send to Admin
		$from=get_site_settings(23);
		$to =get_site_settings(23);

		$subject = "Confirmation Message";
		$customer = getCustomerName($v["ass_ac_id"]);
		$string   = "Customer ".$customer." didn't pay for the won auction.";
		
		
		$headers = "From: ".$from. "\r\n" ."CC: ".$to;
		mail('tigerkig714@outlook.com',$subject,$string,$headers);
	}
}

?>