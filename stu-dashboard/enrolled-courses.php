<?php 

// include('check-login.php');
// include('api.php');
$url_fetch = "enrolled-courses";
$base_url = $_SESSION['base_url'];
$url = $base_url.$url_fetch;

$userid = $_SESSION["userid"];



$url = $url;
$method="POST";
$fields = array("userid"=>$userid);
$token = $_SESSION['token'];


$new = api_call_auth($method,$url,$fields,$token);


$courses = $new["Data"];


 $array_length = count($courses);


 $i=-1;
?>
<div class="text-new" style="align-self:flex-start; margin-bottom:-10px;">
  <h1 class="mt-5 ms-4" >Enrolled Courses </h1>
</div>
<div class="new-flex mt-2" >
  <div class="text-new mb-2" style="align-self:flex-start; margin-left:20px;">
  <form class="d-flex width-100 mb-4" role="search"style="align-self:flex-start;  " >
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="font-size: 14px!important;">
                    <button class="btn btn-primary" type="submit" >Search</button>
                  </form>
  
</div>
<!-- <div class="text-new" style="align-items:end; margin-bottom:-10px;">
  <h1 class=" ms-3" ><a href="create_course-1.php" class="btn btn-primary ms-2">New Course</a></h1>
</div> -->
</div>
<div class=" d-flex flex-row flex-wrap align-self-center" >




  <?php  
foreach ($courses as $key => $value) {
  
  $i++;
  
  $course_id= $courses[$i]['course_id'];
  // print_r($course_id);
  // print_r($courses[$i]['course_name']);


$url_fetch = "get-course-by-course-id";
$url = $base_url.$url_fetch;

$fields = array('course_id'=>$course_id);

$data=api_call_post("POST",$url, $fields);


$course_details = $data['Data'][0];
$course_title = $course_details['course_name'];
$course_short_description = $course_details['course_short_description'];
$course_long_description = $course_details['course_long_description'];
$course_language = $course_details['course_language'];
$category_id = $course_details['category_id'];
$course_feature_image = $course_details['course_feature_image'];
$course_feature_video = $course_details['course_feature_video'];
$level_of_course = $course_details['level_of_course'];
$course_motive_id = $course_details['course_motive_id'];
$course_aim_id = $course_details['course_aim_id'];
$course_requirement_id = $course_details['course_requirement_id'];
$course_project_id = $course_details['course_project_id'];
$total_lectures = $course_details['total_lectures'];
$total_hours_lectures = $course_details['total_hours_lectures'];
$total_enrolled_students = $course_details['total_enrolled_students'];
$course_price = $course_details['course_price'];
$teacher_id = $course_details['teacher_id'];


 
        $url_fetch = "get-course-teacher-details";
        $url= $base_url.$url_fetch;
            $teacher = api_call_post("POST", $url, $fields);
            $total_courses = $teacher['total_courses'][0]['total'];
            $teacher_details = $teacher['Data']['0'];
            $teacher_about = $teacher_details['about'];
            $teacher_profile = $teacher_details['profile_image'];
            $teacher_name = $teacher_details['name'];

        


?>
  

<div class="card  mb-4 ms-4" style="width:250px;">
  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
    <img src="http://localhost:8000/storage/<?php echo $course_feature_image?>" class="img-fluid"/>
    <a href="lecture.php?course_id=<?php echo $course_id?>">
      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
    </a>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo substr($course_title, 0, 20);?></h5>
    <p class="card-text" style="color:silver;"><?php echo $teacher_name?></p>
    <div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>
    <!-- <a href="#!" class="btn btn-primary">View</a> -->
  </div>
</div>


<?php

}

?></div>

