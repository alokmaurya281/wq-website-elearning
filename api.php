<?php 
session_start();
$_SERVER['base_url'] = "http://localhost:8000/api/v1/";
function api_call_get($method, $url){
  $curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => $method,
  // if($method==POST){
  //   CURLOPT_POSTFIELDS => json_encode($fields),

  // }
  
  CURLOPT_HTTPHEADER => array(
    // "authorization: Rlah2SPAocBCOm74rvkVfjWw1b9yXNinD0uQ6JTdxs8FepKLEIGBetsL1AEJgkrzYh8w9TOU32Z7MaPK",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$data = json_decode($response, true);
return $data;


}

function api_call_auth($method, $url, $fields, $token){
  $curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => $method,
  
  CURLOPT_POSTFIELDS => json_encode($fields),

  
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Authorization: Bearer $token",
    "Content-Type: application/json",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$data = json_decode($response, true);
return $data;


}



function api_call_post($method, $url, $fields){
  $curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => $method,
 
  CURLOPT_POSTFIELDS => json_encode($fields),

  
  CURLOPT_HTTPHEADER => array(
    // "authorization: Rlah2SPAocBCOm74rvkVfjWw1b9yXNinD0uQ6JTdxs8FepKLEIGBetsL1AEJgkrzYh8w9TOU32Z7MaPK",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$data = json_decode($response, true);
return $data;


}

?>