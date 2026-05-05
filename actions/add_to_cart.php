<?php
session_start();
include '../config/db.php';

if(isset($_POST['add_to_bag'])){
    $product_id = $_POST['product_id'];
    // Your database insert code here...
    
    echo "success"; // This is the ONLY thing the browser should see
    exit();
}
?>