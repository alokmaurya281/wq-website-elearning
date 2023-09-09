<?php 

// include('check-login.php');
// include('api.php');
$url_fetch = "get-course-by-teacher-id";
$base_url = $_SESSION['base_url'];
$url = $base_url.$url_fetch;

$teacher_id = $_SESSION["teacher_id"];



$url = $url;
$method="POST";
$fields = array("teacher_id"=>$teacher_id);


$new = api_call_post($method,$url,$fields);

$courses = $new["Data"];


 $array_length = count($courses);

 $i=-1;
?>
<div class="text-new" style="align-self:flex-start; margin-bottom:-10px;">
  <h1 class="mt-5 ms-4" >Courses </h1>
</div>
<div class="new-flex mt-2" >
  <div class="text-new" style="align-self:flex-start; margin-bottom:-10px;">
  <form class="d-flex width-100" role="search"style="align-self:flex-start; margin-bottom:-10px; margin-left:-50px;" >
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="font-size: 14px!important;">
                    <button class="btn btn-primary" type="submit" >Search</button>
                  </form>
  
</div>
<div class="text-new" style="align-items:end; margin-bottom:-10px;">
  <h1 class=" ms-3" ><a href="create_course-1.php" class="btn btn-primary ms-2">New Course</a></h1>
</div>
</div>


  <?php  
foreach ($courses as $key => $value) {
  
  $i++;
  $course_name= $courses[$i]['course_name'];
  $course_id= $courses[$i]['id'];
  // print_r($courses[$i]['course_name']);
  
  
?>
  <div class="card w-100 p-2 mt-4 card-teacher-course" style="border:1px solid silver;">
  <div class="card-body">
    <div class="show-link mb-3">
    <a href="create-course-2.php?course_id=<?php echo $course_id?>" class="btn btn-primary ms-2">Edit Course</a>
    <!-- <a href="delete-course.php?course_id=<?php echo $course_id?>" class="btn btn-primary ms-2">Delete Course</a> -->

    </div>
    <h5 class="card-title"><?php echo $course_name?></h5>
    <p class="card-text"><?php echo $courses[$i]['course_short_description']?></p>
    <a href="create_course-1.php" class="btn btn-primary">View Course</a>
  </div>
</div>

<?php

}

?>

