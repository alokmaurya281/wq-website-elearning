<?php 
include('api.php');

include('check-login.php');
include('head.php');
include('sidebar.php');
if(!isset($_GET['course_id'])){
    echo "<script>alert('Please Select one of Your Course Or Create New Course');window.location.assign('index.php');</script>";
}


?>


<section>
                    <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start" style="background-color:white; padding:30px; border-radius:10px; margin-bottom:30px;">
                        <div class="me-auto  d-lg-block">
                            <h2 class="text-black font-w600">Plan Your Course</h2>
                            <p class="mb-0">Welcome <?php echo $_SESSION['name'];?></p>
                        </div>
                        <?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>
                        <a href="<?php echo $actual_link?>" class="btn btn-primary rounded light me-3">Refresh</a>
                        <!-- <a href="update_property_details.php" class="btn btn-primary rounded light me-3">Update</a>

                        <a href="javascript:void(0);" class="btn btn-primary rounded"><i class="fas fa-cog me-0"></i></a> -->
                    </div>
                    <div style=" padding:40px; border-radius:10px; margin-right:auto; margin-left:auto; " class="plan-course">
<style>
  .active{
    color:#828282!important;
  }
</style>
          
                   <div class="right" >
                   <form class="form-" action="create-course-form2.php" method="post" >
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">

                  <div class="text-new">
                      <h1>For Intending Learners</h1>
                     
                      <hr>
                      <p>The following descriptions will be publicly visible on your <a href="">Course Landing Page</a> and will have a direct impact on your course performance. These descriptions will help learners decide if your course is right for them.</p>

                  </div>
                  <div class="text-new">
                  <h3>What will students learn in your course?</h3>
                      <p>You must enter at least 4 learning objectives or outcomes that learners can expect to achieve after completing your course.</p>

                  </div>

                  <?php 
           
           $base_url = $_SESSION['base_url'];
$url_fetch = "course-motive";
$url = $base_url.$url_fetch;
$fields = array("course_id"=>$_GET['course_id']);

// $token = $_SESSION['token'];


$update = api_call_post("POST", $url, $fields,);
$motive1=$update["Data"][0]['motive1'];
$motive2=$update["Data"][0]['motive2'];
$motive3=$update["Data"][0]['motive3'];
$motive4=$update["Data"][0]['motive4'];


$status= $update['status'];
        if($status = "success")
        {
          //  echo $course_aim;
        }
        else
        {
            echo "<script>alert('Please try again');window.location.assign('$redirect');</script>";
        }



           ?>  
                  <div class="form-outline form-dark mb-4 w-75">
                    <input type="text" name="motive1" value="<?php echo $motive1?>" class="form-control" required />
                    <label class="form-label" for="form6Example3" >Example: Define the course main key features (max:100 words)</label>
                  </div>
                  <input type="text" name="course_id" value="<?php echo $_GET['course_id'];  ?> " hidden>
                  <div class="form-outline form-dark mb-4 w-75">
                    <input type="text" name="motive2" value="<?php echo $motive2?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">Example: Define the course concept headings (max:100 words)</label>
                  </div>
                  <div class="form-outline form-dark mb-4 w-75">
                    <input type="text" name="motive3" value="<?php echo $motive3?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">Example: Define the course what you will taught (max:100 words)</label>
                  </div>
                  <div class="form-outline form-dark mb-4 w-75">
                    <input type="text" name="motive4" value="<?php echo $motive4?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">Example: Define the course main key features (max:100 words)</label>
                  </div>

                 
                  <div class="text-new">
                      <h3>What are the <a href="">requirements</a> or prerequisites for taking your course?</h3>
                      <p>List the required skills, experience, tools or equipment learners should have prior to taking your course.
If there are no requirements, use this space as an opportunity to lower the barrier for beginners. <br><b>You Must Atleast one Requirement.</b></p>
                  </div>

                  <!-- Message input -->

                  <?php 
           
           $base_url = $_SESSION['base_url'];
