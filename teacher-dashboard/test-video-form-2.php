<?php 
include('api.php');
include('check-login.php');
$base_url = $_SESSION['base_url'];
$url_fetch = "upload-setup-video";
$url = $base_url.$url_fetch;

$ch = curl_init();
        $cfile = new CURLFile(
        $_FILES['video']['tmp_name'],
        $_FILES['video']['type'],
        $_FILES['video']['name']
        );
       
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $setup_id= $_POST['setup_id'];
        $teacher_id = $_POST['teacher_id'];
        $token = $_SESSION['token'];
        $header = array(
            "Accept: application/json",
            "Authorization: Bearer $token",
            "Content-Type: multipart/form-data",
            "cache-control: no-cache",
        );

 
        $data = array("title"=>$title,
        "description"=>$description,
        "teacher_id"=>$teacher_id,
        "setup_id"=>$setup_id,
        "video"=>$cfile,
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
        // $status= $data1['status'];
        if($status = "success")
        {
            $message =  $data1['message'];
            $url_fetch = "setup-video-submit-for-review";
            $url = $base_url.$url_fetch;
            $data_new = array(
                'setup_id'=>$setup_id,
                'teacher_id'=>$teacher_id);
            // print_r($data_new);


            $new_update = api_call_auth("POST", $url, $data_new, $token);
            // print_r($new_update);
            echo "<script>alert('Video Uploaded Successfully. Once it is Approved You will get an Email Shortly.');window.location.assign('create-test-video-1.php');</script>";
            // $course_id =  $data1['course_id'];
            // $redirect_path = "Location:create-course-2.php?course_id=";
            // $redirect = $redirect_path.$course_id;

            // header($redirect);
        }
        else
        {
            echo "<script>alert('Video not Uploaded Successfully. .');window.location.assign('create-test-video-2.php');</script>";
        }
        curl_close($ch);
    




// $new = api_call_auth("POST", $url, $fields, $token);
// $status= $new['status'];
//         if($status = "success")
//         {
//             $message =  $new['message'];
//             $setup_id = $new['setup_id'];
        
//             $redirect_path = "Location:create-test-video-2.php?setup_id=";
//             $redirect = $redirect_path.$setup_id;

//             header($redirect);
//         }
//         else
//         {
//             print_r($new);
//         }





?>