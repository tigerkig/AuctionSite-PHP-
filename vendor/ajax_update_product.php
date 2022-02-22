<?php
session_start();
require_once ("function.php");
$package_id = seeMoreDetails("abp_p_id", "ambit_buy_package", array(
    "abp_u_id" => $_SESSION["vendor_id"]
));
if (trim($package_id) == "")
{
    $package_id = 1;
}

$package_details = getDetails(doSelect("no_of_product, no_of_image, no_of_featured", "ambit_package_description", array(
    "package_id" => $package_id
)));
$post_product_limit = $package_details[0]['no_of_product'];
$product_photo_limit = $package_details[0]['no_of_image'];
$featured_product_limit = $package_details[0]['no_of_featured'];

if ($post_product_limit != - 1)
{
    $total_post_product = seeMoreDetails("COUNT(*)", "ambit_product_add", array(
        "apa_vr_id" => $_SESSION["vendor_id"]
    ));
    $post_product_limit = $post_product_limit - $total_post_product;
}
if ($featured_product_limit != - 1)
{
    $total_featured_product = seeMoreDetails("COUNT(*)", "ambit_product_add", array(
        "apa_vr_id" => $_SESSION["vendor_id"],
        "keep_in" => 1
    ));
    $featured_product_limit = $featured_product_limit - $total_featured_product;
}

if ($post_product_limit == - 1 || $post_product_limit > 0)
{
    if ($featured_product_limit == - 1 || $featured_product_limit > 0)
    {
        $features = "";
        if (!empty($_POST["features_heading"]))
        {
            foreach ($_POST["features_heading"] as $k => $v)
            {
                if ($k != 0)
                {
                    $features .= "||";
                }
                if (trim($v) != "")
                {
                    $features .= $v . ':' . $_POST["features_desc"][$k];
                }
            }
        }

        $weight = "";
        if (!empty($_POST["weight"]))
        {
            foreach ($_POST["weight"] as $k => $v)
            {
                if ($k != 0)
                {
                    $weight .= "||";
                }
                if (trim($v) != "")
                {
                    $weight .= $v . ':' . $_POST["weight_unit"][$k];
                }
            }
        }

        $color = "";
        if (!empty($_POST["color"]))
        {
            foreach ($_POST["color"] as $k => $v)
            {
                if ($k != 0)
                {
                    $color .= "||";
                }
                $color .= $v;
            }
        }

        $size = "";
        if (!empty($_POST["size"]))
        {
            foreach ($_POST["size"] as $k => $v)
            {
                if ($k != 0)
                {
                    $size .= "||";
                }
                if (trim($v) != "")
                {
                    $size .= $v . ':' . $_POST["size_unit"][$k];
                }
            }
        }

        $price="";
		if(!empty($_POST["price"])){
			$temp = $_POST["price"];
			$temp0 = $_POST["price"][0];
			$temp1 = $_POST["price"][1];
			$temp2 = $_POST["price"][2];
			$temp3 = $_POST["price"][3];
			
			$tax =(floatval($temp0) - floatval($temp2)) * 0.1025;			
			
			$_POST["price"][1] = round($tax, 2);
		
			
			$price = $_POST["price"][0]."||".$_POST["price"][1]."||".$_POST["price"][2]."||".$_POST["price"][3];
		}
		
		
		$selling_price= round((float)($temp0) + (float)($tax) - (float)($temp2), 2);
		
		
		date_default_timezone_set("America/Chicago");
		$posting_date = date("Y-m-d H:i:s");
		

        $field = array(
            'name' => $_POST["name"],
            "category" => $_POST["category"],
            "sub_cat" => $_POST["sub_cat"],
            "sub_sub_cat" => $_POST["sub_sub_cat"],
            "description" => $_POST["description"],
            "features" => $features,
            "weight" => $weight,
            "color" => $color,
            "size" => $size,
            "price" => $price,
            "brand" => $_POST["brand"],
            "apa_vr_id" => $_SESSION["vendor_id"],
            "stock" => $_POST["stock"],
            "video" => $_POST["video"],
            "status" => 1,
            "keep_in" => $_POST["keep_in"],
            "selling_price" => $selling_price,
            "posting_type" => $_POST["posting_type"],
            "reserve_price" => $_POST["reserve_price"],
            "listing_duration" => $_POST["listing_duration"],
            "listing_start" => $_POST["listing_start"],
            "currency" => $_POST["currency"],
            "posting_date" => $posting_date,
			"new_flag"      	=>	$_POST["new_flag"],
			"warranty_flag"     =>	$_POST["warranty_flag"],
			"warranty_long"     =>	$_POST["warranty_long"],
			"original_flag"     =>	$_POST["original_flag"],
			"auth_flag"  	    =>	$_POST["auth_flag"],
            "time_sort" => $posting_date
        );
       
        $status = doUpdate("ambit_product_add", $field, array(
            "apa_id" => $_GET["id"]
        ));
        doUpdate("ambit_product_image", array(
            "status" => 0
        ) , array(
            "api_apa_id" => $_GET["id"]
        ));
        if ($status)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }

        if ($product_photo_limit != - 1)
        {
            $photo_count = seeMoreDetails("COUNT(*)", "ambit_product_image", array(
                "api_apa_id" => $_GET["id"]
            ));

            $product_photo_limit = $product_photo_limit - $photo_count;
            //echo 'a='.$post_property_photo.'aaaa';
            
        }

        if ($product_photo_limit == - 1 || $product_photo_limit >= 0)
        {
            if (isset($_FILES))
            {
                // print_r($_FILES);
                foreach ($_FILES["image"]["name"] as $k => $v)
                {
                    $check = $k + 1;
                    if ($product_photo_limit != - 1)
                    {
                        if ($product_photo_limit < $check)
                        {
                            echo '||4';
                            break;

                        }
                    }
                    $img_name = time() . $_FILES["image"]["name"][$k];
                    $img_tmp_name = $_FILES["image"]["tmp_name"][$k];
                    $chk = move_uploaded_file($img_tmp_name, 'product_photo/' . $img_name);
                    if ($chk)
                    {
                        doInsert(array(
                            "image" => $img_name,
                            "api_apa_id" => $_GET["id"]
                        ) , "ambit_product_image");
                    }                  
                }
            }
        }
    }
    else
    {
        echo 3;
    }
}
else
{
    echo 2;
}

?>
