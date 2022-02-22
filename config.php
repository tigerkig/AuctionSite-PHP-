<?php
error_reporting(0);
$db_name="iauction435";
// $conn=mysqli_connect("localhost","dbauctionre42","h6NxHZEw+h&8ZUQ?",$db_name);
$conn=mysqli_connect("localhost","root","",$db_name);
mysqli_query($conn,"SET time_zone = '-6:00'");
// $site_url   = "https://www.ouslet.com";
// $admin_url  = "https://www.ouslet.com/admin/";
// $vendor_url = "https://www.ouslet.com/vendor/";
$site_url   = "http://localhost/ouslet/backup_2021_12_6";
$admin_url  = "http://localhost/ouslet/backup_2021_12_6/admin/";
$vendor_url = "http://localhost/ouslet/backup_2021_12_6/vendor/";
 ?>