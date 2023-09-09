<?php 
include('check-login.php');
include('api.php');


// echo $_SESSION['userid'];
$token=$_SESSION['token'];

$cart_id = $_POST['cart_id'];


$fields = array('cart_id'=>$cart_id);
$base_url = $_SESSION['base_url'];
$url_fetch = "delete-cart-item";
$url = $base_url.$url_fetch;
$data = api_call_auth("POST", $url, $fields, $token);
// print_r($data);
if($data['status']=="success"){
    header("Location:cart.php");
}
else{
    echo "<script>alert('".$data['message']."');</script>";
}






?>