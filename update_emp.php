<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_id = $_POST['emp_id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $aadhar = $_POST['aadhar'];

    $sql = "UPDATE employee SET emp_name = '$name', emp_gender = '$gender', emp_dob = '$dob', emp_email = '$email', emp_city = '$city', emp_aadhar = '$aadhar' WHERE emp_id = $emp_id";
    
    if (mysqli_query($conn,$sql)) {
        echo "<script>alert('Employee details updated successfully!'); window.location.href='view_employee.php';</script>";
    } else {
        echo "Error: " . mysql_error();
    }
}
?>
