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
                      <h1>Course Structure</h1>
                     
                      <hr>
                      <div">
                      <div class="create-course-3-flex flex-md-column">
                      <div class="create-course-3-item-1">
                      <h3>There's a course in you. Plan it out.</h3>
                      <p>Planning your course carefully will create a clear learning path for students and help you once you film. Think down to the details of each lecture including the skill you’ll teach, estimated video length, practical activities to include, and how you’ll create introductions and summaries.</p>

                      </div>
                      <div class="create-course-3-item-2">
                      <h3>Learn More About of For Teaching Courses and for creating.</h3>
                      <p>Tips and guides to structuring a course students love</p>
                      <a href="blog.worldsqna.com" class="btn btn-primary rounded light me-3">View</a>

                      </div>
                      

                      </div>

                      </div>
                      
                      

                  </div>
                  <div class="text-new">
                  <h1>Tips</h1>

                  </div>
                  
                 
                  <div class="text-new">
                      <h3>Start with your goals.</h3>
                      <p>Setting goals for what learners will accomplish in your course (also known as <a href="">learning objectives</a>) at the beginning will help you determine what content to include in your course and how you will teach the content to help your learners achieve the goals.</p>
                  </div>

                  
                  <div class="text-new">
                      <h3>Create an outline.</h3>
                      <p>Decide what skills you’ll teach and how you’ll teach them. Group related lectures into sections. Each section should have at least 3 lectures, and include at least one assignment or practical activity. 

</p>
                  </div>
                  <div class="text-new">
                      <h3>Introduce yourself and create momentum.</h3>
                      <p>People online want to start learning quickly. Make an introduction section that gives learners something to be excited about in the first 10 minutes.</p>
                  </div>
                  <div class="text-new">
                      <h3>Sections have a clear learning objective.</h3>
                      <p>Introduce each section by describing the section's goal and why it’s important. Give lectures and sections titles that reflect their content and have a logical flow.</p>
                  </div>
                  <div class="text-new">
                      <h3>Lectures cover one concept.</h3>
                      <p>A good lecture length is 2-7 minutes to keep students interested and help them study in short bursts. Cover a single topic in each lecture so learners can easily find and re-watch them later.</p>
                  </div>
                  <div class="text-new">
                      <h3>Mix and match your lecture types.</h3>
                      <p>Alternate between filming yourself, your screen, and slides or other visuals. Showing yourself can help learners feel connected.</p>
                  </div>
                  <div class="text-new">
                      <h3>Practice activities create hands-on learning.</h3>
                      <p>Help learners apply your lessons to their real world with projects, assignments, coding exercises, or worksheets.</p>
                  </div>

                  <div class="text-new">
                  <h1>Requirements</h1>

                  </div>
                  <div class="text-new">
                      <li>See the complete <a href="">list</a> of course quality requirements</li>
                      <li>Your course must have at least five lectures</li>
                      <li>All lectures must add up to at least 30+ minutes of total video</li>
                      <li>Your course is composed of valuable educational content and free of promotional or distracting materials</li>
                  </div>
                  <div class="text-new">
                  <h1>Resourses</h1>

                  </div>
                  <div class="text-new">
                  <h3>Read it Out</h3>
                      <p><a href="">Learn How to Create Course</a></p>
                      
                  </div>




                 
                  <div style="display:flex; align-items:center;justify-content:center;"><a href="create-course-4.php?course_id=<?php echo $_GET['course_id'] ?>" class="btn btn-primary rounded light me-3">Next</a></div>
                  
                </form>

                   </div>
                </div>
                   
                    

</section>





<?php

include('backtotop.php');



include('footer.php');



?>