<?php 

include('check-login.php');
include('api.php');
$base_url = $_SESSION['base_url'];
$url_fetch = "change-password";
$url = $base_url.$url_fetch;
$token = $_SESSION['token'];
$fields = $_POST;
$new = api_call_auth("POST", $url, $fields, $token);

if($new['status']=='success'){
    echo '<script>alert("Password Changed SuccessFully Please Login Again.");window.location.assign("../login.php")</script>';
    session_destroy();

}
else{
    echo '<script>alert("Password mismatched , Not changed.");window.location.assign("change-password.php")</script>';

}




// session_destroy();



?>