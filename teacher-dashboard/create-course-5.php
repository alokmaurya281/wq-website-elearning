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
                            <h2 class="text-black font-w600">Create Course Content</h2>
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
                      <h1>Film and edit</h1>
                     
                      <hr>
                      <div">
                      <div class="create-course-3-flex flex-md-column">
                      <div class="create-course-3-item-1">
                      <h3>You’re ready to share your knowledge.</h3>
                      <p>This is your moment! If you’ve structured your course and used our guides, you're well prepared for the actual shoot. Pace yourself, take time to make it just right, and fine-tune when you edit.</p>

                      </div>
                      <div class="create-course-3-item-2">
                      <h3>Free expert Video Filming and Editing Help </h3>
                      <p>Get personalized advice for Editing and Filming Just visit the page and follow the steps</p>
                      <a href="blog.worldsqna.com" class="btn btn-primary rounded light me-3">Get Help</a>

                      </div>
                      

                      </div>

                      </div>
                      
                      

                  </div>
                  <div class="text-new">
                  <h1>Tips</h1>

                  </div>
                  
                 
                  <div class="text-new">
                      <h3>Take breaks and review frequently.</h3>
                      <p>Check often for any changes such as new noises. Be aware of your own energy levels--filming can tire you out and that translates to the screen.</p>
                  </div>

                  
                  <div class="text-new">
                      <h3>Build rapport.</h3>
                      <p>Students want to know who’s teaching them. Even for a course that is mostly screencasts, film yourself for your introduction. Or go the extra mile and film yourself introducing each section!

</p>
                  </div>
                  <div class="text-new">
                      <h3>Being on camera takes practice.</h3>
                      <p>Make eye contact with the camera and speak clearly. Do as many retakes as you need to get it right.</p>
                  </div>
                  <div class="text-new">
                      <h3>Set yourself up for editing success.</h3>
                      <p>You can edit out long pauses, mistakes, and ums or ahs. Film a few extra activities or images that you can add in later to cover those cuts.</p>
                  </div>
                  <div class="text-new">
                      <h3>Create audio marks.</h3>
                      <p>Clap when you start each take to easily locate the audio spike during editing. Use our guides to manage your recording day efficiently.</p>
                  </div>
                  <div class="text-new">
                      <h3>Be creative.</h3>
                      <p>Students won’t see behind the scenes. No one will know if you’re surrounded by pillows for soundproofing...unless you tell other instructors in the community!</p>
                  </div>
                  <div class="text-new">
                      <h3>For screencasts, clean up.</h3>
                      <p>Move unrelated files and folders off your desktop and open any tabs in advance. Make on-screen text at least 24pt and use zooming to highlight.</p>
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
                  <h3>Create Test Video</h3>
                      <p><a href="">Create Test Video Now</a></p>
                      
                  </div>




                 
                  <div style="display:flex; align-items:center;justify-content:center;"><a href="add-section.php?course_id=<?php echo $_GET['course_id'] ?>" class="btn btn-primary rounded light me-3">Next</a></div>
                  
                

                   </div>
                </div>
                   
                    

</section>





<?php

include('backtotop.php');



include('footer.php');



?>