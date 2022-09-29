<?php
require_once('config.php');
session_start();
// if(!isset($_SESSION['username'])){
//     header("Location:login.php");
// }
$action = mysqli_real_escape_string($conn, $_POST["action"]);
if ($action == "login") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $sql);
    // var_dump($result);
    if ($result && $result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $row['email'];
            echo json_encode([
                "status" => true,
                "message" => "index.php",
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Invalid Password",
            ]);
        }
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Invalid Email Or Password",
        ]);
    }
}

if ($action == 'downloadCSV') {
    $jsonObj = mysqli_real_escape_string($conn, $_POST['jsonObj']);
    if (isset($jsonObj)) {
        $results = json_decode(stripslashes(json_encode($jsonObj)), true);
        $results = json_decode($results, true);
        // print_r($results);
    }
    $filename = 'patients.csv';
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=$filename");
    $output = fopen("php://output", "w");
    $header = array_keys($results[0]);
    fputcsv($output, $header);
    foreach ($results as $row) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit();
}

// $url = 'http://localhost:4000/api';
