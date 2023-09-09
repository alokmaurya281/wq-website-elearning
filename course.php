
  <?php include('header.php');?>
  <?php 









// include('api.php');
$base_url = $_SERVER['base_url'];
$url_fetch = "get-course-by-course-id";
$url = $base_url.$url_fetch;
// echo $url;
$fields = array('course_id'=>$_GET['course_id']);

$data=api_call_post("POST",$url, $fields);
// print_r($data);

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


?>




 
  <script src="js/navbar.js"></script>
  <script src="js/darkmode.js"></script>
  <script src="js/headroom.js"></script>


  <section class="container course-detail">
      <div class="course-short-details">
          <h1 class="main-h1"><?php echo $course_title?></h1>
          <p > <?php echo $course_short_description?></p>
          <p style="margin-left: -5px;" class="rating"><span>
          <?php 
          
          $url_fetch = "avg-course-ratings";
          $url = $base_url.$url_fetch;
          $fields = array('course_id'=>$_GET['course_id']);
          
          $r = api_call_post("POST", $url, $fields);
          // print_r($aim);
          $rating = $r['Data'][0]['ROUND(AVG(`rating`),2)'];
          $total_feedback = $r['total_feedback'][0]['COUNT(*)'];
          
  
            ?>
            <?php if($rating==5.00){
                echo '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
              }?>
              <?php if($rating==4.00){
                echo '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
              }?>
              <?php if($rating==3.00){
                echo '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
              }?>
              <?php if($rating==2.00){
                echo '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star">';
              }?>
              <?php if($rating==1.00){
                echo '<i class="fa-solid fa-star"></i>';
              }?>
              
            
          
           </span> <span class="feedback-course">(<?php echo $total_feedback ?>)</span></p>
          <p style="margin-top: 10px;">Total Students <?php echo $total_enrolled_students?></p>
          <?php  
        $url_fetch = "get-course-teacher-details";
        $url= $base_url.$url_fetch;
            $teacher = api_call_post("POST", $url, $fields);
            $total_courses = $teacher['total_courses'][0]['total'];
            $teacher_details = $teacher['Data']['0'];
            $teacher_about = $teacher_details['about'];
            $teacher_profile = $teacher_details['profile_image'];
            $teacher_name = $teacher_details['name'];

        ?>
          <p style="margin-top: -15px;">Created By - <?php echo $teacher_name?></p>
          <form action="add-to-cart.php" method="post">
            <input type="text" name="course_id" value="<?php echo $_GET['course_id']?>" hidden>
            <input type="text" name="course_price" value="<?php echo $course_price?>" hidden>
            <button type="submit" class="btn  btn-primary nav-btn" >Enroll Now</button> 
          </form>
          
      </div>
      <div class="course-feature-video">
        <img src="http://localhost:8000/storage/<?php echo $course_feature_image?>" alt="">
      </div>

  </section>

  <section class="container">
  <h1 class="main-h1">What You Will Learn in this Course</h1>
  
  <div class="course-aim-1">
          <?php 
          
        $url_fetch = "course-motive";
        $url = $base_url.$url_fetch;
        $fields = array('course_id'=>$_GET['course_id']);
        
        $motive = api_call_post("POST", $url, $fields);
        // print_r($requirements);
        $course_motive = $motive['Data'][0];
        $motive1  = $course_motive['motive1'];
        $motive2  = $course_motive['motive2'];
        $motive3  = $course_motive['motive3'];
        $motive4  = $course_motive['motive4'];
        

          ?>
          <?php if(!$motive1==NULL){?>
            <p style="margin-right:20px;"><i class="fa-solid fa-check blue"></i> <?php echo $motive1?></p>

          <?php }?>
          <?php if(!$motive2==NULL){?>
            <p style="margin-right:20px;"><i class="fa-solid fa-check blue"></i> <?php echo $motive2?></p>

          <?php }?>
          <?php if(!$motive3==NULL){?>
            <p style="margin-right:20px;"><i class="fa-solid fa-check blue"></i> <?php echo $motive3?></p>

          <?php }?>
          <?php if(!$motive4==NULL){?>
            <p style="margin-right:20px;"><i class="fa-solid fa-check blue"></i> <?php echo $motive4?></p>

          <?php }?>
          
            
            
        </div>
  </section>


  <section class="container course-aim">
    <h1 class="main-h1">Requirements For This Course</h1>
    <div class="course-m1">

    
      <div class="course-m">
        
        <div class="course-aim-1">
          <?php 
          
        $url_fetch = "course-requirements";
        $url = $base_url.$url_fetch;
        $fields = array('course_id'=>$_GET['course_id']);
        
        $requirements = api_call_post("POST", $url, $fields);
        // print_r($requirements);
        $course_requirements = $requirements['Data'][0];
        $requirement_1  = $course_requirements['requirement_1'];
        $requirement_2  = $course_requirements['requirement_2'];
        $requirement_3  = $course_requirements['requirement_3'];
        $requirement_4  = $course_requirements['requirement_4'];
        $requirement_5  = $course_requirements['requirement_5'];

          ?>
          <?php if(!$requirement_1==NULL){?>
            <p style="margin-right:20px;"><i class="fa-solid fa-check blue"></i> <?php echo $requirement_1?></p>

          <?php }?>
          <?php if(!$requirement_2==NULL){?>
            <p style="margin-right:20px;"><i class="fa-solid fa-check blue"></i> <?php echo $requirement_2?></p>

          <?php }?>
          <?php if(!$requirement_3==NULL){?>
            <p style="margin-right:20px;"><i class="fa-solid fa-check blue"></i> <?php echo $requirement_3?></p>

          <?php }?>
          <?php if(!$requirement_4==NULL){?>
            <p style="margin-right:20px;"><i class="fa-solid fa-check blue"></i> <?php echo $requirement_4?></p>

          <?php }?>
          <?php if(!$requirement_5==NULL){?>
            <p style="margin-right:20px;"><i class="fa-solid fa-check blue"></i> <?php echo $requirement_5?></p>

          <?php }?>
            
            
            
        </div>
        <div class="course-aim-2">
            <h1 class="main-h1">About this Certificate Course</h1>
            <p ><?php echo $course_long_description?></p>

        </div>

      </div>
      <div class="course-card-detail">
          <h1 class="main-h1"><?php echo $course_title?></h1>
          <p class="course-card-detail-subtitle">With this Course you will get</p>
          <div class="get">
              <div class="n1">
                <div class=" ">
                  <i class="fa-solid fa-clock round pink"></i>
                </div>
                <div style="margin-left: 20px;">
                <h3 class="text-course">Free LifeTime Access</h3>
              <p class="course-card-detail-subtitle color-gray">Learn anytime, anywhere</p></div>
            </div>
            <div class="n1">
                <div class=" ">
                  <i class="fa-solid fa-certificate round blue"></i>
                </div>
                <div style="margin-left: 20px;">
                <h3 class="text-course">Completion Certificate</h3>
              <p class="course-card-detail-subtitle color-gray">Stand out to your professional network</p></div>
            </div>
            <div class="n1">
                <div class=" ">
                  <i class="fa-solid fa-stopwatch round navy"></i>
                </div>
                <div style="margin-left: 20px;">
                <h3 class="text-course"><?php echo $total_hours_lectures?> Hours Video Lectures</h3>
              <p class="course-card-detail-subtitle color-gray">of self-placed video lectures</p></div>
            </div>
          </div>
          <div class="center"><form action="add-to-cart.php" method="post">
            <input type="text" name="course_id" value="<?php echo $_GET['course_id']?>" hidden>
            <input type="text" name="course_price" value="<?php echo $course_price?>" hidden>
            <button type="submit" class="btn  btn-primary nav-btn" >Enroll Now</button> 
          </form> </div>
          

      </div>
    </div>
    

  </section>

  <section class="container course-content faqs">
    <h1 class="main-h1">Course Content</h1>
    <div class="parent-container" style="margin-top: 20px;">
        <ul class="faq">
          <?php 
          $url_fetch = "get-course-section-by-course-id";
          $url = $base_url.$url_fetch;
          $section = api_call_post("POST", $url, $fields);
          $i=-1;
          foreach ($section['Data'] as $key => $value) {
            $i++;
            $section_data = $section['Data'][$i];
            $section_id = $section_data['id'];
            $section_title = $section_data['section_title'];
            $section_description = $section_data['section_description'];
          
          
          
          ?>
          <li>
            <h3 class="question"><?php echo $section_title?>
              <div class="plus-minus-toggle collapsed"></div>
            </h3>
            <div class="answer"><?php echo $section_description?></div>
          </li>
          <?php } ?>
        </ul>
      </div>

