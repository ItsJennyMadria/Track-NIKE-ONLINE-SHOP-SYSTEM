<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>

    <?php
if (isset($_POST['create'])) {
    echo "<p class='success'>User submitted.</p>";
}
?>

    <form action="register.php" method="POST">
        <div class="container">

            <h2 class="shop-title">NIKE ONLINE SHOP</h2>
            <h1>REGISTRATION</h1>
            <p>Fill up the form with correct values.</p>

            <label>First Name</label>
            <input type="text" name="firstname" required>

            <label>Last Name</label>
            <input type="text" name="lastname" required>

            <label>Email Address</label>
            <input type="email" name="email" required>

            <label>Phone Number</label>
            <input type="text" name="phonenumber" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <input type="submit" name="create" value="Sign Up">

            <div class="login-link">
                <span>Already have an account?</span>
                <a href="index.php">Log In</a>
            </div>

        </div>
    </form>

</body>

</html>