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
                            <h2 class="text-black font-w600">Finalize and Publish Your Course</h2>
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
                   
                  
                   
                   
                  <div class="row">

                  <div class="text-new">
                      <h1>Course Final Submit For Review</h1>
                     
                      <hr>
                      <div">
                      <div class="create-course-3-flex flex-md-column">
                      <div class="create-course-3-item-1">
                      <h3>Check Course Content </h3>
                      <p>You can Recheck Your Course Content By Viewing Course Content and if it is Correct Then Submit For Review.</p>

                      </div>
                      <div class="new-flex mt-2" >
  <div class="text-new" style="align-self:flex-start; margin-bottom:-10px;">

  
</div>
<div class="text-new" style="align-items:end; margin-bottom:-10px;">
  <h1 class=" ms-3" ><a href="view-course-content.php?course_id=<?php echo $_GET['course_id']?>" class="btn btn-primary ms-2">View Content</a></h1>
</div>
</div>


                      </div>

                      </div>
                      <form action="course-final-submit-form.php" method="post">
                          <input type="text" name="course_id" value="<?php echo $_GET['course_id']?>" hidden>
                          <input type="text" name="teacher_id" value="<?php echo $_SESSION['teacher_id']?>" hidden>
                      <div style="display:flex; align-items:center;justify-content:center;"><button  class="btn btn-primary btn-rounded">Submit For Review</button></div>
                      </form>

                   </div>

                   <?php
                   $token= $_SESSION['token'];
                   $base_url = $_SESSION['base_url'];
                    $url_fetch = "get-course-by-course-id";
                    $url = $base_url.$url_fetch;
                    $fields = array('course_id'=>$_GET['course_id']);
                   $data = api_call_auth("POST", $url , $fields, $token);
                   $status = $data['status'];
                   if(!$data['Data']==null){
                    //  print_r($data);
                    $course = $data['Data'];
                   
                    // echo $video_id;
                    $course_name = $course[0]['course_name'];
                    $course_language = $course[0]['course_language'];
                    $course_short_description = $course[0]['course_short_description'];
                    $course_long_description = $course[0]['course_long_description'];
                    $course_category = $course[0]['category_id'];
                    
                   }
                  ?>

   
                
                
                
                </div>
                   
                   
                    

</section>



<?php

include('backtotop.php');



include('footer.php');






?>




