<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = 'customer'; // Default role for new signups

    // Check if username already exists
    $check_user = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $check_user);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username already taken!'); window.location.href='../register.php';</script>";
    } else {
        $query = "INSERT INTO users (username, password, full_name, role) 
                  VALUES ('$username', '$password', '$full_name', '$role')";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Registration Successful! Please Login.'); window.location.href='../index.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>