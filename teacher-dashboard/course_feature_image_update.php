<?php

include('check-login.php');
function course_image(){


$ch = curl_init();
        $cfile = new CURLFile(
        $_FILES['course_feature_image']['tmp_name'],
        $_FILES['course_feature_image']['type'],
        $_FILES['course_feature_image']['name']
        );
        $course_id = $_POST['course_id'];
        $token = $_SESSION['token'];
        $header = array(
            "Accept: application/json",
            "Authorization: Bearer $token",
            "Content-Type: multipart/form-data",
            "cache-control: no-cache",
        );

 
        $data = array("course_id"=>$course_id,"course_feature_image"=>$cfile);
        // print_r($data);
 
        $url = "http://127.0.0.1:8000/api/v1/update-course-image";
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
            echo  '<div class = "alert alert-success">Detail updated successfully!</div>';
        }
        else
        {
            echo '<div class = "alert alert-danger">Some error occur!'.curl_error($ch).'</div>';
        }
        curl_close($ch);
    }
    $upload = course_image();

?>