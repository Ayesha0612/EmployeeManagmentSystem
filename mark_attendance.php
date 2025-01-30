<?php
include 'config.php';

// Fetch employee list
$sql = "SELECT emp_id, emp_name FROM employee";
$result = mysqli_query($conn,$sql);

// Handle attendance submission
if (isset($_POST['submit_attendance'])) {
    $emp_id = $_POST['emp_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $remarks = $_POST['remarks'];

    $sql = "INSERT INTO attendance (emp_id, date, status, check_in, check_out, remarks) 
            VALUES ('$emp_id', '$date', '$status', '$check_in', '$check_out', '$remarks')";
    
    if (mysqli_query($conn,$sql)) {
        echo "<script>alert('Attendance marked successfully');window.location.href='attendance_report.php';</script>";
    } else {
        echo "<script>alert('Error: Unable to mark attendance');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendance</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #81ecec, #00cec9);
            color: white;
        }
        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 40px 60px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
		form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input, select, button {
            width: 300px;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 25px;
            outline: none;
            text-align: center;
        }
       button {
            background: #6c5ce7;
            color: white;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #4834d4;
        }
        a {
            color: white;
            text-decoration: none;
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
    <button class="back-button" onclick="window.location.href='attendance_home.php'">&larr;</button>
    <div class="container">
        <h1>Mark Attendance</h1>
        <form action="mark_attendance.php" method="POST">
            <select name="emp_id" required>
                <option value="">Select Employee</option>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['emp_id']}'>{$row['emp_name']}</option>";
                }
                ?>
            </select>
            <input type="date" name="date" required>
            <select name="status" required>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
                <option value="Half-day">Half-day</option>
                <option value="Leave">Leave</option>
                <option value="Work from Home">Work from Home</option>
            </select>
            <input type="time" name="check_in">
            <input type="time" name="check_out">
            <input type="text" name="remarks" placeholder="Remarks (optional)">
            <button type="submit" name="submit_attendance">Submit</button>
        </form>
    </div>
</body>
</html>