</section>
<section class="container course-content faqs">
    <h1 class="main-h1">Course Aim</h1>
    
    <div class="course-aim-1">
          <?php 
          
        $url_fetch = "course-aim";
        $url = $base_url.$url_fetch;
        $fields = array('course_id'=>$_GET['course_id']);
        
        $aim = api_call_post("POST", $url, $fields);
        // print_r($aim);
        $course_aim = $aim['Data'][0]['course_aim'];
        

          ?>
          <p><?php echo $course_aim?></p>
       
            
            
            
        </div>
         
      

</section>

  <section class=" container course-instructor-detail">
      <h1 class="main-h1" style="margin-bottom:25px;">Our course instructor</h1>
      <div class="instructor-main">
       
          <div class="ins-img">
              <img src="http://localhost:8000/storage/<?php echo $teacher_profile ?>" alt="">
          </div>
          <div class="about-ins">
              <h1 class="main-h1"><?php echo $teacher_name;?></h1>
              <p><i class="fa-solid fa-play"></i> Total Courses <?php echo $total_courses?></p>
              <p style="margin-top: -10px;"><?php echo $teacher_about?>
              </p>

          </div>

      </div>
  </section>


  <!-- ratings and feedback-course -->
  <?php
  $url_fetch = "course-ratings";
    $url = $base_url.$url_fetch;
    $rating = api_call_post("POST", $url, $fields);
  
  if(!$rating['Data']==NULL){
    ?>

  <section class="container  courses-container" style="margin-top: 15px; margin-bottom: 85px;">
    <div class=" swiper myswiper">
    <h1 class="main-h1" style=" margin-bottom: 20px;">What our learners say about the course</h1>
    <p>Find out how our platform helped our learners to upskill in their career.</p>

    
    <div class="course-cards  swiper-wrapper" style="margin-top: 20px;">
    <?php 
    
   
    $ratings = $rating['Data'];
    $x=-1;
          foreach ($ratings as $key => $value) {
            $x++;
            $rating_n = $ratings[$x]['rating'];
            $comment = $ratings[$x]['comment'];
            $user_id = $ratings[$x]['userid'];

            $url_fetch= "get-user-details-rating";
            $url = $base_url.$url_fetch;
            $field = array('userid'=>$ratings[$x]['userid']);
            // print_r($field);


            $user_detail = api_call_post("POST", $url, $field);
            // print_r($user_detail);
            $rating_user_name = $user_detail['message'][0]['name'];
            $rating_user_img = $user_detail['message'][0]['profile_image'];
          


    ?>
        <div type="button" class="course-card swiper-slide students" data-toggle="tooltip" data-placement="right" >
            <img class="stu-image" src="http://localhost:8000/storage/<?php echo $rating_user_img?>" alt="">
            <p class=""><?php echo mb_strimwidth($comment, 0, 100,"...")?></p>
            <p class="course-by"> <?php echo $rating_user_name?></p>

            <p class="rating"><span>
              <?php if($rating_n==5){
                echo '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
              }?>
              <?php if($rating_n==4){
                echo '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
              }?>
              <?php if($rating_n==3){
                echo '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
              }?>
              <?php if($rating_n==2){
                echo '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star">';
              }?>
              <?php if($rating_n==1){
                echo '<i class="fa-solid fa-star"></i>';
              }?>
              
            </span> </p>
               
            

        </div>
        <?php } ?>
        
     
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
      </div>
</section>
<?php } ?>
 
