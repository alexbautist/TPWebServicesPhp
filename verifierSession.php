<?php
require_once './Config.php';
$loginURL = $gC->createAuthUrl();
if (isset($_SESSION["access_token"])) {
    $email = $_SESSION["email"];
    echo "ok";
} else { $email = "Anonyme";
echo "not ok";
}