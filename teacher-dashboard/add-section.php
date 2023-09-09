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
                            <h2 class="text-black font-w600">Create Course Content</h2>
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
                      <h1>Start Creating Lectures</h1>
                     
                      <hr>
                      <div">
                      <div class="create-course-3-flex flex-md-column">
                      <div class="create-course-3-item-1">
                      <h3>Create Section and Lecture , Assignments and upload contents</h3>
                      <p>Create Section and Lecture , Assignments and upload contents and more just upload it and save it To Learn more how to create and add sections and lectures just click on <b>+ Icon</b> .<br><a href="">Learn More About Creating Lectures</a></p>

                      </div>
                     
                      

                      </div>

                      </div>
                      
                    

                   </div>
                   <div class="text-new">
                      <h3>Section Contains</h3>
                      <p>Every Section Contains Lecture and Every Lecture has material and one assignment.</p>
                  </div>
                   <div style=" padding:20px 30px; ">

                   
                   <div style="border:1px solid silver; padding:20px 30px;background-color:#03f6401c;" class="form- new" action="create-course-form-6.php" method="post" enctype="multipart/form-data" >
                   <div class="text-new" style="display:flex;justify-content:space-between;"><h1>Add Section </h1>
                   <button style="background:none; border:none; margin-top:-30px;" onclick="form_drop()"> <i style="margin-top:-10px;" class="fa-solid fa-caret-down"></i></button>
</div>
                   <div class="tn-buttons mt-3" style="display:flex; align-items:center;justify-content:center;">
                                    <!-- <button type="button" class="mb-xs mr-xs mb-3 btn btn-light addmore">Add Section<i style="margin-left:10px;" class="fa fa-plus"></i></button> -->
                                    <!-- <button type="button" class="mb-xs mr-xs ms-3 mb-3 btn btn-primary removemore">Remove Section<i class="fa fa-remove" style="margin-left:10px;"></i></button> -->
                                </div>
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <?php 

                 
                  
                  if(isset($_GET['section_id'])){
                  $base_url = $_SESSION['base_url'];
                  $url_fetch = "get-section-by-id";
                  $url = $base_url.$url_fetch;
                  $fields = array("section_id"=>$_GET['section_id']);
                  $token = $_SESSION['token'];

                  $section_data = api_call_auth("POST", $url, $fields, $token);
                  
                    $section_no = $section_data['Data'][0]['section_no'];
                    $section_id = $section_data['Data'][0]['id'];
                    $section_title = $section_data['Data'][0]['section_title'];
                    $section_description = $section_data['Data'][0]['section_description'];
                  
                  
                  ?>
                  <div id="section" class="show-0">
                  <form action="update-section-form.php" method="post">
                  <div class="row">
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="section_no" value="<?php echo $section_no;?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">Section No</label>
                  </div>
                  <input type="text" name="course_id" value="<?php echo $_GET['course_id'];?>" hidden>
                  <input type="text" name="section_id" value="<?php echo $section_id;?>" hidden>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="section_title" value="<?php echo $section_title;?>" class="form-control" required />
                    <label class="form-label" for="form6Example3">Section Title</label>
                  </div>

                  <!-- Message input -->
                  <div class="form-outline mb-4">
                    <textarea class="form-control" name="section_description" placeholder="" value="<?php echo $section_description;?>" rows="2" required><?php echo $section_description;?></textarea>
                    <label class="form-label" for="form6Example7">Section Description</label>
                  </div>
                  <!-- <div style="display:flex; align-items:center;justify-content:flex-end; margin-bottom:20px;"><button type="submit" name="save-section" value="submit" class="btn btn-dark btn-rounded">Save</button></div>
                                </div> -->
                 </form>
                  </div><?php }
                              
                              else{
                                ?>
                                
                                
                                <form action="add-section-form.php" method="post" >
                  <div class="row">
                  <div id="section" class="show-0">
                    
                    
                    
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="section_no" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Section No</label>
                  </div>
                  <input type="text" name="course_id" value="<?php echo $_GET['course_id']?>" hidden>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="section_title" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Section Title</label>
                  </div>

                  <!-- Message input -->
                  <div class="form-outline mb-4">
                    <textarea class="form-control" name="section_description" value="" rows="2" required></textarea>
                    <label class="form-label" for="form6Example7">Section Description</label>
                  </div>
                  
                  <!-- <div style="display:flex; align-items:center;justify-content:flex-end; margin-bottom:20px;"><button type="submit"  name="save-section" value="submit" class="btn btn-dark btn-rounded">Save</button>
                </div> -->
                </div>
               
              </form>


              
                                <?php

                              }
                              ?>
                              <script>
                function form_drop(){
                  var new1 = document.getElementById('section');
                  if(new1.classList.contains('show-0')){
                    new1.classList.remove("show-0");
                    new1.classList.add("hide-0");

                  }
                  else{
                    new1.classList.remove("hide-0");
                    new1.classList.add("show-0");

                  }
                  
                  // console.log(new1);
                }
              </script>


                 

                  <!-- Submit button -->
                  <div style="display:flex; align-items:center;justify-content:flex-end; margin-bottom:20px;"><button type="submit" name="submit" value="submit" class="btn btn-primary btn-rounded mt-3">Next</button></div>
                  
</div>
                
                </div>
                
                </div>
                   
                   
                    

</section>




<script src="js/add-section.js"></script>
<script src="js/add-lecture.js"></script>
<script src="js/add-question.js"></script>






<?php

include('backtotop.php');



include('footer.php');






?>




