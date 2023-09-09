<?php 
include('api.php');
include('check-login.php');
$base_url = $_SESSION['base_url'];
$url_fetch = "add-course-lecture";
$url = $base_url.$url_fetch;

$ch = curl_init();
        $cfile = new CURLFile(
        $_FILES['video']['tmp_name'],
        $_FILES['video']['type'],
        $_FILES['video']['name']
        );

        $imagefile = new CURLFile(
            $_FILES['lecture_image']['tmp_name'],
            $_FILES['lecture_image']['type'],
            $_FILES['lecture_image']['name']
            );
        $material_file = new CURLFile(
            $_FILES['material_file']['tmp_name'],
            $_FILES['material_file']['type'],
            $_FILES['material_file']['name']
            );
       
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $course_id= $_POST['course_id'];
        $section_id = $_POST['section_id'];
        $lecture_no = $_POST['lecture_no'];
        $token = $_SESSION['token'];
        $material_title = $_POST['material_title'];
        $material_short_description = $_POST['material_short_description'];


        $header = array(
            "Accept: application/json",
            "Authorization: Bearer $token",
            "Content-Type: multipart/form-data",
            "cache-control: no-cache",
        );

 
        $data = array("title"=>$title,
        "description"=>$description,
        "section_id"=>$section_id,
        "course_id"=>$course_id,
        "lecture_no"=>$lecture_no,
        "video"=>$cfile,
        "lecture_image"=>$imagefile,
        "material_title"=>$material_title,
        "material_short_description"=>$material_short_description,
        "material_file"=>$material_file,


    );
    

        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        $response = curl_exec($ch);
        $data1 = json_decode($response, true);
         print_r($data1);
        $status= $data1['status'];
        if($status == "success")
        {
            // $message =  $data1['message'];
            $lecture_id = $data1['lecture_id'];
            echo "<script>alert('Lecture Uploaded Successfully. You will get an Email Shortly.')</script>";
         


$con = mysqli_connect("localhost","root","","wq");
if(!$con){
    echo "error connecti ng to db";
}

            

    $assignment_ans = $_POST['assignment_ans'];
    $assignment_ques = $_POST['assignment_ques'];
    $option1  = $_POST['option1'];
    $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];


        $sql = mysqli_query($con,"INSERT INTO `course_assignments`( `assignment_no`,`course_id`, `lecture_id`) VALUES ('$lecture_no','
    $course_id','$lecture_id')");
    $sql1 = mysqli_query($con,"select `id` from `course_assignments` where lecture_id=$lecture_id");
    $result = mysqli_fetch_array($sql1);
    $assignment_id = $result['id'];
    // echo $assignment_id;
    for($i=0;$i<count($assignment_ques);$i++)
 {
  if($assignment_ans[$i]!="" && $assignment_ques[$i]!="" && $option1[$i]!="" && $option2[$i]!="" && $option3[$i]!="" && $option4[$i]!="")
  {
    
    $sql = mysqli_query($con,"INSERT INTO `course_assignments_ques_ans`( `assignment_id`,`assignment_ques`, `assignment_ans`,`option1`,`option2`,`option3`,`option4`) VALUES ('$assignment_id','
    $assignment_ques[$i]','$assignment_ans[$i]','$option1[$i]','$option2[$i]','$option3[$i]','$option4[$i]')");
    
    
  }
 }
 if($sql){
    $sqln = mysqli_query($con,"update  `course_lectures` set `lecture_assignment_id`=$assignment_id where `id`=$lecture_id");
        
      
    // echo '<script>alert("Submitted Successfully.")</script>';

    
            // $redirect_path = "Location:add-lectures-video.php?course_id=";
            // $redirect = $redirect_path.$course_id;
            // $newre = "&section_id=";
            // $fullpath = $redirect.$newre.$section_id;

            // header($fullpath);
            echo '<script>alert("Lecture and assignment Added SuccessFully");window.location.assign("add-lectures-video.php?course_id='.$course_id.'&section_id='.$section_id.'")</script>';
}

else{
    echo '<script>alert("something is wrong");window.location.assign("add-lectures-video.php?course_id='.$course_id.'&section_id='.$section_id.'")</script>';} 

        



        }
        else
        {
            echo "<script>alert('Video not Uploaded Successfully. .');</script>";
        }
        curl_close($ch);

// $url_fetch = "get-section";
// $url = $base_url.$url_fetch;
// $data = api_call_auth("POST", $url, $course_id, )



// print_r($_POST);






?>