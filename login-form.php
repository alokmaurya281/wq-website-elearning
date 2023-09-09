<?php 
include('api.php');



$url = "http://localhost:8000/api/v1/auth/login";



  $data  = api_call_post("POST", $url, $_POST);


  if($data["status"]=="success"){
      $_SESSION['email'] = $_POST["email"];
      $_SESSION['token'] = $data["token"];
      $_SESSION['type'] = $data["type"];
      if($_SESSION['type']=='students'){
        if(isset($_POST['prev'])){
            $redirect_url = $_POST['prev'];
        }
        else{
            $redirect_url = "/website/stu-dashboard/index.php";
        }
          header("Location:http://localhost$redirect_url");
      }
      else{
        if(isset($_POST['prev'])){
            $redirect_url = $_POST['prev'];
        }
        else{
            $redirect_url = "/website/teacher-dashboard/index.php";
        }
          header("Location:http://localhost$redirect_url");

      }
      

  }
  else{
      echo "<script>alert('password or username is incorrect');window.location.assign('login.php')</script>;";
  }
  // if(isset($data['message'])){
  //     echo "<div class='alert alert-danger alert-dismissible'>
  //     <button type='button' class='close' style='border:none' data-dismiss='alert' aria-hidden='true'>&times;</button>
  //     <h1 class='main-h1'><i class='icon fa fa-check'></i> Alert!</h1>
  //     ". $data['message']."
  //   </div>";
  // }
  
  ?>