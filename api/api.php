<?php
require_once('config.php');
session_start();
// if(!isset($_SESSION['username'])){
//     header("Location:login.php");
// }
$action = mysqli_real_escape_string($conn, $_GET["action"]);
if ($action ==  'getApi') {
    $url = $_GET['url'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $baseApi . "/" . $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            returnBase64($api_username, $api_password)
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}else if ($action ==  'postApi') {
    $url = $_GET['url'];

    $post_data = json_encode($_POST);
    // var_dump($post_data);
      // Prepare new cURL resource
      $crl = curl_init($baseApi . "/" . $url);
      curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($crl, CURLINFO_HEADER_OUT, true);
      curl_setopt($crl, CURLOPT_POST, true);
      curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
        
      // Set HTTP Header for POST request 
      curl_setopt($crl, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          returnBase64($api_username, $api_password)
      ));
        
      // Submit the POST request
      $result = curl_exec($crl);
      // $result_noti = 0;
      // // handle curl error
      // if ($result === false) {
      //     $result_noti = 0; die();
      // } else {
      //     $result_noti = 1; die();
      // }
      // Close cURL session handle
      curl_close($crl);
      echo($result);

}
function returnBase64($api_username, $api_password){
    $auth = 'Authorization: Basic ' . base64_encode($api_username . ":" . $api_password);
    return $auth;
}