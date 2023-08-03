<?php

$user     = 'root';
$password = '';
$db   = 'uas-2023';
$host     = 'localhost';

$conn = new mysqli($host, $user, $password, $db);

if($conn->connect_error) {
    die("Error connecting to database: " . mysqli_error_string($conn));
}

// include require __DIR__."/autoload.php";
