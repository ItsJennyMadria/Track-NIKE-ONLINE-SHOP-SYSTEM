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
</head>

<body>
    <h2>Login Form</h2>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
    <p><?php echo $message; ?></p>
</body>

</html>