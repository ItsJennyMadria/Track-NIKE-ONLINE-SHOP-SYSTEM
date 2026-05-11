<?php
include '../config/db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE orders SET status='COMPLETED' WHERE order_id='$id'";
    if (mysqli_query($conn, $query)) {
        header("Location: ../locker.php");
    }
}
?>