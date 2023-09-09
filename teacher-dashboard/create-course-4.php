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
                   
                  <div class="row">

                  <div class="text-new">
                      <h1>Setup and Test Video</h1>
                     
                      <hr>
                      <div">
                      <div class="create-course-3-flex flex-md-column">
                      <div class="create-course-3-item-1">
                      <h3>Arrange your ideal studio and get early feedback.</h3>
                      <p>It's important to get your audio and video set up correctly now, because it's much more difficult to fix your videos after you’ve recorded. There are many creative ways to use what you have to create professional looking video.</p>

                      </div>
                      <div class="create-course-3-item-2">
                      <h3>Free expert video help</h3>
                      <p>Get personalized advice on your audio and video</p>
                      <a href="create-test-video-1.php" class="btn btn-primary rounded light me-3">Create a test video</a>

                      </div>
                      

                      </div>

                      </div>
                      
                      

                  </div>
                  <div class="text-new">
                  <h1>Tips</h1>

                  </div>
                  
                 
                  <div class="text-new">
                      <h3>Equipment can be easy.</h3>
                      <p>You don’t need to buy fancy equipment. Most smartphone cameras can capture video in HD, and you can record audio on another phone or external microphone.</p>
                  </div>

                  
                  <div class="text-new">
                      <h3>Students need to hear you.</h3>
                      <p>A good microphone is the most important piece of equipment you will choose. There are lot of affordable options.. Make sure it’s correctly plugged in and 6-12 inches (15-30 cm) from you. 

</p>
                  </div>
                  <div class="text-new">
                      <h3>Make a studio.</h3>
                      <p>Clean up your background and arrange props. Almost any small space can be transformed with a backdrop made of colored paper or an ironed bed sheet.</p>
                  </div>
                  <div class="text-new">
                      <h3>Light the scene and your face.</h3>
                      <p>Turn off overhead lights. Experiment with three point lighting by placing two lamps in front of you and one behind aimed on the background.</p>
                  </div>
                  <div class="text-new">
                      <h3>Reduce noise and echo.</h3>
                      <p>Turn off fans or air vents, and record at a time when it’s quiet. Place acoustic foam or blankets on the walls, and bring in rugs or furniture to dampen echo.</p>
                  </div>
                  <div class="text-new">
                      <h3>Be creative.</h3>
                      <p>Students won’t see behind the scenes. No one will know if you’re surrounded by pillows for soundproofing...unless you tell other instructors in the community!</p>
                  </div>
                  <div class="text-new">
                      <h3>Practice activities create hands-on learning.</h3>
                      <p>Help learners apply your lessons to their real world with projects, assignments, coding exercises, or worksheets.</p>
                  </div>

                  <div class="text-new">
                  <h1>Requirements</h1>

                  </div>
                  <div class="text-new">
                      <li>Film and export in HD to create videos of at least 720p, or 1080p if possible</li>
                      <li>Audio should come out of both the left and right channels and be synced to your video</li>
                      <li>Audio should be free of echo and background noise so as not to be distracting to students</li>
                      
                  </div>
                  <div class="text-new">
                  <h1>Resourses</h1>

                  </div>
                  <div class="text-new">
                  <h3>Read it Out</h3>
                      <p><a href="">Learn more about on Equipments</a></p>
                      
                  </div>




                 
                  <div style="display:flex; align-items:center;justify-content:center;"><a href="create-course-5.php?course_id=<?php echo $_GET['course_id'] ?>" class="btn btn-primary rounded light me-3">Next</a></div>
                  
                

                   </div>
                </div>
                   
                    

</section>





<?php

include('backtotop.php');



include('footer.php');



?>