<?php
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    
if ($username == "admin" && $password == "1234") { 
    $message = "Login Successful!"; 
} else { 
    $message = "Invalid Username or Password."; 
    } 
} 
?>

<!DOCTYPE html>
<html>

<head>
    <title>LOGIN FORM</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <div class="form-container">
        <div class="shop-title">NIKE ONLINE SHOP</div>
        <div class="form-title">LOGIN</div>

        <form method="POST" action="">
            <label>Username:</label><br>
            <input type="text" name="username" required>

            <label>Password:</label><br>
            <input type="password" name="password" required>

            <button type="submit">Log in</button>
        </form>
        <p><?php echo $message; ?></p>

        <div class="login-text">
            Don't have an account? <a href="register.php">Register</a>
        </div>
</body>

</html>