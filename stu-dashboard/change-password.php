<?php 
include('api.php');

include('check-login.php');
include('head.php');
include('sidebar.php');




?>


<section>
                    <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start" style="background-color:white; padding:30px; border-radius:10px; margin-bottom:30px;">
                        <div class="me-auto  d-lg-block">
                            <h2 class="text-black font-w600">Change Password</h2>
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
                      <h1>Change Your Password</h1>
                     
                      <hr>
                    
                    

                   </div>

                     
                   <form class="form-" action="change-password-form.php" method="post" enctype="multipart/form-data">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                  <div class="form-outline form-dark mb-4">
                    <input type="password" name="old_password" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Old Password</label>
                  </div>
                  <input type="text" name="userid" value="<?php echo $_SESSION['userid']?>" hidden>
                 
                  
                  <div class="form-outline form-dark mb-4">
                    <input type="password" name="password" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">New Password</label>
                  </div>
      
                  

                 
                 
                 
                  <input type="text" name="teacher_id" value="<?php echo $_SESSION['teacher_id']  ?>" class="form-control" hidden/>
                 


                  <!-- Submit button -->
                  <div style="display:flex; align-items:center;justify-content:center;"><button type="submit" name="submit" value="submit" class="btn btn-primary btn-rounded">Change</button></div>
                  
                </form>
                   

                   
                

                  <!-- Submit button -->
                  
                
                
                
                </div>
                   
                   
                    

</section>



<?php

include('backtotop.php');



include('footer.php');






?>




