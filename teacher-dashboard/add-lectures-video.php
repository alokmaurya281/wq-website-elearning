<?php 
include('api.php');

include('check-login.php');
include('head.php');
include('sidebar.php');
error_reporting(0);
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
                        <a href="javascript:history.go(-1)" class="btn btn-primary rounded light me-3">Go Back</a>
                        <!--

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
                      <p style="margin-bottom:-20px;">Create Section and Lecture , Assignments and upload contents and more just upload it and save it To Learn more how to create and add sections and lectures just click on <b>+ Icon</b> .<br><a href="">Learn More About Creating Lectures</a></p>

                      </div>

                      
                     
                      

                      </div>

                      </div>
                      
                    

                   </div>
                   <div class="text-new">
                      <h3>Section Contains</h3>
                      <p>Every Section Contains Lecture and Every Lecture has material and one assignment.</p>
                  </div>
                  <div class="text-new">

                 <h3>If you want to add more section create new section.</h3>
                  <a href="add-section.php?course_id=<?php echo $_GET['course_id']?>" class=" mt-2 btn btn-primary rounded light me-3">Create New Section</a> </div>
                   <div style=" padding:20px 30px; ">

                   
                   <div style="border:1px solid silver; padding:20px 30px;background-color:#03f6401c;" class="form- new" action="create-course-form-6.php" method="post" enctype="multipart/form-data" >
                   <div class="text-new" style="display:flex;justify-content:space-between;"><h1>Section </h1>
                   <button style="background:none; border:none; margin-top:-30px;" onclick="form_drop()"> <i style="margin-top:-10px;" class="fa-solid fa-caret-down"></i></button>
</div>
                   <div class="tn-buttons mt-3" style="display:flex; align-items:center;justify-content:center;">
                                   
                                </div>
                 
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
                  <div style="display:flex; align-items:center;justify-content:flex-end; margin-bottom:20px;"><button type="submit" name="save-section" value="submit" class="btn btn-dark btn-rounded">Save</button></div>
                                </div>
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
                  
                  <div style="display:flex; align-items:center;justify-content:flex-end; margin-bottom:20px;"><button type="submit"  name="save-section" value="submit" class="btn btn-dark btn-rounded">Save</button>
                </div>
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

<div class="text-new" style="display:flex;justify-content:space-between;"><h1>Lecture </h1>
                   <button style="background:none; border:none; margin-top:-30px;" onclick="form_drop_lecture()"> <i style="margin-top:-10px;" class="fa-solid fa-caret-down"></i></button>
</div>


<?php

                   $token= $_SESSION['token'];
                   $base_url = $_SESSION['base_url'];
                    $url_fetch = "get-course-lectures-by-course-id-and-section-id";
                    $url = $base_url.$url_fetch;
                    $fields = array('course_id'=>$_GET['course_id'],'section_id'=>$_GET['section_id']);
                   $lectures = api_call_auth("POST", $url , $fields, $token);
                   $status = $lectures['status'];
                   
                //    print_r($lectures);
                   if(!$lectures['Data']==null){
                       ?>
                       
                       <h3 style="font-weight:600; font-size:22px;">Uploaded Lectures for Section No. <?php echo $section_no?></h3><?php
                    // print_r($lectures['Data'][2]);
                    $array_length = count($lectures['Data']);
                    // echo $array_length;

                       $i=-1;
                   foreach ($lectures['Data'] as $key => $value) {
                       $i++;
                    //    print_r( $i);
                       $lecture_name=$lectures['Data'][$i]['lecture_name'];
                       $lecture_id=$lectures['Data'][$i]['id'];
                       $lecture_number=$lectures['Data'][$i]['lecture_number'];
                       $lecture_long_description=$lectures['Data'][$i]['lecture_long_description'];
                       
                    
                   
                       
                   
                  ?>
                  
                  
<div class="card-teacher-course card w-100 p-2 mt-3 mb-5">
  <div class="card-body">
    <h3 style="font-weight:600; font-size:22px;"></h3>
    <div class="show-link mb-3">
    
    <a href="update-lecture.php?lecture_id=<?php echo $lecture_id ?>" class="btn btn-primary ms-2">Update lecture </a>
    <a href="delete-lecture.php?lecture_id=<?php echo $lecture_id ?>" class="btn btn-primary ms-2">Delete lecture </a>

    </div>
    <p class="card-text"> Lecture No - <?php echo $lecture_number?></p>
    <p class="card-text"> Lecture Title - <?php echo $lecture_name?></p>
    <p class="card-text"> Lecture Description - <?php echo $lecture_long_description?></p>
    <!-- <p class="card-text">Language - <?php echo $language?></p> -->
    <!-- <p class="card-text">Status - <b><?php echo $status?></b></p> -->
    <a href="view-course-content.php?course_id=<?php echo $_GET['course_id']?>" class="btn btn-primary">View Lecture</a>
  </div>

</div>
<?php }}?>


              
<!-- <div class="ratio ratio-16x9"id="view-setup-video">

  <iframe style="border-radius:10px;"  width="885" height="498" src="https://www.youtube.com/embed/<?php echo $video_id?>" title="<?php echo $title?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <video src="<"></video>
