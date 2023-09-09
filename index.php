<?php 



include('header.php');



// echo $_SESSION['current_page'];

// include('api.php');
$base_url = $_SERVER['base_url'];
$data=api_call_get("GET","http://localhost:8000/api/v1/courses");


// echo $_SERVER['current_page'];

$allcourses=$data["Data"];
$array_length = count($allcourses);


?>




  
  <script src="js/navbar.js"></script>
  <script src="js/darkmode.js"></script>
 
  
  <section class="container hero" id="home">
      <div class="hero-text">
          <h1>The Smart Way To Learn Anything!</h1>
          <p>Want to Learn New things about Technology Just Enroll to our courses that are affordable and with lifetime access.</p>
          <a type="button" class="btn btn-primary"href="#">View Courses</a>
      </div>
      <div class="hero-image">
          <img src="images/hero-image.gif" alt="">
      </div>
  </section>
  <section class="container skill" style="margin-top: 45px; margin-bottom: 85px;">
      <div class="skills-learn">
        <i class="fa-solid fa-play"></i>
        <span>Learn in demand Skills over thousands of courses</span>
      </div>
      <div>
        <i class="fa-solid fa-star"></i>
          <span>Choose courses taught by real-world experts</span>
      </div>
      <div>
        <i class="fa-solid fa-certificate"></i>
        Learn at your own pace, with lifetime access on mobile and desktop
      </div>
  </section>


  <section class="container courses-container" style="margin-top: 15px; margin-bottom: 85px;" id="courses">
      <div class=" swiper myswiper">
      <h1 class="main-h1">Available Courses</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="course-cards swiper-wrapper">
     <?php $i=-1;
    
foreach ($allcourses as $key => $value) {
  
  $i++;
  $course_name= $allcourses[$i]['course_name'];
  $course_id=$allcourses[$i]['id'];
  $fields = array(
    "course_id"=>$course_id,
);
  
  
  
  ?>



          <a  type="button" class="course-card swiper-slide" style="height:370px;" data-toggle="tooltip" data-placement="right" href="course.php?course_id=<?php echo $course_id ?>">
              <img src="http://localhost:8000/storage/<?php echo $allcourses[$i]['course_feature_image'];?>" alt="">
              <p class="course-name"><?php echo substr($allcourses[$i]['course_name'], 0, 25);?></p>
              <p class="course-by">Dr. Alok</p>
              <p class="rating"><span>
              <?php 
          
          $url_fetch = "avg-course-ratings";
          $url = $base_url.$url_fetch;
          $fields = array('course_id'=>$course_id);
          
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
               </span> <span class="feedback-course">(<?php echo $total_feedback?>)</span></p>
              <p class="course-price">Rs. <?php echo $allcourses[$i]['course_price']?></p>

          </a>
   <?php       
  
}?>
          
         
        
      </div>
      <div style="width: 5px;" class="swiper-button-next d"></div>
      <div class="swiper-button-prev d"></div> </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
     
     
      <!-- <div class="swiper-pagination"></div>  -->
        </div>
  </section> 







  <section class="container instructor" id="teachonwq" style="margin-top: 15px; margin-bottom: 85px;">
      <div class="image-instructor">
          <img src="images/instructor.jpg" alt="">
      </div>
      <div class="text-instructor">
          <h1 class="main-h1">
            Become an Instructor/Teacher
          </h1>
          <p>Instructors from around the world teach millions of students on WorldsQNA. We provide the tools and skills to teach what you love.</p>
          <a type="button" class="btn btn-primary"href="login.php<?php echo $prev?>">Start Today</a>
      </div>

  </section>
  <section class="container instructor education-mobile" style="margin-top: 15px; margin-bottom: 85px;">
    <div class="image-instructor">
        <img src="images/education-mobile.gif" alt="">
    </div>
    <div class="text-instructor">
        <h1 class="main-h1">
          Transform Your Life Through Education
        </h1>
        <p>Learners around the world are launching new careers, advancing in their fields, and enriching their lives.</p>
        <a type="button" class="btn btn-primary"href="#">Find How</a>
    </div>

</section>
<!-- <section class="container">
    <h1 class="main-h1">Top Categories</h1>
    <div class="categories-cards">
        <div class="category-card">
            <img src="images/django-python-angular-1.png" alt="">
            <h3>Category Name</h3>
        </div>
    </div>