<!-- FAQ -->
<?php
$url_fetch = "course-faqs";
$url = $base_url.$url_fetch;
$faq = api_call_post("POST", $url, $fields);
if(!$faq['Data']==NULL){
?>
<section class="container faqs">
    <h1 class="main-h1">Frequently Asked Question?</h1>
    <div class="parent-container" style="margin-top: 20px;">
        <ul class="faq">
        <?php 
          
          $y=-1;
          foreach ($faq as $key => $value) {
            $y++;
            $faqs = $faq['Data'][$y];
            $faq_ques = $faqs['faqs_ques'];
            $faq_ans = $faqs['faqs_ans'];
            
          
          
          
          ?>

          <li>
            <h3 class="question"><?php echo $faq_ques?>
              <div class="plus-minus-toggle collapsed"></div>
            </h3>
            <div class="answer">Answer. <?php echo $faq_ans?></div>
          </li>
          <?php } ?>
         
        </ul>
      </div>

</section>
<?php } ?>


<section class="container courses-container" style="margin-top: 15px; margin-bottom: 85px;" id="courses">
    <div class=" swiper myswiper">
    <h1 class="main-h1">Top Trending Courses</h1>
   
    
    <div class="course-cards swiper-wrapper">
        <div type="button" class="course-card swiper-slide" data-toggle="tooltip" data-placement="right" >
            <img src="images/course1.png" alt="">
            <p class="course-name">Python For Beginners Full Course</p>
            <p class="course-by">Dr. Alok</p>
            <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> <span class="feedback-course">(20)</span></p>
            <p class="course-price">$200</p>

        </div>
        <div class="course-card swiper-slide">
          <img src="images/course1.png" alt="">
          <p class="course-name">Python For Beginners Full Course</p>
          <p class="course-by">Dr. Alok</p>
          <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> <span class="feedback-course">(20)</span></p>
          <p class="course-price">$200</p>

      </div>
      <div class="course-card swiper-slide">
          <img src="images/course1.png" alt="">
          <p class="course-name">Python For Beginners Full Course</p>
          <p class="course-by">Dr. Alok</p>
          <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> <span class="feedback-course">(20)</span></p>
          <p class="course-price">$200</p>

      </div>
      <div class="course-card swiper-slide">
          <img src="images/course1.png" alt="">
          <p class="course-name">Python For Beginners Full Course</p>
          <p class="course-by">Dr. Alok</p>
          <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> <span class="feedback-course">(20)</span></p>
          <p class="course-price">$200</p>

      </div>
      <div class="course-card swiper-slide">
          <img src="images/course1.png" alt="">
          <p class="course-name">Python For Beginners Full Course</p>
          <p class="course-by">Dr. Alok</p>
          <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> <span class="feedback-course">(20)</span></p>
          <p class="course-price">$200</p>

      </div>
      <div class="course-card swiper-slide">
          <img src="images/course1.png" alt="">
          <p class="course-name">Python For Beginners Full Course</p>
          <p class="course-by">Dr. Alok</p>
          <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> <span class="feedback-course">(20)</span></p>
          <p class="course-price">$200</p>

      </div>
      <div class="course-card swiper-slide">
          <img src="images/course1.png" alt="">
          <p class="course-name">Python For Beginners Full Course</p>
          <p class="course-by">Dr. Alok</p>
          <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> <span class="feedback-course">(20)</span></p>
          <p class="course-price">$200</p>

      </div>
      <div class="course-card swiper-slide">
          <img src="images/course1.png" alt="">
          <p class="course-name">Python For Beginners Full Course</p>
          <p class="course-by">Dr. Alok</p>
          <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> <span class="feedback-course">(20)</span></p>
          <p class="course-price">$200</p>

      </div>
      <div class="course-card swiper-slide">
          <img src="images/course1.png" alt="">
          <p class="course-name">Python For Beginners Full Course</p>
          <p class="course-by">Dr. Alok</p>
          <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> <span class="feedback-course">(20)</span></p>
          <p class="course-price">$200</p>

      </div>
      <div class="course-card swiper-slide">
          <img src="images/course1.png" alt="">
          <p class="course-name">Python For Beginners Full Course</p>
          <p class="course-by">Dr. Alok</p>
          <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> <span class="feedback-course">(20)</span></p>
          <p class="course-price">$200</p>

      </div>
        
      
    </div>
    <div style="width: 5px;" class="swiper-button-next d"></div>
    <div class="swiper-button-prev d"></div>
    <div class="swiper-pagination"></div>
      </div>
