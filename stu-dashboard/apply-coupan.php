<?php 

include('api.php');
include('check-login.php');
$base_url = $_SESSION['base_url'];

$coupan = $_POST['coupan'];
$total_price = $_POST['total_price'];
$url_fetch = "get-coupan";
$url = $base_url.$url_fetch;

$fields = array('coupan'=>$coupan);

$data=api_call_auth("POST",$url, $fields, $_SESSION['token']);
if(!$data['Data']==NULL){
    $expiry_date = $data['Data'][0]['expiry_date'];
    $total_used = $data['Data'][0]['total_used'];
    $discount_amount = $data['Data'][0]['discount_amount'];
    $todaydate = date('Y-m-d');
    echo $todaydate;
    if($expiry_date>=$todaydate){
        $_SERVER['newprice'] = $total_price-$discount_amount;
        $_SERVER['coupan'] = $coupan;
        // echo $_SERVER['newprice'];
    echo "<script>alert(' coupan Applied. You have Got Flat Rs".$discount_amount." Discount ');window.location.assign('cart.php');</script>";
    }
    else{
        echo "<script>alert(' coupan Expired.');window.location.assign('cart.php');</script>";
        

    }




}

else{
    echo "<script>alert('invalid coupan.');window.location.assign('cart.php');</script>";
}



?>