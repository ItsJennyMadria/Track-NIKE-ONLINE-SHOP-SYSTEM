<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike Online Shop</title>
    
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
<?php
session_start();
include 'config/db.php';


/*if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}*/

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; 
?>
<nav class="nike-navbar">
    <div class="logo">
        <img src="assets/images/Nike black logo.jfif" alt="Nike Logo" width="60">
    </div>
    <ul class="nav-links">
        <li><a href="#">New Releases</a></li>
        <li><a href="#">Men</a></li>
        <li><a href="#">Women</a></li>
        <li><a href="#">My Locker</a></li> </ul>
    <div class="user-profile">
        <span>Hello, <?php echo $username; ?></span>
        <a href="actions/logout.php">Logout</a>
    </div>
</nav>
<main class="shop-container">
    <h2>New Nike Releases</h2>
    <div class="product-grid">
        <div class="product-card">
            <img src="assets/images/NikeAir Force 1 '07.jpg" alt="Air Force 1">
            <h3>Air Force 1 '07</h3>
            <p>₱5,495</p>
            <button class="buy-btn">Add to Bag</button>
        </div>
        <div class="product-card">
            <img src="assets/images/NikeAir Force 1 '07.jpg" alt="Air Force 1">
            <h3>Air Force 1 '07</h3>
            <p>₱5,495</p>
            <button class="buy-btn">Add to Bag</button>
        </div>
        <div class="product-card">
            <img src="assets/images/NikeAir Force 1 '07.jpg" alt="Air Force 1">
            <h3>Air Force 1 '07</h3>
            <p>₱5,495</p>
            <button class="buy-btn">Add to Bag</button>
        </div>
        <div class="product-card">
            <img src="assets/images/NikeAir Force 1 '07.jpg" alt="Air Force 1">
            <h3>Air Force 1 '07</h3>
            <p>₱5,495</p>
            <button class="buy-btn">Add to Bag</button>
        </div>x bn,
    </div>
</main>

