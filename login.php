<?php 


include('header.php');



?>


  <script src="js/navbar.js"></script>
  <script src="js/darkmode.js"></script>
 
<section class="container">
    <div class=" login">
    <?php 
  
//   if ( isset($_GET['success']) && $_GET['success'] == 1 )
// {
//      echo "<div class='alert alert-success alert-dismissible'>
//      <button type='button' class='close' style='border:none' data-dismiss='alert' aria-hidden='true'>&times;</button>
//      <h1 class='main-h1'><i class='icon fa fa-check'></i> Alert!</h1>
//      Account Created successfully
//    </div>";


// }?>



 
        <h1 class="main-h1">Login to your account</h1>
        <form action="login-form.php" class="login-form" method="post">
            <div class="social-login">
                <p>Continue with</p>
                <div class="social">
                    <span class=" f"> <a href="f"><i class="fa-brands fa-facebook"></i></a></span>
                    <span class=" g"><a href="g"><i class="fa-brands fa-google"></i></a></span>
                    
                </div>
            </div>
            <label for="email"><i class="fa-solid fa-envelope"></i>Email</label>
            <input type="email" name="email" id="" required>
            <label for=""><i class="fa-solid fa-lock"></i>Password</label>
            <input type="password" name="password" value="" required>
            <?php if(isset($_GET['prev'])){
  $redirect_url = $_GET['prev'];

?>
            <input type="text" name="prev" value="<?php echo $redirect_url;?>" hidden>
            <?php } ?>
            <button class="btn btn-primary mt-1" type="submit">Login</button>
            <div class="forgot-pass">
                <p> <a href="/forgot-password.html">Forgot Password</a></p>
            </div>
            <div class="signup-link">
                <p>Don't Have an account? <a href="signup.html">Create Account</a></p>
            </div>
            
        </form>
        

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