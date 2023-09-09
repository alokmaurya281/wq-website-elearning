
<form class="form-" action="" method="post" enctype="multipart/form-data">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="customFile">Setup Video file</label>
                    <input type="file" name="video"  class="form-control"  required />
                  </div> 
                  <div class="form-outline form-dark mb-4">
                    <input type="text" name="title" value="" class="form-control" required />
                    <label class="form-label" for="form6Example3">Setup Video Title</label>
                  </div>
                                <div class="form-outline mb-4">
                    <textarea class="form-control" name="description" value="" rows="2" required></textarea>
                    <label class="form-label" for="form6Example7">Setup Video Descrition</label>
                  </div>
                  <input type="text" name="setup_id" value="<?php echo $_GET['setup_id'];?>" hidden>
                  <input type="text" name="teacher_id" value="<?php echo $_SESSION['teacher_id'];?>" hidden>
                  

                  <!-- Submit button -->
                  <div style="display:flex; align-items:center;justify-content:center;"><button onclick="popup()" type="submit" name="submit" value="submit" class="btn btn-primary btn-rounded">Submit For Review</button></div>
                  <script>
                    function popup(){
                      return alert('Please Do not Press Any Key Untill The video is being Uploaded.');
                    }
                  </script>
                  
                </form>

                <?php
                
                print_r($_FILES);


                $data = array(['tmp_name'=>$_FILES['video']['tmp_name'],
                'type'=>$_FILES['video']['type'],
                'name'=>$_FILES['video']['name']]);
                print_r($data);

                
                ?>