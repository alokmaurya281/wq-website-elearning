<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorldsQNA - Online Learning Platformfor All</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://unpkg.com/headroom.js"></script>

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
</head>
<body>
    <header class="headroom">
    <nav class=" headroom navbar sticky-top navbar-expand-lg navbar-light ">
        <div >
        <a href="#"  class="navbar-brand text-black" >
                  WorldsQNA
              </a>
        </div>
        <div class="dropdown me-1">
            <button class=" drop dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <form class="d-flex width-100" role="search" >
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="font-size: 14px!important;">
                    <button class="btn btn-outline-success" type="submit" style="font-size: 14px!important;">Search</button>
                  </form>
                    <ul id="mainNav" class="navbar-nav ml-auto" >
                        
                        <li class="nav-item "><a class="nav-link active" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#courses">Courses</a></li>
                        <li class="nav-item"><a class="nav-link" href="#teachonwq">Teach on WorldsQNA</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                        <li class="nav-item" style="display: flex;"> <a class="btn  btn-primary nav-btn" style="margin-top:4px; margin-right: 5px; width: 120px; background-color: aliceblue;" href="login.php">Login</a>
                        <a class="btn  btn-primary nav-btn" style="margin-top:4px; width: 120px;  " href="signup.php">Sign Up</a></li>
                    
                    </ul>
                    <!-- <div class="switch">Dark mode:              
                        <span class="inner-switch">OFF</span>
                    </div> -->
             </div>
  </nav> 
</header>
  <script src="js/navbar.js"></script>
  <script src="js/darkmode.js"></script>
  <?php 
  include('api.php');
  error_reporting(0);

$url = "http://localhost:8000/api/v1/auth/register";



  $data  = api_call_post("POST", $url, $_POST);


  if($data["status"]=="success"){
      header("Location:login.php");
  }
  
  ?>
 
<section class="container">
    <div class=" login signup">
        <h1 class="main-h1">Create an account</h1>
        <form action="" class="login-form" method="post">
            <div class="social-login">
                <p>Continue with</p>
                <div class="social">
                    <span class=" f"> <a href="f"><i class="fa-brands fa-facebook"></i></a></span>
                    <span class=" g"><a href="g"><i class="fa-brands fa-google"></i></a></span>
                    
                </div>
            </div>
            <label for="name"><i class="fa-solid fa-user"></i>Name</label>
            <input type="text" name="name" id="" value="">
            <label for="email"><i class="fa-solid fa-envelope"></i>Email</label>
            <input type="email" name="email" id="" value="">
            <label for=""><i class="fa-solid fa-lock"></i>Password</label>
            <input type="password" name = "password" value="">
            <label for=""><i class="fa-solid fa-lock"></i>Confirm Password</label>
            <input type="password" value="" name="password_confirmation">
            <label for="role">Select Type</label>
            <select name="role_id" id="">
                <option value="1">Student</option>
                <option value="2">Teacher</option>
            </select>
            <div >
                <input type="checkbox" required>
            <label style="display: contents;" for="">By Signing Up you are agree to the terms and conditions.</label>
            </div>
            
            
            <button class="btn btn-primary mt-1" type="submit" name="submit">Signup</button>
            <div class="signup-link s">
                <p>Already Have an account? <a href="login.php">Login Now</a></p>
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