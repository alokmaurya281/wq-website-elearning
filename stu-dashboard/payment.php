<?php 

include('api.php');
include('check-login.php');
$base_url = $_SESSION['base_url'];

$coupan = $_POST['coupan'];

$url_fetch = "buy-now";
$url = $base_url.$url_fetch;

$fields = array('coupan'=>$coupan,
'item_price'=>$_POST['original_price'],
'final_price'=>$_POST['final_price'],
'userid'=>$_POST['userid'],
'cart_id'=>$_POST['cartid'],
'course_id'=>$_POST['course_id'],
);

$data=api_call_auth("POST",$url, $fields, $_SESSION['token']);
// print_r($data);
if($data['status']=="success"){
    $purchase_id = $data['purchase_id'];
    $transaction_id = rand(1,99999999);
    $url_fetch = "update-purchase-status";
    $url = $base_url.$url_fetch;
    $field = array('purchase_id'=>$purchase_id,
    'transaction_id'=>$transaction_id,
    );
    $data1=api_call_auth("POST",$url, $field, $_SESSION['token']);
print_r($data1);

    
        // echo $_SERVER['newprice'];
//    print_r($data);
    }
    else{
        echo "error";
        

    }










?>