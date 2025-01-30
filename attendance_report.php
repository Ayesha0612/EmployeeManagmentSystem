<?php
include 'config.php';

// Fetch attendance records
$sql = "SELECT a.*, e.emp_name FROM attendance a 
        JOIN employee e ON a.emp_id = e.emp_id 
        ORDER BY a.date DESC";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>
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
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: white;
        }
        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #6c5ce7;
        }
        tr:hover {
            background-color: #636e72;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Attendance Report</h1>
        <table>
            <tr>
                <th>Date</th>
                <th>Employee</th>
                <th>Status</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Remarks</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['date']}</td>
                    <td>{$row['emp_name']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['check_in']}</td>
                    <td>{$row['check_out']}</td>
                    <td>{$row['remarks']}</td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
