<?php 
include('api.php');
include('check-login.php');
$base_url = $_SESSION['base_url'];
$url_fetch = "update-section";
$url = $base_url.$url_fetch;
$section_id  = $_POST['section_id'];
$fields = $_POST;
$token = $_SESSION['token'];
$field = array("section_id"=>$section_id);

$new = api_call_auth("POST", $url, $fields, $token);
if(!$new['section_id']==null){
    echo $section_id = $new['section_id'];
    $redirect_path = "Location:create-course-6.php?course_id=$course_id&section_id=$section_id";
    $redirect = $redirect_path.$course_id;

    header($redirect_path);
}
else{
    print_r($new);
}


// $url_fetch = "get-section";
// $url = $base_url.$url_fetch;
// $data = api_call_auth("POST", $url, $course_id, )








?>