<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #55efc4, #00cec9);
            color: white;
            text-align: center;
        }
        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 50px 70px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        h1 {
            font-size: 3em;
            margin-bottom: 30px;
            letter-spacing: 2px;
        }
        table {
            width: 100%;
        }
        button {
            background: #6c5ce7;
            border: none;
            padding: 15px 35px;
            border-radius: 30px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background 0.3s ease;
            margin: 10px 0;
            width: 250px;
        }
        button a {
            color: white;
            text-decoration: none;
        }
        button:hover {
            background: #4834d4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Employee Management</h1> 
        <table>
            <tr>
                <td rowspan="4"></td>
                <td><button><a href="form.php">Add New Employee</a></button></td>
            </tr>
            <tr>
                <td><button><a href="view_employee.php">View Employees</a></button></td>
            </tr>
            <tr>
                <td><button><a href="home.php">Back to Home Page</a></button></td>
            </tr>
        </table>
    </div>
</body>
</html>
