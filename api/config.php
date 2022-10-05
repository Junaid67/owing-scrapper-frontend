<?php

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', 'LearnWordpress');
// define('DB_NAME', 'owing_admin');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'hcdbjksz_owing');
define('DB_PASSWORD', 'admin!@#2011');
define('DB_NAME', 'hcdbjksz_owing_admin');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn == false) {
    die("ERROR: Can't connect to Database" .  mysqli_connect_errno());
}

// $baseApi = 'http://localhost:4100/api';
$baseApi = 'http://ec2-3-25-177-240.ap-southeast-2.compute.amazonaws.com:4000/api';

$api_username = 'owingAdmin';
$api_password = 'pharma123';