</div> -->
                  <!-- <?php
                //    }}
                   
                //    else{

                //    }
                     ?> -->



<div class="lec">
<form class="lec" action="add-lectures-form.php" method="post" style="border:1px solid silver; padding:20px 30px;" enctype="multipart/form-data">
                                <div class="tn1-buttons mt-3" style="display:flex; align-items:center;justify-content:center;">
                                    <button type="button" class="mb-xs mr-xs mb-3 btn btn-light addmorel">Add Lecture<i style="margin-left:10px;" class="fa fa-plus"></i></button>
                                    <!-- <button type="button" class="mb-xs mr-xs ms-3 mb-3 btn btn-light removemorel">Remove Lecture<i class="fa fa-remove" style="margin-left:10px;"></i></button> -->
                                </div>
                                <div class="show-0" id="lecture">
                                <div class="form-outline form-dark mb-4">
                    <input type="text" name="lecture_no" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Lecture No</label>
                  </div>
                                <div class="form-outline form-dark mb-4">
                    <input type="text" name="title" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Lecture Title</label>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="customFile">Lecture Thumbnail</label>
                    <input type="file" name="lecture_image"  class="form-control"  required />
                  </div> 
                  <input type="text" name="course_id" value="<?php echo $_GET['course_id'] ?>" hidden>
                  <input type="text" name="section_id" value="<?php echo $_GET['section_id'] ?>" hidden>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="customFile">Lecture Video</label>
                    <input type="file" name="video"  class="form-control"  required />
                  </div> 
                                <div class="form-outline mb-4">
                    <textarea class="form-control" name="description" value="" rows="2" required></textarea>
                    <label class="form-label" for="form6Example7">Lecture Description</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="material_title" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Material Title</label>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="customFile">Lecture Material File</label>
                    <input type="file" name="material_file"  class="form-control"  required />
                  </div> 
                                <div class="form-outline mb-4">
                    <textarea class="form-control" name="material_short_description" value="" rows="2" required></textarea>
                    <label class="form-label" for="form6Example7">Material Description(Max:150 words)</label>
                  </div>

                  <div class="ass">
                  <div class="show-0" id="assignment">
<div class="ass" style="border:1px solid silver; padding:20px 30px;">
                                <div class="tn2-buttons mt-3" style="display:flex; align-items:center;justify-content:center;">
                                    <button type="button" class="mb-xs mr-xs mb-3 btn btn-light addmoreq">Add Question<i style="margin-left:10px;" class="fa fa-plus"></i></button>
                                    <!-- <button type="button" class="mb-xs mr-xs ms-3 mb-3 btn btn-light removemoreq">Remove Lecture<i class="fa fa-remove" style="margin-left:10px;"></i></button> -->
                                </div>
                                <div class="form-outline form-dark mb-4">
                    <input type="text" name="assignment_ques[]" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Question </label>
                  </div>
                  
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="assignment_ans[]" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Answer</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="option1[]" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Option1</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="option2[]" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Option2</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="option3[]" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Option3</label>
                  </div>
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="option4[]" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Option4</label>
                  </div>
                 
                  <div id="question">
</div>
              </div>

            </div>

                  </div>





                  <div style="display:flex; align-items:center;justify-content:flex-end; margin-bottom:20px;"><button type="submit" name="submit" value="submit" class="btn btn-dark btn-rounded">Save</button></div>
                  </div>  
              </form>       


</div>
                </div>

  <!-- <div class="create-course-3-item-2 mt-4 " style="margin-left:-10px; ">
                      <h3>Have You added All Contents</h3>
                      <p>Click Below To Full Course Content Including All Sections, Lectures , Course Materials And Assignments And Projects</p>
                      <a href="view-course-contents.php?course_id=<?php echo $_GET['course_id']?>" class="btn btn-primary rounded light me-3">View Contents</a>

                      </div> -->
<div style="display:flex; align-items:center;justify-content:center;"><a href="create-course-7.php?course_id=<?php echo $_GET['course_id'] ?>" class="btn btn-primary rounded light me-3 mt-3">Next</a></div>                 
                    

</section>


<script>
                function form_drop_lecture(){
                  var new1 = document.getElementById('lecture');
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
              <script>
                function form_drop_lecture_assignment(){
                  var new1 = document.getElementById('assignment');
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




<script src="js/add-section.js"></script>
<script src="js/add-lecture.js"></script>
<script src="js/add-question.js"></script>






<?php

include('backtotop.php');



include('footer.php');






?>




