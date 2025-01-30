

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Home</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #74b9ff, #0984e3);
            color: white;
            text-align: center;
            flex-direction: column;
        }
        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 40px 60px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            margin-bottom: 20px;
            width: 100%;
            max-width: 500px;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        button {
            width: 320px;
            background: #6c5ce7;
            border: none;
            padding: 15px 0;
            border-radius: 30px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 20px;
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

    <div class="container">
        <h1>Attendance Management</h1>
		<button><a href="mark_attendance.php" style="color: white; text-decoration: none;">Mark Attendance</a></button>
		<button><a href="attendance_report.php" style="color: white; text-decoration: none;">Attendance Report</a></button>
		<button><a href="home.php" style="color: white; text-decoration: none;">Back to Home Page</a></button>
    </div>
</body>
</html>
