<?php 
include('api.php');

include('check-login.php');
include('head.php');
include('sidebar.php');
// if(!isset($_GET['course_id'])){
//     echo "<script>alert('Please Select one of Your Course Or Create New Course');window.location.assign('index.php');</script>";
// }


?>


<section>
                    <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start" style="background-color:white; padding:30px; border-radius:10px; margin-bottom:30px;">
                        <div class="me-auto  d-lg-block">
                            <h2 class="text-black font-w600">Create Setup Video</h2>
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
                      <h1>Setup Video</h1>
                     
                      <hr>
                      <div">
                      <div class="create-course-3-flex flex-md-column">
                      <div class="create-course-3-item-1">
                      <h3>Here You can create a test video.</h3>
                      <p>Here You can create and upload test video and get help and suggetions about your video is it good or not and the video quality and audio and more so just create a simple 2-3 minutes video and get suggetions from our top experts.<br><b><a href="">Learn More About Test Video</a></b></p>

                      </div>
                     
                      

                      </div>

                      </div>
                      
                    

                   </div>
                   <?php
                   $token= $_SESSION['token'];
                   $base_url = $_SESSION['base_url'];
                    $url_fetch = "get-setup-video";
                    $url = $base_url.$url_fetch;
                    $fields = array('teacher_id'=>$_SESSION['teacher_id']);
                   $data = api_call_auth("POST", $url , $fields, $token);
                   $status = $data['status'];
                   if($status=="success"){
                    //  print_r($data);
                    $videos = $data['Data'];
                    $video_id = $videos[0]['video'];
                    // echo $video_id;
                    $setup_id = $videos[0]['id'];
                    $language = $videos[0]['video_language'];
                    $title = $videos[0]['title'];
                    $status = $videos[0]['status'];
                    $os = $videos[0]['operating_system'];
                    $desciption = $videos[0]['description'];
                    $soft = $videos[0]['software'];
                    $camera = $videos[0]['camera_type'];
                    $mic = $videos[0]['microphone_type'];
                  ?>
                  
                  
<div class="card-teacher-course card w-100 p-2 mt-3 mb-5">
  <div class="card-body">
    <h3 style="font-weight:600; font-size:22px;">Setup Video Details</h3>
    <div class="show-link mb-3">
    
    <a href="create-test-video-2.php?setup_id=<?php echo $setup_id ?>" class="btn btn-primary ms-2">Update Setup Video </a>

    </div>
    <p class="card-text"> Title - <?php echo $title?></p>
    <p class="card-text"> Description - <?php echo $desciption?></p>
    <p class="card-text">Language - <?php echo $language?></p>
    <p class="card-text">Status - <b><?php echo $status?></b></p>
    <a href="#view-setup-video" class="btn btn-primary">View Video</a>
  </div>
</div>

              
<div class="ratio ratio-16x9"id="view-setup-video">

  <iframe style="border-radius:10px;"  width="885" height="498" src="http://localhost:8000/storage/<?php echo $video_id?>" title="<?php echo $title?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <!-- <video src="http://localhost:8000/storage/<?php echo $video_id?>"></video> -->
</div>
                  <?php
                   }
                   
                   else{
                     ?>
                  

                     
                   <form class="form-" action="test-video-form-1.php" method="post" enctype="multipart/form-data">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="microphone_type" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Microphone Type</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="camera_type" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Camera Type</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="operating_system" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Operating System</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="software" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Software</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="video_language" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Video Language</label>
                  </div>

                 
                  <input type="text" name="teacher_id" value="<?php echo $_SESSION['teacher_id']  ?>" class="form-control" hidden/>

                  <!-- Submit button -->
                  <div style="display:flex; align-items:center;justify-content:center;"><button type="submit" name="submit" value="submit" class="btn btn-primary btn-rounded">Next</button></div>
                  
                </form><?php
                 }
                   ?>
                   

                   
                

                  <!-- Submit button -->
                  
                
                
                
                </div>
                   
                   
                    

</section>



<?php

include('backtotop.php');



include('footer.php');






?>




