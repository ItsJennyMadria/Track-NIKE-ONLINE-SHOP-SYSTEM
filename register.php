<html>

<head>
    <title>REGISTRATION</title>
</head>

<body>

    <div>
        <?php
        if(isset($_POST['create'])){
          echo 'User submitted.';  
        }
    ?>
    </div>

    <div>
        <form action="register.php" method="POST">
            <div class="container"></div>
            <h1>REGISTRATION</h1>
            <p>Fill up the form with correct values.</p>
            <label for="firstname"><b>First Name</b></label>
            <input type="text" name="firstname" required>

            <label for="lastname"><b>Last Name</b></label>
            <input type="text" name="lastname" required>

            <label for="email"><b>Email Address</b></label>
            <input type="email" name="email" required>

            <label for="phonenumber"><b>Phone Number</b></label>
            <input type="text" name="phonenumber" required>

            <label for="password"><b>Password</b></label>
            <input type="password" name="password" required>

            <input type="submit" name="create" value="Sign Up">


        </form>
    </div>

</body>

</html>