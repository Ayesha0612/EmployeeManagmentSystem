<?php
// config.php

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_mgmt";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
