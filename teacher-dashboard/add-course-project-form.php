<?php 
include('api.php');
include('check-login.php');
$base_url = $_SESSION['base_url'];
$url_fetch = "add-course-project";
$url = $base_url.$url_fetch;
$token = $_SESSION['token'];

$ch = curl_init();
        $cfile = new CURLFile(
        $_FILES['project_file']['tmp_name'],
        $_FILES['project_file']['type'],
        $_FILES['project_file']['name']
        );

        
        $project_name = $_POST['project_name'];
        $project_long_description = $_POST['project_long_description'];
        $course_id= $_POST['course_id'];
        

        $header = array(
            "Accept: application/json",
            "Authorization: Bearer $token",
            "Content-Type: multipart/form-data",
            "cache-control: no-cache",
        );

 
        $data = array("project_file"=>$cfile,
        "project_long_description"=>$project_long_description,
        "course_id"=>$course_id,
        "project_name"=>$project_name,
       


    );

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        $response = curl_exec($ch);
        $data1 = json_decode($response, true);
        // print_r($data1);
        $status= $data1['status'];
        if($status == "success")
        {

            echo '<script>alert("Project Added SuccessFully");window.location.assign("create-course-7.php?course_id='.$course_id.'")</script>';
            


        }
        else
        {
            echo '<script>alert("Project not Added ");window.location.assign("add-course-project.php?course_id='.$course_id.'")</script>';
        }
        curl_close($ch);

// $url_fetch = "get-section";
// $url = $base_url.$url_fetch;
// $data = api_call_auth("POST", $url, $course_id, )



// print_r($_POST);






?>