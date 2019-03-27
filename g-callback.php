<?php
require_once './Config.php';
if(isset($_SESSION["access_token"])){
$gC->setAccessToken($_SESSION["access_token"]);
}
else if(isset($_GET["code"])){
    $token= $gC->fetchAccessTokenWithAuthCode($_GET["code"]);
    $_SESSION["access_token"] = $token;
}

$oAuth=  new Google_Service_Oauth2($gC);
$user_data= $oAuth->userinfo_v2_me->get();

$_SESSION["email"]=$user_data["email"];
echo $_SESSION["email"];
echo "<pre>";
echo var_dump($user_data);
header("Location:index.php");