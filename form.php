<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
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
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input, select {
            width: 320px;
            padding: 12px;
            margin: 12px 0;
            border: none;
            border-radius: 25px;
            outline: none;
            text-align: center;
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
    <script>
        function validateForm() {
            let name = document.forms["reg"]["name"].value;
            let email = document.forms["reg"]["email"].value;
            let dob = document.forms["reg"]["dob"].value;
            let aadhar = document.forms["reg"]["aadhar"].value;
            
            if (name == "" || email == "" || dob == "" || aadhar == "") {
                alert("All fields must be filled out");
                return false;
            }
            if (!email.includes("@")) {
                alert("Enter a valid email address");
                return false;
            }
            if (aadhar.length != 12 || isNaN(aadhar)) {
                alert("Enter a valid 12-digit Aadhar number");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <button class="back-button" onclick="window.location.href='emp_home.php';">&larr;</button>
    <div class="container">
        <h1>Employee Registration Form</h1> 
        <form id="reg" action="insert_emp.php" method="POST" onsubmit="return validateForm()">
            <input type="text" name="name" id="name" placeholder="Enter Name">
            <select name="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <input type="date" name="dob" id="dob">
            <input type="text" name="email" id="email" placeholder="Enter Email">
            <input type="text" name="city" placeholder="Enter City">
            <input type="text" name="aadhar" placeholder="Enter Aadhar Number">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>


</html>
