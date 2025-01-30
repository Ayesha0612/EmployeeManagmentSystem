<!--
<?php
// include 'config.php'; // Include your database configuration
// require('fpdf/fpdf.php'); // Include FPDF library for PDF generation

// // Fetch employee list for dropdown
// $sql = "SELECT emp_id, emp_name FROM employee";
// $result = mysql_query($sql);

// // If the form is submitted
// if (isset($_POST['generate_salary_slip'])) {
    // $emp_id = $_POST['emp_id'];

    // // Fetch salary details for the selected employee
    // $sql = "SELECT * FROM salary WHERE emp_id = $emp_id";
    // $result = mysql_query($sql);
    // $row = mysql_fetch_assoc($result);

    // if ($row) {
        // // Create a new PDF instance
        // $pdf = new FPDF();
        // $pdf->AddPage();
        // $pdf->SetFont('Arial', 'B', 16);

        // // Add Title
        // $pdf->Cell(200, 10, 'Salary Slip for Employee ' . $row['emp_id'], 0, 1, 'C');

        // // Add Employee Details
        // $pdf->SetFont('Arial', '', 12);
        // $pdf->Ln(10);
        // $pdf->Cell(50, 10, 'Employee ID: ' . $row['emp_id'], 0, 1);
        // $pdf->Cell(50, 10, 'Basic Salary: ' . number_format($row['basic_salary'], 2), 0, 1);
        // $pdf->Cell(50, 10, 'HRA: ' . number_format($row['hra'], 2), 0, 1);
        // $pdf->Cell(50, 10, 'Bonus: ' . number_format($row['bonus'], 2), 0, 1);
        // $pdf->Cell(50, 10, 'Other Allowances: ' . number_format($row['other_allowances'], 2), 0, 1);
        // $pdf->Cell(50, 10, 'Deductions: ' . number_format($row['deductions'], 2), 0, 1);

        // // Calculate total salary
        // $total_salary = $row['basic_salary'] + $row['hra'] + $row['bonus'] + $row['other_allowances'] - $row['deductions'];
        // $pdf->Cell(50, 10, 'Total Salary: ' . number_format($total_salary, 2), 0, 1);

        // // Output the PDF (streaming to the browser)
        // $pdf->Output('D', 'Salary_Slip_' . $row['emp_id'] . '.pdf');
        // exit();
    // } else {
        // echo "Salary details not found for the selected employee!";
    // }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Salary Slip</title>
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
            width: 100%;
            max-width: 600px;
            text-align: center;
        }
        h1 {
            margin-bottom: 30px;
            color: #dfe6e9;
        }
        select, button {
            width: 300px;
            padding: 12px;
            margin: 10px 0;
            border-radius: 25px;
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
        .employee-name {
            margin-top: 20px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Generate Pay Slip</h1>
        <form action="generate_salary_slip.php" method="POST">
            <select name="emp_id" id="emp_id" ">
                <option value="">Select Employee</option>
                // <?php
                // while ($row = mysql_fetch_assoc($result)) {
                    // echo "<option value='" . $row['emp_id'] . "'>" . $row['emp_id'], "   ", $row['emp_name']. "</option>";
                // }
                // ?>
            </select>
            <div class="employee-name" id="employee_name"></div>
            <button type="submit" name="generate_salary_slip">Get Pay Slip</button>
        </form>
    </div>

</body>
</html>
-->
<?php
include 'config.php'; // Include your database configuration
require('fpdf/fpdf.php'); // Include FPDF library for PDF generation

// Fetch employee list for dropdown
$sql = "SELECT emp_id, emp_name FROM employee";
$result = mysqli_query($conn,$sql);

// If the form is submitted
if (isset($_POST['generate_salary_slip'])) {
    $emp_id = $_POST['emp_id'];

    // Fetch salary details for the selected employee
    $sql = "SELECT * FROM salary WHERE emp_id = $emp_id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Clear any previous output
        ob_clean();

        // Create a new PDF instance
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Add Title
        $pdf->Cell(200, 10, 'Salary Slip for Employee ' . $row['emp_id'], 0, 1, 'C');

        // Add Employee Details
        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln(10);
        $pdf->Cell(50, 10, 'Employee ID: ' . $row['emp_id'], 0, 1);
        $pdf->Cell(50, 10, 'Basic Salary: ' . number_format($row['basic_salary'], 2), 0, 1);
        $pdf->Cell(50, 10, 'HRA: ' . number_format($row['hra'], 2), 0, 1);
        $pdf->Cell(50, 10, 'Bonus: ' . number_format($row['bonus'], 2), 0, 1);
        $pdf->Cell(50, 10, 'Other Allowances: ' . number_format($row['other_allowances'], 2), 0, 1);
        $pdf->Cell(50, 10, 'Deductions: ' . number_format($row['deductions'], 2), 0, 1);

        // Calculate total salary
        $total_salary = $row['basic_salary'] + $row['hra'] + $row['bonus'] + $row['other_allowances'] - $row['deductions'];
        $pdf->Cell(50, 10, 'Total Salary: ' . number_format($total_salary, 2), 0, 1);

        // Output the PDF (streaming to the browser)
        $pdf->Output('D', 'Salary_Slip_' . $row['emp_id'] . '.pdf');
        exit();
    } else {
        echo "<script>alert('Salary details not found for the selected employee!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Salary Slip</title>
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
            width: 100%;
            max-width: 600px;
            text-align: center;
            position: relative;
        }
        h1 {
            margin-bottom: 30px;
            color: #dfe6e9;
        }
        select, button {
            width: 300px;
            padding: 12px;
            margin: 10px 0;
            border-radius: 25px;
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
        .employee-name {
            margin-top: 20px;
            font-size: 1.2em;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background: #e17055;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            color: white;
        }
        .back-button:hover {
            background: #d63031;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="salary_home.php" class="back-button">&larr; Back</a>
        <h1>Generate Pay Slip</h1>
        <form action="generate_salary_slip.php" method="POST">
            <select name="emp_id" id="emp_id">
                <option value="">Select Employee</option>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['emp_id'] . "'>" . $row['emp_id'] . " - " . $row['emp_name'] . "</option>";
                }
                ?>
            </select>
            <button type="submit" name="generate_salary_slip">Get Pay Slip</button>
        </form>
    </div>
</body>
</html>
