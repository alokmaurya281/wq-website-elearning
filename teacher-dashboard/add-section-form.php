<?php 
include('api.php');
include('check-login.php');
$base_url = $_SESSION['base_url'];
$url_fetch = "add-section";
$url = $base_url.$url_fetch;
$course_id  = $_POST['course_id'];
$fields = $_POST;
$token = $_SESSION['token'];
$field = array("course_id"=>$course_id);

$new = api_call_auth("POST", $url, $fields, $token);
if(!$new['section_id']==null){
     $section_id = $new['section_id'];
    $redirect_path = "Location:add-lectures-video.php?course_id=$course_id&section_id=$section_id";
    $redirect = $redirect_path.$course_id;

    // header($redirect_path);
    // $s = "<script>alert('Section Added SuccessFully Now Create Lectures ');window.location.assign('$redirect_path')</script>";
    // echo $s;
    
    // header($redirect_path);
    echo '<script>alert("Section Added SuccessFully Now Create Lectures ");window.location.assign("add-lectures-video.php?course_id='.$course_id.'&section_id='.$section_id.'")</script>';
}
else{
    print_r($new);
}


// $url_fetch = "get-section";
// $url = $base_url.$url_fetch;
// $data = api_call_auth("POST", $url, $course_id, )








?>