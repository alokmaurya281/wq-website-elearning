<?php 
include('api.php');

include('check-login.php');
include('head.php');
include('sidebar.php');



?>


<section>
                    <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start" style="background-color:white; padding:30px; border-radius:10px; margin-bottom:30px;">
                        <div class="me-auto  d-lg-block">
                            <h2 class="text-black font-w600">Create Course</h2>
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
                   
                    <form class="form-" action="create-course-form1.php" method="post" enctype="multipart/form-data">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="course_name" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Course Name</label>
                  </div>
      
                  
                   <div class="form-outline mb-4">
                    <label class="form-label" for="customFile">Course Feature Image</label>
                    <input type="file" name="course_feature_image"  class="form-control"  required />
                  </div> 
                 
                  

                  <!-- Message input -->
                  <div class="form-outline mb-4">
                    <textarea class="form-control" name="course_short_description" value="" rows="2" required></textarea>
                    <label class="form-label" for="form6Example7">Short Description</label>
                  </div>
                  <div class="form-outline mb-4">
                    <textarea class="form-control" name="course_long_description" value="" rows="4" required></textarea>
                    <label class="form-label" for="form6Example7">Long Description</label>
                  </div>
                  <!-- <div class="form-outline form-dark mb-4"> -->
                    <input type="text" name="course_price" value="0.00" class="form-control" hidden/>
                    <!-- <label class="form-label" for="form6Example3">Course Price</label> -->
                  </div>
                  <input type="text" name="teacher_id" value="<?php echo $_SESSION['teacher_id']  ?>" class="form-control" hidden/>
                  <div class="form-outline form-dark mb-4">
                  <label class="form-label" for="form6Example3">Course Language</label>
                    <select  name="course_language"  class="form-control"  style="border:1px solid silver" required>
                    <option selected>Select Language</option>
                    
                        <option value="English">English</option>
                        <option value="Hindi">Hindi</option>
                    </select>
                   
                  </div>
                  <?php 
                  $base_url = $_SESSION['base_url'];
                  $url_fetch = "categories";
                  $url = $base_url.$url_fetch;
$data = api_call_get("GET", $url);
$categories=$data["Data"];
$array_length = count($categories);


                  ?>
                  <div class="form-outline form-dark mb-4">
                  <label class="form-label" for="form6Example3">Course Category</label>
                    <select  name="category_id"  class="form-control"  style="border:1px solid silver" required>
                    <option selected>Select category</option>
                    <?php  $i=-1;
    
    foreach ($categories as $key => $value) {
      
      $i++;
 ?>    
                    
                        <option value="<?php echo $categories[$i]['id']?>"><?php echo $categories[$i]['category_name'] ?></option>
                        <?php }?>
                    </select>
                   
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