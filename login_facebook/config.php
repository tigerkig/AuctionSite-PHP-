<?php
session_start();

$token="";
##### FB App Configuration #####
//$fbappid = "YourFbAppId"; 
//$fbappsecret = "YourFbSecretKey"; 
$fbappid = "370459317496461"; 
$fbappsecret = "cafd94302369a1dffefe8c98446e4f5c"; 
//$redirectURL = "http://localhost/login_facebook0/authenticate.php"; 
$redirectURL = "https://ouslet.com/login_facebook/authenticate.php"; 
$fbPermissions = ['email']; 

require_once __DIR__ . '/src/Facebook/autoload.php';
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

$facebook = new Facebook(array('app_id' => $fbappid, 'app_secret' => $fbappsecret, 'default_graph_version' => 'v2.10', ));
$helper = $facebook->getRedirectLoginHelper();
##### Check facebook token stored or get new access token #####
try {
	if(isset($_SESSION['fb_token'])){
		$accessToken = $_SESSION['fb_token'];
	}else{
  		$accessToken = $helper->getAccessToken();
	}
} catch(FacebookResponseException $e) {
 	echo 'Facebook Responser error: ' . $e->getMessage();
  	exit;
} catch(FacebookSDKException $e) {
	echo 'Facebook SDK error: ' . $e->getMessage();
  	exit;
}
?>