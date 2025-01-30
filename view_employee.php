<?php
// Include the database connection
include 'config.php';

// Fetch all employee data from the database
$sql = "SELECT * FROM employee";
$result = mysqli_query($conn,$sql);

// Check if any employees are found
if (mysqli_num_rows($result) == 0) {
    $message = "No employees found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Employees</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #74b9ff, #0984e3);
            color: white;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 40px 60px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            width: 100%;
            overflow-x: auto;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #6c5ce7;
            color: white;
        }
       
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background: transparent;
            border: none;
            font-size: 2em;
            color: white;
            cursor: pointer;
        }
        .back-button:hover {
            color: #dfe6e9;
        }
    </style>
</head>
<body>
    <button class="back-button" onclick="window.location.href='emp_home.php';">&larr;</button>
    <div class="container">
        <h1>Employee List</h1>

        <?php if (isset($message)) { ?>
            <p><?php echo $message; ?></p>
        <?php } else { ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Aadhar Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($employee = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $employee['emp_id']; ?></td>
                            <td><?php echo $employee['emp_name']; ?></td>
                            <td><?php echo $employee['emp_gender']; ?></td>
                            <td><?php echo $employee['emp_dob']; ?></td>
                            <td><?php echo $employee['emp_email']; ?></td>
                            <td><?php echo $employee['emp_city']; ?></td>
                            <td><?php echo $employee['emp_aadhar']; ?></td>
                            <td>
                                <a href="edit_employee.php?emp_id=<?php echo $employee['emp_id']; ?>" style="color: #6c5ce7;">Edit</a> |
                                <a href="delete_employee.php?emp_id=<?php echo $employee['emp_id']; ?>" style="color: red;">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</body>
</html>
