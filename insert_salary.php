<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_id = $_POST['emp_id'];
    $basic_salary = $_POST['basic_salary'];
    $hra = $_POST['hra'];
    $bonus = $_POST['bonus'];
    $other_allowances = isset($_POST['other_allowances']) ? $_POST['other_allowances'] : 0;
    $deductions = isset($_POST['deductions']) ? $_POST['deductions'] : 0;

    // Prepare the SQL query to insert salary
    $sql = "INSERT INTO salary (emp_id, basic_salary, hra, bonus, other_allowances, deductions) 
            VALUES ('$emp_id', '$basic_salary', '$hra', '$bonus', '$other_allowances', '$deductions')";
    
    if (mysqli_query($conn,$sql)) {
        echo "<script>alert('Salary details added successfully!'); window.location.href='salary_home.php';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
