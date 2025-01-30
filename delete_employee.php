<?php
// Include database connection
include 'config.php';

// Get the employee ID from the URL
$emp_id = $_GET['emp_id'];

// Delete the employee record from the database
$sql = "DELETE FROM employee WHERE emp_id = $emp_id";

if (mysqli_query($conn,$sql)) {
    // Redirect back to the employee list page after deletion
    echo "<script>alert('Employee deleted successfully!'); window.location.href='view_employee.php';</script>";
} else {
    echo "Error deleting employee: " . mysqli_error();
}
?>
