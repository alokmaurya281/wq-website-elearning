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
                            <h2 class="text-black font-w600">Course Details</h2>
                            <p class="mb-0">Welcome <?php echo $_SESSION['name'];?></p>
                        </div>
                        <?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>
                        <a href="<?php echo $actual_link?>" class="btn btn-primary rounded light me-3">Refresh</a>
                        <a href="javascript:history.go(-1)" class="btn btn-primary rounded light me-3">Go Back</a>
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
                      <h1>Course Content</h1>
                     
                      <hr>
                     </div>   
                      <div class="main-section-content mb-3" >
                      <div style="display:flex;justify-content:space-between;">
                                  <h1>Section</h1>
                                  <!-- <button style="background:none; border:none; margin-top:-30px;" onclick="form_drop_section()"> <i style="margin-top:-10px;" class="fa-solid fa-caret-down"></i></button> -->
                              </div>
                              <?php 
                              $base_url = $_SESSION['base_url'];
                              $url_fetch= "get-section";
                              $url = $base_url.$url_fetch;
                              $token = $_SESSION['token'];
                              $fields = array('course_id'=>$_GET['course_id']);
                              $data = api_call_auth("POST" , $url, $fields, $token);
                              $i=-1;
                             foreach ($data['Data'] as $key => $value) {
                                 $i++;
                                 $section_no = $data['Data'][$i]['section_no'];
                                 $section_title = $data['Data'][$i]['section_title'];
                                 $section_description = $data['Data'][$i]['section_description'];
                                 $section_id = $data['Data'][$i]['id'];
                                 
                                 
                            

                              ?>
                              
                              <div style="display:flex;justify-content:space-between;">
                                  <h3>Section No. <?php echo $section_no?></h3>
                                  <button style="background:none; border:none; margin-top:-30px;" onclick="form_drop_section<?php echo $section_id?>()"> <i style="margin-top:-10px;" class="fa-solid fa-caret-down"></i></button>
                              </div>
                                <div class="main show-0"  id="section<?php echo $section_id?>">
                                
                                    <h3><?php echo $section_title?></h3>
                                    <p><?php echo $section_description?></p>
                                    <hr>
                                
                                
                                    <script>
                                            function form_drop_section<?php echo $section_id?>(){
                                            var new1 = document.getElementById('section<?php echo $section_id?>');
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

                                        <div class="lectures-main ">
                                            <?php 
                                            $base_url = $_SESSION['base_url'];
                                            $url_fetch= "get-course-lectures-by-course-id-and-section-id";
                                            $url = $base_url.$url_fetch;
                                            $token = $_SESSION['token'];
                                            $fields = array('course_id'=>$_GET['course_id'],'section_id'=>$section_id);
                                            $lectures = api_call_auth("POST" , $url, $fields, $token);
                                            $x=-1;
                                           foreach ($lectures['Data'] as $key => $value) {
                                               $x++;
                                               $lecture_no = $lectures['Data'][$x]['lecture_number'];
                                               $lecture_name = $lectures['Data'][$x]['lecture_name'];
                                               $lecture_short_description = $lectures['Data'][$x]['lecture_short_description'];
                                               $lecture_long_description = $lectures['Data'][$x]['lecture_long_description'];
                                               $lecture_video = $lectures['Data'][$x]['lecture_video'];
                                               $lecture_id = $lectures['Data'][$x]['id'];
                                               
                                           
                                
                                            
                                            ?>
                                            <div style="display:flex;justify-content:space-between;">
                                                <h1>Lecture</h1>
                                                <button style="background:none; border:none; margin-top:-30px;" onclick="form_drop_lecture<?php echo $lecture_id?>()"> <i style="margin-top:-10px;" class="fa-solid fa-caret-down"></i></button>
                                            </div>                           
                                            <h3>Lecture No <?php echo $lecture_no?></h3>
                                            <div class="main show-0"  id="lecture<?php echo $lecture_id?>">
                                                        <h3><?php echo $lecture_name?></h3>
                                                        <h3>Lecture Short Description</h3>
                                                        <p><?php echo $lecture_short_description?></h3>
                                                        <h3>Lecture Long Description</h3>
                                                        <p><?php echo $lecture_long_description?></p>
                                                    <h3>Lecture Video</h3>
                                                    <a href="http://localhost:8000/storage/<?php echo $lecture_video ?>" class="btn btn-primary rounded light me-3">View Lecture Video</a>
                                                
                                                        <hr>
                                                        <?php 
                                                        $base_url = $_SESSION['base_url'];
                                                        $url_fetch1= "get-course-materials-by-lecture-id";
                                                        $url1 = $base_url.$url_fetch1;
                                                        $token = $_SESSION['token'];
                                                        $fields = array('lecture_id'=>$lecture_id);
                                                        // echo $url1;
                                                        // print_r($fields);
                                                        $materials = api_call_auth("POST" , $url1, $fields, $token);
                                                        // print_r($materials);
                                                        if(!$materials['Data']==null){
                                                        $material_title = $materials['Data'][0]['material_title'];
                                                        $material_short_description = $materials['Data'][0]['material_short_description'];
                                                        $material_id = $materials['Data'][0]['id'];
                                                        $material_file = $materials['Data'][0]['material_file'];
                                                        }

                                                        
                                                        ?>
                                                        <div class="materials">
                                                            <h1>Material</h1>
                                                            <h3><?php echo $material_title?></h3>
                                                            <h3>Material Description</h3>
                                                            <p><?php echo $material_short_description?></p>
                                                            <a href="http://localhost:8000/storage/<?php echo $material_file;?>" class="btn btn-primary rounded light me-3">View Material File</a>

                                                        </div>
                                                        
                                                        <hr>
                                                 
                                                        <div class="assignments">
                                                            <h1>Assignment </h1>
                                                            <h3>Assignment No. <?php echo $lecture_no?></h3>
                                                            <?php 
                                                        $base_url = $_SESSION['base_url'];
                                                        $url_fetch1= "get-course-assignments-by-lecture-id";
                                                        $url1 = $base_url.$url_fetch1;
                                                        $token = $_SESSION['token'];
                                                        $fields = array('lecture_id'=>$lecture_id);
                                                        // echo $url1;
                                                        // print_r($fields);
                                                        $assignments = api_call_auth("POST" , $url1, $fields, $token);
                                                        // print_r($materials);
                                                        $q=-1;
                                                        if(!$assignments['Data']==null){
                                                            foreach ($assignments as $key => $value) {
                                                                # code...
                                                                $q++;
                                                                // echo $q;
                                                                $assignment_id = $assignments['Data'][$q]['assignment_id'];
                                                       
                                                        $assignment_ques = $assignments['Data'][$q]['assignment_ques'];
                                                        $assignment_ans= $assignments['Data'][$q]['assignment_ans'];
                                                        $question_id = $assignments['Data'][$q]['id'];
                                                        $option1 = $assignments['Data'][$q]['option1'];
                                                        $option2 = $assignments['Data'][$q]['option2'];
                                                        $option3 = $assignments['Data'][$q]['option3'];
                                                        $option4 = $assignments['Data'][$q]['option4'];
                                                        // echo $option1;
                                                           
                                                        
                                                        ?>
                                                            <div class="assignment-main-content">
                                                                    <h3>Ques: <?php echo $assignment_ques?></h3>
                                                                    <div class="options">
                                                                        <p>a). <?php echo $option1?></p>
                                                                        <p>b). <?php echo $option2?></p>
                                                                        <p>c). <?php echo $option3?></p>
                                                                        <p>d). <?php echo $option4?></p>
                                                                    </div>
                                                                <h3 style="color:green;">Answer: <?php echo $assignment_ans?></h3>
                                                            </div>                                                        <?php }}?>

                                                        </div>
                                                </div>
                                                <hr>
                                                <script>
                function form_drop_lecture<?php echo $lecture_id?>(){
                  var new1 = document.getElementById('lecture<?php echo $lecture_id?>');
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
              
                                                <?php }?>
                                        </div>
                                       
                                    </div> <?php }?>
                                </div>

                
                  
                  



                 
                  <div style="display:flex; align-items:center;justify-content:center;"><a href="create-course-4.php?course_id=<?php echo $_GET['course_id'] ?>" class="btn btn-primary rounded light me-3">Next</a></div>
                  
                </form>

                   </div>
                </div>
                   
                    

</section>







<?php

include('backtotop.php');



include('footer.php');



?>