</section>

 


  <footer class="footer-main">
      <div class="container footer-up">
          <div class="about-footer">
            <h1 class="main-h1">WorldsQNA</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima mollitia nobis, ipsa ab, sapiente nesciunt quidem officiis commodi explicabo pariatur ullam? Quo fugiat officia ullam accusamus laboriosam ad optio ducimus?</p>
            <div class="social-links">
            <span class="btn btn-primary"><i class="fa-brands fa-facebook"></i></span>
            <span class="btn btn-primary"><i class="fa-brands fa-instagram"></i></span>
            <span class="btn btn-primary"><i class="fa-brands fa-twitter"></i></span>
            <span class="btn btn-primary"><i class="fa-brands fa-linkedin"></i></span>

            </div>
            
            </div>
          
        <div class="footer-quick-links">
            <ul>
                <li><a href="#">Teach on WorldsQNA</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">QNA Forum</a></li>
            </ul>
        </div>
        <div class="footer-quick-links">
            <ul>
                <li><a href="#">Help & Support</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Sitemap</a></li>
            </ul>
        </div>
        <div class="download-app">
            <img src="images/google-download.png" alt="">
            <img src="images/ios-download.png" alt="">

        </div>
        </div>
    <div class="footer-down">
        <div>
            <p>&copy; WorldsQNA. All Rights Reserverd 2022</p>
        </div>

    </div>
    
    

  </footer>
  <script src="js/drop.js"></script>
  
  
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="js/slider.js"></script>
  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/navbar.js"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
 return new bootstrap.Tooltip(tooltipTriggerEl)
})
 </script>
</body>
</html>