<?php
session_start();
include '../config/db.php';

if(isset($_POST['add_to_bag'])){
    $product_id = $_POST['product_id'];
    
    // 1. (Future step) Insert into database table 'cart' here
    
    // 2. Redirect back to dashboard with a success message
    header("Location: ../dashboard.php?message=added");
    exit();
}
?>