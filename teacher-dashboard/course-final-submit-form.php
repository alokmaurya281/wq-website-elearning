<?php

include('api.php');
include('check-login.php');

$token = $_SESSION['token'];
$base_url = $_SESSION['base_url'];
$fetch_url = "course-final-submit";
$url = $base_url.$fetch_url;
$course_id = $_POST['course_id'];
$data = api_call_auth("POST", $url , $_POST, $token);
// print_r($data);
if($data['status']=="success"){
    echo '<script>alert("Course Submitted For review SuccessFully. you will get an Email shortly");window.location.assign("index.php")</script>';
}


?>