<?php  
include('api.php');
include('check-login.php');

$base_url = $_SESSION['base_url'];
$url_fetch = "create-course";
$url = $base_url.$url_fetch;


$ch = curl_init();
        $cfile = new CURLFile(
        $_FILES['course_feature_image']['tmp_name'],
        $_FILES['course_feature_image']['type'],
        $_FILES['course_feature_image']['name']
        );
       
        $teacher_id = $_POST['teacher_id'];
        $course_name = $_POST['course_name'];
        $course_language = $_POST['course_language'];
        $course_short_description= $_POST['course_short_description'];
        $course_long_description = $_POST['course_long_description'];
        $course_price = $_POST['course_price'];
        $category_id = $_POST['category_id'];
        $token = $_SESSION['token'];
        $header = array(
            "Accept: application/json",
            "Authorization: Bearer $token",
            "Content-Type: multipart/form-data",
            "cache-control: no-cache",
        );

 
        $data = array("course_name"=>$course_name,
        "course_language"=>$course_language,
        "teacher_id"=>$teacher_id,
        "course_feature_image"=>$cfile,
        "course_short_description"=>$course_short_description,
        "course_long_description"=>$course_long_description,
        "course_price"=>$course_price,
        "category_id"=>$category_id,
    );
        // print_r($data);
 
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        $response = curl_exec($ch);
        $data1 = json_decode($response, true);
        // print_r($data1);
        $status= $data1['status'];
        if($status = "success")
        {
            $message =  $data1['message'];
            $course_id =  $data1['course_id'];
            $redirect_path = "Location:create-course-2.php?course_id=";
            $redirect = $redirect_path.$course_id;

            header($redirect);
        }
        else
        {
            print_r($data1);
        }
        curl_close($ch);
    
    




?>