<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Salary</title>
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
            margin-bottom: 30px;
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
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background: transparent;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
        .back-button:hover {
            color: #dcdde1;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="window.location.href='salary_home.php'">&larr;</button>
        <h1>Add Salary</h1>
        <form action="insert_salary.php" method="POST">
            <select name="emp_id" required>
                <option value="1s">Select Employee</option>
                <?php
                include('config.php'); // Ensure this file correctly establishes $conn

                $query = "SELECT emp_id, emp_name FROM employee";
                $result = mysqli_query($conn,$query);

                if (!$result) {
                    die("Database query failed: " . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['emp_id'] . "'>" . $row['emp_id'] . " - " . $row['emp_name'] . "</option>";
                }
                ?>
            </select>
            <input type="text" name="basic_salary" placeholder="Basic Salary" required>
            <input type="text" name="hra" placeholder="HRA" required>
            <input type="text" name="bonus" placeholder="Bonus" required>
            <input type="text" name="other_allowances" placeholder="Other Allowances">
            <input type="text" name="deductions" placeholder="Deductions">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
