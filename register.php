<!DOCTYPE html>
<html>

<head>
    <title>REGISTRATION</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>

    <div>
        <?php
        if (isset($_POST['create'])) {
            echo 'User submitted.';
        }
        ?>
    </div>

    <form action="register.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                    <h1>REGISTRATION</h1>
                    <p>Fill up the form with correct values.</p>

                    <label for="firstname"><b>First Name</b></label>
                    <input class="form-control" type="text" name="firstname" required>

                    <label for="lastname"><b>Last Name</b></label>
                    <input class="form-control" type="text" name="lastname" required>

                    <label for="email"><b>Email Address</b></label>
                    <input class="form-control" type="email" name="email" required>

                    <label for="phonenumber"><b>Phone Number</b></label>
                    <input class="form-control" type="text" name="phonenumber" required>

                    <label for="password"><b>Password</b></label>
                    <input class="form-control" type="password" name="password" required>

                    <input type="submit" name="create" value="Sign Up">

                </div>
            </div>
        </div>
    </form>

</body>

</html>