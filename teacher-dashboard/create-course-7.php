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
                      <h1>Course Landing Page</h1>
                     
                      <hr>
                      <div">
                      <div class="create-course-3-flex flex-md-column">
                      <div class="create-course-3-item-1">
                      <h3>This Will appear when student view your Course</h3>
                      <p>This is the main landing page of your course where all the details of your course will be visible so try to do the best for impressing learners and create impressive. </p>

                      </div>
                     
                      

                      </div>

                      </div>
                      
                    

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

                     
                   <form class="form-" action="create-course-7-form.php" method="post" enctype="multipart/form-data">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="course_name" value="<?php echo $course_name?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">Course Name</label>
                  </div>
      
                  

                  <!-- Message input -->
                  <div class="form-outline mb-4">
                    <textarea class="form-control" name="course_short_description" value="" rows="2" required><?php echo $course_short_description?></textarea>
                    <label class="form-label" for="form6Example7">Short Description</label>
                  </div>
                  <div class="form-outline mb-4">
                    <textarea class="form-control" name="course_long_description" value="" rows="4" required><?php echo $course_long_description?></textarea>
                    <label class="form-label" for="form6Example7">Long Description</label>
                  </div>
                 
                 
                  <input type="text" name="course_id" value="<?php echo $_GET['course_id']  ?>" class="form-control" hidden/>
                  <div class="form-outline form-dark mb-4">
                  <label class="form-label" for="form6Example3">Course Language</label>
                    <select  name="course_language"  class="form-control"  style="border:1px solid silver;margin-left:-10px;" required>
                    <option value="<?php echo $course_language?>" selected><?php echo $course_language?></option>
                    
                        <option value="English">English</option>
                        <option value="Hindi">Hindi</option>
                    </select>
                   
                  </div>
                  <?php 
                  $base_url = $_SESSION['base_url'];
                  $url_fetch = "categories";
                  $url = $base_url.$url_fetch;
$data = api_call_get("GET", $url);
$categories=$data["Data"];
$array_length = count($categories);


                  ?>
                  <div class="form-outline form-dark mb-4">
                  <label class="form-label" for="form6Example3">Course Category</label>
                    <select  name="category_id"  class="form-control"  style="border:1px solid silver;margin-left:-10px;" required>
                    <option value="<?php echo $course_category?>" selected>Select category</option>
                    <?php  $i=-1;
    
    foreach ($categories as $key => $value) {
      
      $i++;
 ?>    
                    
                        <option value="<?php echo $categories[$i]['id']?>"><?php echo $categories[$i]['category_name'] ?></option>
                        <?php }?>
                    </select>
                   
                  </div>

                  <div class="form-outline form-dark mb-4">
                    <input style="border:1px solid silver;margin-left:-10px;" type="text" name="course_price" value="" class="form-control" required />
                    <label class="form-label" >Course Price</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input style="border:1px solid silver;margin-left:-10px;" type="text" name="level_of_course" value="" class="form-control" required />
                    <label class="form-label" for="">Level of course</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input style="border:1px solid silver;margin-left:-10px;" type="text" name="total_lectures" value="" class="form-control" required />
                    <label class="form-label" for="">Total Lectures</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input style="border:1px solid silver;margin-left:-10px;" type="text" name="total_hours_lectures" value="" class="form-control" required />
                    <label class="form-label" for="form6Example34">Total Hours Lectures</label>
                  </div>
                  <div class="text-new">
                  <h3>Greeting Messages</h3>
                      <p>This will not show up in Landing Page it will use when student join your course and complete your course</p>
                      
                  </div>
                  <div class="form-outline mb-4">
                    <textarea style="border:1px solid silver;margin-left:-10px;" class="form-control" name="course_welcome_message" value="" rows="4" required></textarea>
                    <label class="form-label" for="form6Example8">Course Joining Greeting Message</label>
                  </div>
                  <div class="form-outline mb-4">
                    <textarea style="border:1px solid silver;margin-left:-10px;" class="form-control" name="course_complete_message" value="" rows="4" required></textarea>
                    <label class="form-label" for="form6Example9">Course Completion Greeting Message</label>
                  </div>

                  

                  <!-- Submit button -->
                  <div style="display:flex; align-items:center;justify-content:center;"><button type="submit" name="submit" value="submit" class="btn btn-primary btn-rounded">Save</button></div>
                  
                </form>
                   

                   
                

                  <!-- Submit button -->
                  
                
                
                
                </div>
                   
                   
                    

</section>



<?php

include('backtotop.php');



include('footer.php');






?>




