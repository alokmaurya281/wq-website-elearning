<?php  
// include('api.php');
include('check-login.php');

$base_url = $_SESSION['base_url'];
$url_fetch = "course-aim";
$url = $base_url.$url_fetch;
$fields = array("course_id"=>$_GET['course_id']);

$token = $_SESSION['token'];


$update = api_call_post("POST", $url, $fields,);
$course_aim=$update["Data"][0]['course_aim'];

$status= $update['status'];
        if($status = "success")
        {
           echo $course_aim;
        }
        else
        {
            echo "<script>alert('Please try again');window.location.assign('$redirect');</script>";
        }








?>