$url_fetch = "course-requirements";
$url = $base_url.$url_fetch;
$fields = array("course_id"=>$_GET['course_id']);

// $token = $_SESSION['token'];


$update = api_call_post("POST", $url, $fields,);
$course_requirements_1=$update["Data"][0]['requirement_1'];
$course_requirements_2=$update["Data"][0]['requirement_2'];
$course_requirements_3=$update["Data"][0]['requirement_3'];
$course_requirements_4=$update["Data"][0]['requirement_4'];
$course_requirements_5=$update["Data"][0]['requirement_5'];

$status= $update['status'];
        if($status = "success")
        {
          //  echo $course_aim;
        }
        else
        {
            echo "<script>alert('Please try again');window.location.assign('$redirect');</script>";
        }



           ?>        
                  
                 
                  <div class="form-outline mb-4 w-75">
                    <input type="text" class="form-control" name="requirement_1" value="<?php echo $course_requirements_1?>"  required>
                    <label class="form-label" for="form6Example7">Example: No Pragramming Skills Needed You will Learn From Scratch (max:100 words)</label>
                  </div>
                  <div class="form-outline mb-4 w-75">
                    <input type="text" class="form-control" name="requirement_2" value="<?php echo $course_requirements_2?>"  >
                    <label class="form-label" for="form6Example7">Example: No Pragramming Skills Needed You will Learn From Scratch (max:100 words)</label>
                  </div>
                  <div class="form-outline mb-4 w-75">
                    <input type="text" class="form-control" name="requirement_3" value="<?php echo $course_requirements_3?>"  >
                    <label class="form-label" for="form6Example7">Example: No Pragramming Skills Needed You will Learn From Scratch (max:100 words)</label>
                  </div>
                  <div class="form-outline mb-4 w-75">
                    <input type="text" class="form-control" name="requirement_4" value="<?php echo $course_requirements_4?>"  >
                    <label class="form-label" for="form6Example7">Example: No Pragramming Skills Needed You will Learn From Scratch (max:100 words)</label>
                  </div>
                  <div class="form-outline mb-4 w-75">
                    <input type="text" class="form-control" name="requirement_5" value="<?php echo $course_requirements_5?>"  >
                    <label class="form-label" for="form6Example7">Example: No Pragramming Skills Needed You will Learn From Scratch (max:100 words)</label>
                  </div>
                  
                  <div class="text-new">
                      <h3>Who is this course for?</h3>
                      <p>Write a clear description of the intended learners for your course <a href="">who will find your course content valuable</a>.
This will help you attract the right learners to your course.

</p>
                  </div>
                  <?php 
           
           $base_url = $_SESSION['base_url'];
$url_fetch = "course-aim";
$url = $base_url.$url_fetch;
$fields = array("course_id"=>$_GET['course_id']);

// $token = $_SESSION['token'];


$update = api_call_post("POST", $url, $fields,);
$course_aim=$update["Data"][0]['course_aim'];

$status= $update['status'];
        if($status = "success")
        {
          //  echo $course_aim;
        }
        else
        {
            echo "<script>alert('Please try again');window.location.assign('$redirect');</script>";
        }



           ?>        
                  
                  <div class="form-outline mb-4 w-75">
                    <input class="form-control" name="course_aim"  value="<?php echo $course_aim ?>" rows="2" required></input>
                    <label class="form-label" for="form6Example7"> Example: Who Want To Learn Python and want to become a Python Developer. this is course is related to that. (max:100 words)</label>
                  </div>
                  
                
                  

                  <!-- Submit button -->
                  <div style="display:flex; align-items:center;justify-content:center;"><button type="submit" name="submit" value="submit" class="btn btn-primary btn-rounded">Save and Next</button></div>
                  
                </form>

                   </div>
                </div>
                   
                    

</section>





<?php

include('backtotop.php');



include('footer.php');



?>