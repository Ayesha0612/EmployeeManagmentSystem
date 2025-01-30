<?php
include 'config.php';

// Fetch existing data
if (isset($_GET['salary_id'])) {
    $salary_id = $_GET['salary_id'];
    $sql = "SELECT * FROM salary WHERE salary_id = $salary_id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
}

// Handle update
if (isset($_POST['update_salary'])) {
    $salary_id = $_POST['salary_id'];
    $basic_salary = $_POST['basic_salary'];
    $hra = $_POST['hra'];
    $bonus = $_POST['bonus'];
    $other_allowances = $_POST['other_allowances'];
    $deductions = $_POST['deductions'];

    $update_sql = "UPDATE salary SET 
                    basic_salary = '$basic_salary', 
                    hra = '$hra', 
                    bonus = '$bonus', 
                    other_allowances = '$other_allowances', 
                    deductions = '$deductions'
                  WHERE salary_id = $salary_id";

    if (mysqli_query($conn,$update_sql)) {
        echo "<script>alert('Salary updated successfully!'); window.location='view_salary.php';</script>";
    } else {
        echo "Error updating record: " . mysql_error();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Salary</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Salary</h1>
        <form action="edit_salary.php" method="POST">
            <input type="hidden" name="salary_id" value="<?php echo $row['salary_id']; ?>">
            
            <input type="text" name="basic_salary" value="<?php echo $row['basic_salary']; ?>" required>

          
            <input type="text" name="hra" value="<?php echo $row['hra']; ?>" required>

        
            <input type="text" name="bonus" value="<?php echo $row['bonus']; ?>" required>

            
            <input type="text" name="other_allowances" value="<?php echo $row['other_allowances']; ?>">

            
            <input type="text" name="deductions" value="<?php echo $row['deductions']; ?>">

            <button type="submit" name="update_salary">Update Salary</button>
        </form>
        <br>
        <a href="view_salary.php">Back to Salary List</a>
    </div>
</body>
</html>
