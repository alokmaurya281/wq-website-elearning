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
                            <h2 class="text-black font-w600">Add Lectures to Course</h2>
                            <p class="mb-0">Welcome <?php echo $_SESSION['name'];?></p>
                        </div>
                        <?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>
                        <a href="<?php echo $actual_link?>" class="btn btn-primary rounded light me-3">Refresh</a>
                        <!-- <a href="update_property_details.php" class="btn btn-primary rounded light me-3">Update</a>

                        <a href="javascript:void(0);" class="btn btn-primary rounded"><i class="fas fa-cog me-0"></i></a> -->
                    </div>
                    <div style=" padding:40px; border-radius:10px; margin-right:auto; margin-left:auto; width:75%">
<style>
  .active{
    color:#828282!important;
  }
</style>
                   
                    <form class="form-" action="create-course-form.php" method="post" enctype="multipart/form-data">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="course_name" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Total Lectures</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="course_name" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Total Video Hours Of  Lectures</label>
                  </div>


                  <!-- Submit button -->
                  <div style="display:flex; align-items:center;justify-content:center;"><button type="submit" name="submit" value="submit" class="btn btn-primary btn-rounded">Submit</button></div>
                  
                </form>
                </div>
                   
                    

</section>





<?php

include('backtotop.php');



include('footer.php');



?>