</section> -->
<section class="container" style="margin-top: 15px; margin-bottom: 85px;" id="contact">
    <h1 class="main-h1">Contact Us</h1>
    
    <div class="contact-details" >
        <div class="c">
       <p><i class="fa-solid fa-envelope"></i>Email:<a href="mailto:worldsqna@gmail.com">worldsqna@gmail.com</a></p> 
      <p><i class="fa-solid fa-phone"></i>Mobile: <a href="tel:7071994439">7071994439</a></p> 
    </div>
    
    <div class="contact">
        <h1 class="main-h1">Contact Form</h1>
        <form action="" method="post" class="contactform">
            <label for="name">Name</label>
            <input type="text"class="form-control" >
            <label for="email">Email</label>
            <input type="email" name="" class="form-control"  id="">
            <label for="message">Message</label>
            <textarea name="" id="" cols="30" rows="3" class="form-control" ></textarea>
            <input style="margin-top:10px ;"  class="btn btn-primary" type="button" value="Submit">
        </form>

    </div>
</div>
</section>

<!-- Students feedback -->
<section class="container  courses-container" style="margin-top: 15px; margin-bottom: 85px;">
    <div class=" swiper myswiper">
    <h1 class="main-h1" style=" margin-bottom: 20px;">Students feedback</h1>
    
    <div class="course-cards  swiper-wrapper" style="margin-top: 20px;">
        <div style="height:410px" type="button" class="course-card swiper-slide students" data-toggle="tooltip" data-placement="right" >
            <img class="stu-image" src="images/course1.png" alt="">
            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi suscipit quaerat maxime reiciendis ad, numquam deserunt quisquam ratione hic voluptatum, </p>
            <p class="course-by"> Alok Maurya</p>
            <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> </p>
            

        </div>
        <div type="button" class="course-card swiper-slide students" data-toggle="tooltip" data-placement="right" >
            <img class="stu-image" src="images/f1.jpg" alt="">
            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi suscipit quaerat maxime reiciendis ad, numquam deserunt quisquam ratione hic voluptatum, </p>
            <p class="course-by"> Alok Maurya</p>
            <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> </p>
            

        </div>
        <div type="button" class="course-card swiper-slide students" data-toggle="tooltip" data-placement="right" >
            <img class="stu-image" src="images/f1.jpg" alt="">
            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi suscipit quaerat maxime reiciendis ad, numquam deserunt quisquam ratione hic voluptatum, </p>
            <p class="course-by"> Alok Maurya</p>
            <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> </p>
            

        </div>
        <div type="button" class="course-card swiper-slide students" data-toggle="tooltip" data-placement="right" >
            <img class="stu-image" src="images/f1.jpg" alt="">
            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi suscipit quaerat maxime reiciendis ad, numquam deserunt quisquam ratione hic voluptatum, </p>
            <p class="course-by"> Alok Maurya</p>
            <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> </p>
            

        </div>
        <div type="button" class="course-card swiper-slide students" data-toggle="tooltip" data-placement="right" >
            <img class="stu-image" src="images/f1.jpg" alt="">
            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi suscipit quaerat maxime reiciendis ad, numquam deserunt quisquam ratione hic voluptatum, </p>
            <p class="course-by"> Alok Maurya</p>
            <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> </p>
            

        </div>
        <div type="button" class="course-card swiper-slide students" data-toggle="tooltip" data-placement="right" >
            <img class="stu-image" src="images/f1.jpg" alt="">
            <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi suscipit quaerat maxime reiciendis ad, numquam deserunt quisquam ratione hic voluptatum, </p>
            <p class="course-by"> Alok Maurya</p>
            <p class="rating"><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> </span> </p>
            

        </div>
        
     
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
      </div>
</section>
<section class="container" style="margin-top: 15px; margin-bottom: 85px;">
    <h1 class="main-h1">Latest Blog Posts</h1>
    <div class="blog-section">
        <div class="course-cards blogs " style="margin-top: 20px;">
            <div type="button" class="course-card blog  students" data-toggle="tooltip" data-placement="right" >
                <img class="blog-feature-image" src="images/course1.png" alt="">
                <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi suscipit quaerat maxime reiciendis ad, numquam deserunt quisquam ratione hic voluptatum, </p>
                <p class="course-by"> By - Alok Maurya</p>
          
            </div>
            <div type="button" class="course-card blog  students" data-toggle="tooltip" data-placement="right" >
                <img class="blog-feature-image" src="images/course1.png" alt="">
                <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi suscipit quaerat maxime reiciendis ad, numquam deserunt quisquam ratione hic voluptatum, </p>
                <p class="course-by"> By - Alok Maurya</p>
          
            </div>
            <div type="button" class="course-card blog  students" data-toggle="tooltip" data-placement="right" >
                <img class="blog-feature-image" src="images/course1.png" alt="">
                <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi suscipit quaerat maxime reiciendis ad, numquam deserunt quisquam ratione hic voluptatum, </p>
                <p class="course-by"> By - Alok Maurya</p>
          
            </div>
        </div>
        
            

    </div>
    <div style="display: flex; justify-content: center; align-items: center;">
            <a type="button" class="btn btn-primary"href="#blog">View More</a>

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
  
  <script src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
  <script src="js/headroom.js"></script>
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