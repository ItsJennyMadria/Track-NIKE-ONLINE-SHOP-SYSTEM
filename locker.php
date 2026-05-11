<?php
session_start();
include 'config/db.php'; 

// 1. Security Check: Redirect to login if session is not set
if (!isset($_SESSION['user_id'])) { 
    header("Location: index.php"); 
    exit(); 
}


$current_user_id = $_SESSION['user_id']; // Get the ID of the person logged in
$query = "SELECT orders.order_id, users.username, orders.item_name, orders.price, orders.status 
          FROM orders 
          INNER JOIN users ON orders.user_id = users.user_id
          WHERE orders.user_id = '$current_user_id'"; 
          $result = mysqli_query($conn, $query); 
?>
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike Locker | My Orders</title>
    
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    
    <style>
        /* Specific Locker Styling to ensure it matches the Nike theme */
        .locker-wrapper { padding: 50px 10%; font-family: 'Helvetica Neue', Arial, sans-serif; }
        .locker-title { font-size: 32px; font-weight: 800; text-transform: uppercase; margin-bottom: 30px; }
        
        .nike-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .nike-table th { border-bottom: 2px solid #000; padding: 15px; text-align: left; text-transform: uppercase; font-size: 14px; }
        .nike-table td { padding: 20px 15px; border-bottom: 1px solid #e5e5e5; vertical-align: middle; }
        
        .status-pill { background: #f5f5f5; padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: bold; text-transform: uppercase; }
        .action-btn { text-decoration: none; font-weight: bold; font-size: 13px; padding: 8px 16px; border-radius: 4px; transition: 0.2s; display: inline-block; }
        .btn-complete { color: #fff; background: #000; margin-right: 5px; }
        .btn-complete:hover { background: #444; }
        .btn-remove { color: #d9534f; border: 1px solid #d9534f; }
        .btn-remove:hover { background: #d9534f; color: #fff; }
    </style>
</head>
<body>

    <nav class="nike-navbar">
        <div class="logo"><img src="assets/images/Nike black logo.jfif" alt="Logo" width="60"></div>
        <ul class="nav-links">
            <li><a href="dashboard.php">New Releases</a></li>
            <li><a href="locker.php" style="border-bottom: 2px solid #000;">My Locker</a></li>
        </ul>
        <div class="user-profile">
            <span>Hello, <?php echo $_SESSION['username']; ?></span>
            <a href="actions/logout.php" style="margin-left: 15px; color: #ff4d4d; font-weight: bold; text-decoration: none;">Logout</a>
        </div>
    </nav>

    <div class="locker-wrapper">
        <h1 class="locker-title">My Locker Items</h1>
        
        <table class="nike-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($row['username']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['item_name']); ?></td>
                        <td>₱<?php echo number_format($row['price'], 2); ?></td>
                        <td><span class="status-pill"><?php echo htmlspecialchars($row['status']); ?></span></td>
                        <td>
                            <a href="actions/complete_order.php?id=<?php echo $row['order_id']; ?>" class="action-btn btn-complete">Mark Complete</a>
                            <a href="actions/delete_order.php?id=<?php echo $row['order_id']; ?>" 
                               class="action-btn btn-remove" 
                               onclick="return confirm('Permanently remove this from your locker?')">Remove</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5" style="text-align: center; padding: 50px; color: #777;">Your locker is currently empty.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <a href="dashboard.php" style="display: inline-block; margin-top: 40px; color: #000; text-decoration: none; font-weight: bold; border-bottom: 2px solid #000;">
            ← RETURN TO SHOP
        </a>
    </div>

</body>
</html>