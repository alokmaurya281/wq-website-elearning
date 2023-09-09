
<?php

include('check-login.php');


include('api.php');
 

function get_user_id(){

    $fields = array(
        "email"=>$_SESSION['email'],
    
    ) ;
    $url_fetch = "get-user-id";
    $base_url = $_SESSION['base_url'];

$url = $base_url.$url_fetch;

$data = api_call_auth("POST", $url, $fields, $_SESSION['token']);

return $data['userid'];

}

$_SESSION['userid'] = get_user_id();
// echo $_SESSION['userid'];


function get_user_details(){


$fields = array(
    "userid"=>$_SESSION['userid'],

) ;

$url_fetch = "get-user-details";
$base_url = $_SESSION['base_url'];
$url = $base_url.$url_fetch;

$data = api_call_auth("POST", $url, $fields, $_SESSION['token']);


return $data;
}

$data = get_user_details();
$details=$data["message"];
$array_length = count($details);

 $i=-1;
    
foreach ($details as $key => $value) {
  
  $i++;
  $_SESSION['name'] = $details[$i]['name'];
  $_SESSION['profile_image']= $details[$i]['profile_image'];
  $_SESSION['userid']= $details[$i]['userid'];
  
  
 
 

}


include('head.php');
include('sidebar.php');

?>


<section>
                    <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start" style="background-color:white; padding:30px; border-radius:10px; margin-bottom:30px;">
                        <div class="me-auto  d-lg-block">
                            <h2 class="text-black font-w600">Dashboard</h2>
                            <p class="mb-0">Welcome <?php echo $_SESSION['name'] ?></p>
                        </div>
                        <?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>
                        <a href="<?php echo $actual_link?>" class="btn btn-primary rounded light me-3">Refresh</a>
                        <!-- <a href="update_property_details.php" class="btn btn-primary rounded light me-3">Update</a>

                        <a href="javascript:void(0);" class="btn btn-primary rounded"><i class="fas fa-cog me-0"></i></a> -->
                    </div>
                   
       <style>
          
       </style>             

<section class="" style="">



<?php

include('enrolled-courses.php');
?>
</section>
<?php

include('backtotop.php');



include('footer.php');
?>

<script src="js/slider.js"></script>