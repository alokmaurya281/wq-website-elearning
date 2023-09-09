<?php 
include('stu-dashboard/check-login.php');
include('api.php');


// echo $_SESSION['userid'];
$token=$_SESSION['token'];

$course_id = $_POST['course_id'];
$userid = $_SESSION['userid'];
$cart_quantity = 1;
$course_price = $_POST['course_price'];

$fields = array('course_id'=>$course_id,
'userid'=>$userid,
'cart_quantity'=>$cart_quantity,
'item_price'=>$course_price
);
$base_url = $_SERVER['base_url'];
$url_fetch = "add-to-cart";
$url = $base_url.$url_fetch;
$data = api_call_auth("POST", $url, $fields, $token);
// print_r($data);
if($data['status']=="success"){
    header("Location:stu-dashboard/cart.php");
}
else{
    echo "<script>alert('".$data['message']."');</script>";
}






?>