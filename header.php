<?php 
// error_reporting(0);
include('api.php');
$prev='?prev='.urlencode($_SERVER['REQUEST_URI']).'';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorldsQNA - Online Learning Platform for All</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <script src="https://unpkg.com/headroom.js"></script> -->

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
</head>
<body>
  
<header class="sticky-top">
    <nav class="  navbar sticky-top navbar-expand-lg navbar-light ">
        <div >
        <a href="#"  class="navbar-brand text-black" >
                  WQ Learning
              </a>
        </div>
        <div class="dropdown me-1">
            <button class=" drop dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </button>
            <div style="font-size: 14px!important;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php $data = api_call_get("GET","http://localhost:8000/api/v1/categories" ) ;
            $categories = $data["Data"];
            $i=-1;
            foreach ($categories as $key => $value) {
              
              $i++;
              $category_name= $categories[$i]['category_name'];
            
            
            ?>
              <a class="dropdown-item" id="<?php echo $categories[$i]['id']?>" href="course_category_filter.php?category=<?php echo $categories[$i]['category_name']?>"><?php echo $categories[$i]['category_name']?></a>
              
            <?php } ?>
            </div>
          </div>
        
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <form action="search.php" method="post" class="d-flex width-100" role="search" >
                    <input class="form-control me-2" type="search" name="keyword" value="" placeholder="Search" aria-label="Search" style="font-size: 14px!important;">
                    <button class="btn btn-outline-success" type="submit" name="search" style="font-size: 14px!important;">Search</button>
                  </form>
                    <ul id="mainNav" class="navbar-nav ml-auto" >
                        
                        
                        <li class="nav-item " ><a class="nav-link active" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#courses">Courses</a></li>
                        <li class="nav-item"><a class="nav-link" href="#teachonwq">Teach on WorldsQNA</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                        <?php
                        // include('teacher-dashboard/check-login.php');
                        // echo $_SESSION['userid'];

                        if(!$_SESSION['token']==null){
                         
                          $fields = array('userid'=>$_SESSION['userid']);
                          $data = api_call_auth("POST","http://localhost:8000/api/v1/get-user-details", $fields, $_SESSION['token'] ) ;
                          // print_r($data);
                          $profile_image = $data['message'][0]['profile_image'];
                          $name = $data['message'][0]['name'];
                          
                          
                          
                          ?>
                          

<div class="dropdown me-1" >
            <button class=" drop dropdown-toggle mt-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img style="width:40px; height:40px; border-radius:50%;" src="http://localhost:8000/storage/<?php echo $profile_image?>" alt="">
            </button>
            <div style="font-size: 14px!important;margin-left:-110px!important;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" id="" href="teacher-dashboard/update-profile.php">Edit Profile</a>
            <a class="dropdown-item" id="" href="teacher-dashboard/my-profile.php">My Profile</a>
            <a class="dropdown-item" id="" href="teacher-dashboard/change-password.php">Change Password</a>
            <a class="dropdown-item" id="" href="teacher-dashboard/logout.php">Logout</a>

           
              
            </div>
          </div>
          <?php }
          else{ ?>
                        <li class="nav-item" style="display: flex;"> <a class="btn  btn-primary nav-btn" style="margin-top:4px; margin-right: 5px; width: 120px; background-color: aliceblue;" href="login.php">Login</a>
                        <a class="btn  btn-primary nav-btn" style="margin-top:4px; width: 120px;  " href="signup.php">Sign Up</a></li><?php }?>
                    
                    </ul>
                    <!-- <div class="switch">Dark mode:              
                        <span class="inner-switch">OFF</span>
                    </div> -->
             </div>
  </nav> 
</header>