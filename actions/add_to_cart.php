<?php
session_start();
include '../config/db.php';

if(isset($_POST['add_to_bag']) && isset($_SESSION['user_id'])){
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];

    // Define items based on ID for the demo
    $items = [1 => "Air Force 1 '07", 2 => "Nike Dunk Low", 3 => "Air Jordan 1", 4 => "Nike Air Max"];
    $item_name = $items[$product_id];
    $price = 5495.00;

    // 1. CREATE: Insert into 'orders' table
    $stmt = $conn->prepare("INSERT INTO orders (user_id, item_name, price) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $user_id, $item_name, $price);

    if($stmt->execute()){
        // 2. LOG: Insert into 'logs' table (Rubric Requirement)
        $action = "Added " . $item_name . " to Bag";
        $conn->query("INSERT INTO logs (user_id, action_made) VALUES ($user_id, '$action')");
        echo "success";
    }
    exit();
}
?>