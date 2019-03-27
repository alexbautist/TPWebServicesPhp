<?php
require_once "config.php";
unset($_SESSION["access_token"]);
$gC->revokeToken();
session_destroy();
header("Location:index.php");