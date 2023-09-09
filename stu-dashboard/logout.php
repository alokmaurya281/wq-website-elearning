<?php 

include('check-login.php');
include('api.php');
$base_url = $_SESSION['base_url'];
$url_fetch = "auth/logout";
$url = $base_url.$url_fetch;
$token = $_SESSION['token'];
$new = api_call_auth("POST", $url, "", $token);
echo '<script>alert("SuccessFully Logged Out");window.location.assign("../login.php")</script>';
session_destroy();



?>