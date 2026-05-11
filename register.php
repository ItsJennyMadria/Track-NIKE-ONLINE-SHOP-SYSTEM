<!DOCTYPE html>
<html>
<head>
    <title>Nike Registration</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; background: #f5f5f5; font-family: 'Helvetica Neue', Arial, sans-serif;">
    <div style="background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px;">
        <img src="assets/images/Nike black logo.jfif" width="50" style="display: block; margin: 0 auto 20px;">
        <h2 style="text-align: center; font-weight: 800; letter-spacing: -1px;">BECOME A NIKE MEMBER</h2>
        
        <form action="actions/register_action.php" method="POST">
            <input type="text" name="full_name" placeholder="Full Name" required style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; box-sizing: border-box;">
            <input type="text" name="username" placeholder="Username" required style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; box-sizing: border-box;">
            <input type="password" name="password" placeholder="Password" required style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; box-sizing: border-box;">
            
            <p style="font-size: 12px; color: #777; text-align: center; margin: 20px 0;">
                By creating an account, you agree to Nike's Privacy Policy and Terms of Use.
            </p>

            <button type="submit" style="width: 100%; padding: 12px; background: black; color: white; border: none; cursor: pointer; font-weight: bold; text-transform: uppercase;">Join Us</button>
        </form>

        <p style="text-align: center; margin-top: 20px; font-size: 14px;">
            Already a member? <a href="index.php" style="color: black; font-weight: bold; text-decoration: underline;">Sign In.</a>
        </p>
    </div>
</body>
</html>