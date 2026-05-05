<?php
session_start();
include '../config/db.php';

if(isset($_POST['add_to_bag'])){
    $product_id = $_POST['product_id'];
    
    // Logic to save to database goes here...

    // THIS IS THE FIX: Instead of echo, we redirect.
    header("Location: ../dashboard.php?message=added");
    exit(); 
}
?>