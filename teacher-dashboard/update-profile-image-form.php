<?php 

include('check-login.php');
include('api.php');
$base_url = $_SESSION['base_url'];
$url_fetch = "update-profile-image";
$url = $base_url.$url_fetch;
$token = $_SESSION['token'];
$ch = curl_init();

$image = new CURLFile(
    $_FILES['profile_image']['tmp_name'],
    $_FILES['profile_image']['type'],
    $_FILES['profile_image']['name']
    );

$userid = $_POST['userid'];

$fields = array(
'profile_image'=>$image,
'userid'=>$userid,


);
// print_r($fields);
$header = array(
    "Accept: application/json",
    "Authorization: Bearer $token",
    "Content-Type: multipart/form-data",
    "cache-control: no-cache",
);

curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        $response = curl_exec($ch);
        $data1 = json_decode($response, true);
        // print_r($data1);
        $status= $data1['status'];
        if($status == "success")
        {
         echo '<script>alert("Profile Image Updated Successfully.");window.location.assign("my-profile.php")</script>';
            
        }
        else
        {
             echo '<script>alert(" Not updated Please Try Again.");window.location.assign("update-profile.php")</script>';
        }
        curl_close($ch);





?>