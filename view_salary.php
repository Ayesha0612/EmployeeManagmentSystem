<?php

include 'config.php';

// Fetch salary data
$sql = "SELECT s.salary_id, s.emp_id, e.emp_name, s.basic_salary, s.hra, s.bonus, s.other_allowances, s.deductions, s.created_at 
        FROM salary s
        JOIN employee e ON s.emp_id = e.emp_id
        ORDER BY s.created_at DESC";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Salary Details</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            background: linear-gradient(135deg, #81ecec, #00cec9);
            color: white;
        }
        .container {
            width: 80%;
            margin-top: 50px;
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: white;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #6c5ce7;
        }
        tr:nth-child(even) {
            background-color: #2d3436;
        }
        tr:hover {
            background-color: #636e72;
        }
        a {
            color: #81ecec;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            //background: #6c5ce7;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s ease;
        }
        .back-button:hover {
            background: #4834d4;
			text-decoration: none;
        }
    </style>
</head>
<body>
    <a href="salary_home.php" class="back-button">&larr;</a>
    <h1>Salary Details</h1>
    <div class="container">
        <table>
            <tr>
                <th>Salary ID</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Basic Salary</th>
                <th>HRA</th>
                <th>Bonus</th>
                <th>Other Allowances</th>
                <th>Deductions</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['salary_id']}</td>
                        <td>{$row['emp_id']}</td>
                        <td>{$row['emp_name']}</td>
                        <td>{$row['basic_salary']}</td>
                        <td>{$row['hra']}</td>
                        <td>{$row['bonus']}</td>
                        <td>{$row['other_allowances']}</td>
                        <td>{$row['deductions']}</td>
                        <td>{$row['created_at']}</td>
                        <td>
                            <a href='edit_salary.php?salary_id={$row['salary_id']}'>Edit</a> | 
                            <a href='delete_salary.php?salary_id={$row['salary_id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No records found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
