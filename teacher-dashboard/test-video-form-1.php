<?php 
include('api.php');
include('check-login.php');
$base_url = $_SESSION['base_url'];
$url_fetch = "setup-video-deatils-add";
$url = $base_url.$url_fetch;

$fields = $_POST;
$token = $_SESSION['token'];


$new = api_call_auth("POST", $url, $fields, $token);
$status= $new['status'];
        if($status = "success")
        {
            $message =  $new['message'];
            $setup_id = $new['setup_id'];
        
            $redirect_path = "Location:create-test-video-2.php?setup_id=";
            $redirect = $redirect_path.$setup_id;

            header($redirect);
        }
        else
        {
            print_r($new);
        }





?>