<?php 
include('api.php');

include('check-login.php');
include('head.php');
include('sidebar.php');
if(!isset($_GET['setup_id'])){
    echo "<script>alert('You have not selected proper setup id or add details first');window.location.assign('create-test-video-1.php');</script>";
}




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
                      <h1>Upload Setup Video</h1>
                     
                      <hr>
                      <div">
                      <div class="create-course-3-flex flex-md-column">
                      <div class="create-course-3-item-1">
                      <h3>Upload a test video.</h3>
                      <p>Upload test video and submit for review.</p>

                      </div>
                     
                      

                      </div>

                      </div>
                      
                    

                   </div>

                     
                   <form class="form-" action="test-video-form-2.php" method="post" enctype="multipart/form-data">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="customFile">Setup Video file</label>
                    <input type="file" name="video"  class="form-control"  required />
                  </div> 
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="title" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Setup Video Title</label>
                  </div>
                                <div class="form-outline mb-4">
                    <textarea class="form-control" name="description" value="" rows="2" required></textarea>
                    <label class="form-label" for="form6Example7">Setup Video Descrition</label>
                  </div>
                  <input type="text" name="setup_id" value="<?php echo $_GET['setup_id'];?>" hidden>
                  <input type="text" name="teacher_id" value="<?php echo $_SESSION['teacher_id'];?>" hidden>
                  

                  <!-- Submit button -->
                  <div style="display:flex; align-items:center;justify-content:center;"><button onclick="popup()" type="submit" name="submit" value="submit" class="btn btn-primary btn-rounded">Submit For Review</button></div>
                  <script>
                    function popup(){
                      return alert('Please Do not Press Any Key Untill The video is being Uploaded.');
                    }
                  </script>
                  
                </form>
                   

                   
                

                  <!-- Submit button -->
                  
                
                
                
                </div>
                   
                   
                    

</section>



<?php

include('backtotop.php');



include('footer.php');






?>




