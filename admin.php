<!--
<html>
<head>
</head>
<body>
<center>
<form action="" method="POST">

<h1>Admin Login</h1>

<hr><p><i>Enter your details</i></p></hr>

Username:<input type="text" name="name" id="name" value="" placeholder="Enter username"></br>
Password:<input type="password" name="pass" value="" placeholder="Enter Password"></br></br>
<button type="submit">Login</button>
</form>
</center>
</body>
</html>

-->

<?php 
// session_start();
// include("config.php");
// if(isset($_SESSION['login_user']))
// {
	// header("location:home.php");
// }

// if($_SERVER["REQUEST_METHOD"]=="POST")
// {
	// $a=$_POST['name'];
	// $b=($_POST['pass']);
	
	// $qry="SELECT a_id FROM admin WHERE username='$a' AND pass='$b'";
	// $result=mysql_query($qry);
	// $row=mysql_fetch_array($result);
	// $count=mysql_num_rows($result);
	
	// if($count==1)
	// {
		// $_SESSION['login_user']=$a;
		// header("location:home.php");
	// }
	// else
	// {
		// echo "Your username or password is invalid";
	// }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #74b9ff, #0984e3);
        }
        .login-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            text-align: center;
            color: white;
            width: 100%;
            max-width: 400px;
        }
        h1 {
            margin-bottom: 20px;
        }
        hr {
            border: 0;
            height: 1px;
            background: #81ecec;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 14px;
            margin: 12px 0;
            border: none;
            border-radius: 25px;
            text-align: center;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 16px;
        }
        input::placeholder {
            color: #dfe6e9;
        }
        button {
            background: #00cec9;
            color: white;
            padding: 14px 40px;
            border: none;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s ease;
        }
        button:hover {
            background: #0984e3;
        }
        .error-message {
            margin-top: 20px;
            color: #ff7675;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <hr>
        <p><i>Enter your details below</i></p>
        <form action="" method="POST">
            <input type="text" name="name" id="name" placeholder="Username" required><br>
            <input type="password" name="pass" placeholder="Password" required><br><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

<?php 
session_start();
include("config.php");
if(isset($_SESSION['login_user'])) {
    header("location:home.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['name'];
    $b = $_POST['pass'];
    
    $qry = "SELECT a_id FROM admin WHERE username='$a' AND pass='$b'";
    $result = mysqli_query($conn,$qry);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        $_SESSION['login_user'] = $a;
        header("location:home.php");
    } else {
        echo "<div class='error-message'>Your username or password is invalid</div>";
    }
}
?>

