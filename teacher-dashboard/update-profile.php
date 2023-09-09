<?php 
include('api.php');

include('check-login.php');
include('head.php');
include('sidebar.php');




?>


<section>
                    <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start" style="background-color:white; padding:30px; border-radius:10px; margin-bottom:30px;">
                        <div class="me-auto  d-lg-block">
                            <h2 class="text-black font-w600">Update Your Profile</h2>
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
                      <h1>Update Profile Details</h1>
                     
                      <hr>
                    
                    

                   </div>
                   <?php 
              
$base_url = $_SESSION['base_url'];
$url_fetch = "get-user-details";
$url = $base_url.$url_fetch;
$fields = array('userid'=>$_SESSION['userid']);
$token = $_SESSION['token'];
$new = api_call_auth("POST", $url, $fields, $token);
// print_r($new);
if(!$new['message']==NULL){
    $name  = $new['message'][0]['name'];
    $profile_image = $new['message'][0]['profile_image'];
    $address = $new['message'][0]['address'];
    $about = $new['message'][0]['about'];
    $dob  = $new['message'][0]['dob'];
    $city  = $new['message'][0]['city'];
    $state  = $new['message'][0]['state'];
    $pincode  = $new['message'][0]['pincode'];
    $country  = $new['message'][0]['country'];
    $phone  = $new['message'][0]['phone'];
    $email  = $new['message'][0]['email'];

}
                ?>

                     
                   <form class="form-" action="update-profile-form.php" method="post" enctype="multipart/form-data">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="name" value="<?php echo $name?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">Name</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="number" name="phone" value="<?php echo $phone?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">Phone</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="date" name="dob" value="<?php echo $dob?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">DOB</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="address" value="<?php echo $address ?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">Full address</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="city" value="<?php echo $city?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">City</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="number" name="pincode" value="<?php echo $pincode?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">Pincode</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="state" value="<?php echo $state?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">State</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="country" value="<?php echo $country?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">Country</label>
                  </div>
      
                  

                  <!-- Message input -->
                  <div class="form-outline mb-4">
                    <textarea class="form-control" name="about" value="" rows="2" required><?php echo $about?></textarea>
                    <label class="form-label" for="form6Example7">About Us</label>
                  </div>

                  <input type="text" name="userid" value="<?php echo $_SESSION['userid'];  ?>" class="form-control" hidden/>
                  <div class="text-new" style="display:flex; flex-direction:row;justify-content:space-between; height:100px;">
                    <div><h3>Want To Update Profile Image</h3>
                    <p><a href="update-profile-image.php">Update Profile Image</a></p></div>
                    <div class="image">
                      <img style="width:100px; height:100px; border-radius:50%;" src="http://localhost:8000/storage/<?php echo $profile_image?>" alt="">
                    </div>
                    
                  </div>
                  


                  <!-- Submit button -->
                  <div style="display:flex; align-items:center;justify-content:center;"><button type="submit" name="submit" value="submit" class="btn btn-primary btn-rounded">Update</button></div>
                  
                </form>
                   

                   
                

                  <!-- Submit button -->
                  
                
                
                
                </div>
                   
                   
                    

</section>



<?php

include('backtotop.php');



include('footer.php');






?>




