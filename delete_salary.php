<?php
include 'config.php';

if (isset($_GET['salary_id'])) {
    $salary_id = $_GET['salary_id'];

    $delete_sql = "DELETE FROM salary WHERE salary_id = $salary_id";

    if (mysqli_query($conn,$delete_sql)) {
        echo "<script>alert('Salary record deleted successfully!'); window.location='view_salary.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error();
    }
} else {
    echo "Invalid request!";
}
?>
