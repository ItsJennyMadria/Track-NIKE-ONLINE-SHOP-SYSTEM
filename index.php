<?php
session_start();
include 'config/db.php'; 
$message = "";

// If the user is ALREADY logged in, skip the login page
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = mysqli_real_escape_string($conn, $_POST["username"]); 
    $password = mysqli_real_escape_string($conn, $_POST["password"]); 
    
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) { 
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        
        header("Location: dashboard.php"); 
        exit(); 
    } else { 
        $message = "Invalid Username or Password."; 
    } 
} 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nike Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; background: #f5f5f5; font-family: 'Helvetica Neue', Arial, sans-serif;">
    <div style="background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 300px;">
        <img src="assets/images/Nike black logo.jfif" width="50" style="display: block; margin: 0 auto 20px;">
        <h2 style="text-align: center; font-weight: 800; letter-spacing: -1px;">YOUR ACCOUNT FOR EVERYTHING NIKE</h2>
        
        <?php if($message): ?>
            <p style="color: red; text-align: center; font-size: 14px;"><?php echo $message; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; box-sizing: border-box;">
            <input type="password" name="password" placeholder="Password" required style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; box-sizing: border-box;">
            <button type="submit" style="width: 100%; padding: 10px; background: black; color: white; border: none; cursor: pointer; font-weight: bold;">SIGN IN</button>
        </form>

        <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #777;">
            Not a member? <a href="register.php" style="color: black; font-weight: bold; text-decoration: underline;">Join Us.</a>
        </p>
    </div>
</body>
</html>