<?php 



include('header.php');
$base_url = $_SERVER['base_url'];
if(isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}
else{
    $userid = "anonymous";
}
$keyword = $_GET['keyword'];

$field = array("userid"=>$userid,"keyword"=>$keyword); 


$data=api_call_post("POST","http://localhost:8000/api/v1/search-for-all", $field);


// echo $_SERVER['current_page'];

$allcourses=$data["search"];
// print_r($allcourses);
$array_length = count($allcourses);


?>




  
  <script src="js/navbar.js"></script>
  <script src="js/darkmode.js"></script>


  <section class="container search_results">
    <div class="main-h1">
        <?php echo $array_length ?> Search Results for "<?php echo $keyword?>"
        
    </div>
    <div class="main-section">
    <div class="course-cards blogs " style="margin-top: 20px;">
    <?php $i=-1;
    
    foreach ($allcourses as $key => $value) {
      
      $i++;
      $course_name= $allcourses[$i]['course_name'];
      $course_id=$allcourses[$i]['id'];
      $fields = array(
        "course_id"=>$course_id,
    );
      
      
      
      ?>
    
    
    
              <a  type="button" class="course-card " style="height:370px; margin-right:20px; margin-bottom:20px;" data-toggle="tooltip" data-placement="right" href="course.php?course_id=<?php echo $course_id ?>">
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