<?php  
include('api.php');
include('check-login.php');

$base_url = $_SESSION['base_url'];
$url_fetch = "update-course-deatils-first";
$url = $base_url.$url_fetch;
$fields = $_POST;
$course_id = $_POST['course_id'];
$token = $_SESSION['token'];


$update = api_call_auth("POST", $url, $fields, $token);

$status= $update['status'];
        if($status = "success")
        {
            $message =  $update['message'];
            $redirect_path = "Location:create-course-3.php?course_id=";
            $redirect = $redirect_path.$course_id;

            header($redirect);
        }
        else
        {
            echo "<script>alert('Please try again');window.location.assign('$redirect');</script>";
        }








?>