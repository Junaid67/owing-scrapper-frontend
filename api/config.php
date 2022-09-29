<?php

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', 'LearnWordpress');
// define('DB_NAME', 'owing_admin');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Scrap!@#$%^201167');
define('DB_NAME', 'owing_admin');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn == false) {
    die("ERROR: Can't connect to Database" .  mysqli_connect_errno());
}

$baseApi = 'http://localhost:4100/api';
$api_username = 'owingAdmin';
$api_password = 'pharma123';