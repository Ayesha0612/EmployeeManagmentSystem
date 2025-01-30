<?php
include 'config.php';

// Get form data
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$city = $_POST['city'];
$aadhar = $_POST['aadhar'];

// Create SQL query
$qry=mysqli_query($conn,"INSERT INTO employee (emp_name, emp_gender, emp_dob, emp_email, emp_city, emp_aadhar)
        VALUES ('$name', '$gender', '$dob', '$email', '$city', '$aadhar')");

// Execute statement
if ($qry ==true) {
    echo "<script>alert('Employee Registered Successfully!'); window.location.href='home.php';</script>";
} else {
    echo "Error: " . $qry->error;
}

?>
