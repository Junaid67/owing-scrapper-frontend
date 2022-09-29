<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'LearnPassword');
define('DB_NAME', 'owing_scrapped');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn == false) {
    die("ERROR: Can't connect to Database" .  mysqli_connect_errno());
}

$url = 'http://localhost:4100/api';








// header('Content-Type: application/json');
// header('Access-Control-Allow-Origin: *');

// include('./api-config.php');
// $sql = "SELECT * From clinics";
// $result = mysqli_query($conn, $sql) or die("Sql Query Failed!");

// if (mysqli_num_rows($result) > 0) {

//     $output[] = mysqli_fetch_all($result, MYSQLI_ASSOC);
//     // echo json_encode($output);
// } else {
//     echo json_encode(array('message' => 'No Records found.', 'status' => false));
// }
// // $api_url = 'http://localhost:4100/api/clinics';

// // echo ($api_url);
// $clinics = json_encode($output);
// $length = count($output);
// echo ($clinics),
// session_start();
