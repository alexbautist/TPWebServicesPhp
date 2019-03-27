<?php
session_start();
require_once './GoogleAPI/vendor/autoload.php';
$gC= new Google_Client();
$gC->setClientId("1007271659350-9o3432j99du5l8d21hm5n86n6j7uq14s.apps.googleusercontent.com");
$gC->setClientSecret("QuEHUnZKrR2WOIAflLLuKjrk");
$gC->setRedirectUri("http://localhost/WebServicesCalais/g-callback.php");
$gC->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

