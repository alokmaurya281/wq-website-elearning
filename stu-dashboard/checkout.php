<?php 
include('api.php');

include('check-login.php');
include('head.php');
include('sidebar.php');




?>


<section>
                    <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start" style="background-color:white; padding:30px; border-radius:10px; margin-bottom:30px;">
                        <div class="me-auto  d-lg-block">
                            <h2 class="text-black font-w600">Checkout</h2>
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


  @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}

.card-registration .select-arrow {
top: 13px;
}

.bg-grey {
background-color: #eae8e8;
}

@media (min-width: 992px) {
.card-registration-2 .bg-grey {
border-top-right-radius: 16px;
border-bottom-right-radius: 16px;
}
}

@media (max-width: 991px) {
.card-registration-2 .bg-grey {
border-bottom-left-radius: 16px;
border-bottom-right-radius: 16px;
}
}
</style>



                   
                  
                  
                   
                  <div class="row">

                  <div class="text-new">
                      <h1>CheckOut</h1>
                     
                      <hr>
                      <section class="h-100 h-custom" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                    <?php
                    $userid = $_SESSION['userid'];
                    $fields = array('userid'=>$userid);
                    $base_url = $_SESSION['base_url'];
                    $url_fetch = "get-cart-item-by-userid";
                    $url = $base_url.$url_fetch;
                    $data1 = api_call_auth("POST", $url, $fields, $_SESSION['token']);
                    

                    
                    $items = count($data1['Data']);
                    ?>
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Billing</h1>
                    <h6 class="mb-0 text-muted"><?php echo $items?> items</h6>
                  </div>
                  <?php 
                  $x=-1;
                  
                  foreach ($data1['Data'] as $key => $value) {
                      $x++;
                      $cart = $data1['Data'][$x];
                      $course_id = $cart['course_id'];
                      $cart_id = $cart['id'];
                      $cart_price = $cart['item_price'];
                      $total_price += $cart_price;
                    //   echo $total_price;
                      $cart_quantity = $cart['cart_quantity'];


                      $url_fetch = "get-course-by-course-id";
$url = $base_url.$url_fetch;

$fields = array('course_id'=>$course_id);

$data=api_call_post("POST",$url, $fields);
// print_r($data);

$course_details = $data['Data'][0];
$course_title = $course_details['course_name'];

$category_id = $course_details['category_id'];
$course_feature_image = $course_details['course_feature_image'];

$course_price = $course_details['course_price'];


$url_fetch = "categories-by-id";
$url = $base_url.$url_fetch;

$fields = array('category_id'=>$category_id);

$data_category=api_call_post("POST",$url, $fields);
// print_r($data);

$category = $data_category['Data'][0];
$category_name = $category['category_name'];


       
                  
                  
                  ?>
                  <hr class="my-4">

                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                        
                      <img
                        src="http://localhost:8000/storage/<?php echo $course_feature_image ?>"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted"><?php echo $course_title?></h6>
                      <h6 class="text-black mb-0"><?php echo $category_name?></h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <!-- <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                      </button> -->

                      <input id="form1" min="0"  name="quantity" value="<?php echo $cart_quantity ?>" type="number"
                        class="form-control form-control-sm"  disabled/>

                      <!-- <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                      </button> -->
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0">Rs. <?php echo $cart_price?></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <form action="delete-cart-item.php" method="post">
                            <input type="text" name="cart_id" value="<?php echo $cart_id?>" hidden>
                      <button style="border:none;background:none;" type="submit"  class="text-muted"><i class="fas fa-times"></i></button>
                    </form>
                    </div>
                  </div>
                  <?php } ?>

                  

                  <hr class="my-4">

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="javascript:history.go(-1)" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to Cart</a></h6>
                  </div>
                </div>
              </div>
              <?php
if(isset($_POST['checkout'])){
    $discount = $_POST['discount'];
    $final_price  = $_POST['final_price'];
    $original_price = $_POST['original_price'];
    $cartid = $_POST['cartid'];
    $coupan = $_POST['coupan'];
}


?>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Original Price  </h5>
                    <h5>RS. <?php echo $original_price?></h5>
                  </div>
                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Discount  </h5>
                    <h5>RS. <?php echo $discount?></h5>
                  </div>

                 

                  
<form action="pay_script.php" method="post">
                  

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Final price</h5>
                    <h5>Rs. <?php echo $final_price?></h5>
                  </div>
                  
                  <input type="text" name="final_price" value="<?php echo $final_price?>" hidden>
                      <input type="text" name="original_price" value="<?php echo $total_price;?>" hidden>
                      <input type="text" name="coupan" value="<?php echo $coupan;?>" hidden>
                      <input type="text" name="userid" value="<?php echo $_SESSION['userid'];?>" hidden>
                      <input type="text" name="cartid" value="<?php echo $cartid?>" hidden>
                      <input type="text" name="course_id" value="<?php echo $course_id?>" hidden>
                  <button type="submit" class="btn btn-primary btn-block btn-lg"
                    data-mdb-ripple-color="dark">Pay <?php  echo $final_price?></button>


                  </form>


                 

                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

                      
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
                

</div>
</div>
                   
                    

</section>





<?php

include('backtotop.php');



include('footer.php');



?>