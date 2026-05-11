<?php
session_start();
include 'config/db.php';

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) { 
    header("Location: index.php"); 
    exit(); 
}

$username = $_SESSION['username'];

// SQL JOIN: This fulfills your Step 5 (LEFT JOIN) Requirement
$current_user_id = $_SESSION['user_id'];
$log_query = "SELECT users.username, logs.action_made, logs.log_date 
              FROM users 
              LEFT JOIN logs ON users.user_id = logs.user_id 
              WHERE users.user_id = '$current_user_id' 
              ORDER BY logs.log_date DESC LIMIT 5";
$log_result = mysqli_query($conn, $log_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike Online Shop</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="nike-navbar">
        <div class="logo"><img src="assets/images/Nike black logo.jfif" alt="Logo" width="60"></div>
        <ul class="nav-links">
            <li><a href="dashboard.php">New Releases</a></li>
            <li><a href="locker.php">My Locker</a></li>
        </ul>
        <div class="user-profile">
            <span>Hello, <?php echo $username; ?></span>
            <a href="#" onclick="confirmLogout()">Logout</a>

<script>
function confirmLogout() {
    Swal.fire({
        title: 'Ready to leave?',
        text: "You will need to login again to access your bag.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#000',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'actions/logout.php';
        }
    })
}
</script>
        </div>
    </nav>

    <div style="width: 250px; margin: 20px auto;">
        <canvas id="orderChart"></canvas>
    </div>

    <main class="shop-container">
        <h2>New Nike Releases</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="assets/images/NikeAir Force 1 '07.jpg" alt="Shoe">
                <h3>Air Force 1 '07</h3>
                <p>₱5,495</p>
                <form class="ajax-cart-form">
                    <input type="hidden" name="product_id" value="1">
                    <button type="submit" name="add_to_bag" class="buy-btn">Add to Bag</button>
                </form>
            </div>
            <div class="product-card">
                <img src="assets/images/NikeAir Force 1 '07.jpg" alt="Shoe">
                <h3>Nike Dunk Low</h3>
                <p>₱5,495</p>
                <form class="ajax-cart-form">
                    <input type="hidden" name="product_id" value="2">
                    <button type="submit" name="add_to_bag" class="buy-btn">Add to Bag</button>
                </form>
            </div>
        </div>
    </main>

    <section style="padding: 40px; background: #f9f9f9;">
        <h3>System Activity Log (LEFT JOIN)</h3>
        <table border="1" width="100%" style="border-collapse: collapse; text-align: left;">
            <tr style="background: #000; color: #fff;">
                <th>User</th><th>Action Made</th><th>Timestamp</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($log_result)) { ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['action_made'] ?? 'New User - No Activity'; ?></td>
                <td><?php echo $row['log_date'] ?? 'N/A'; ?></td>
            </tr>
            <?php } ?>
        </table>
    </section>

    <script>
        // 1. Chart.js Initialization
        const ctx = document.getElementById('orderChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'Completed'],
                datasets: [{
                    data: [5, 2], 
                    backgroundColor: ['#000', '#777']
                }]
            },
            options: { plugins: { title: { display: true, text: 'Order Stats' } } }
        });

        // 2. AJAX Fetch Logic (Prevents the white "success" page)
        document.querySelectorAll('.ajax-cart-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); 
                const formData = new FormData(this);
                formData.append('add_to_bag', '1');

                fetch('actions/add_to_cart.php', {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.text())
                .then(data => {
                    if (data.trim() === "success") {
                        Swal.fire({
                            title: 'Added to Bag!',
                            icon: 'success',
                            confirmButtonColor: '#000'
                        }).then(() => { location.reload(); }); // Reload to update Activity Log
                    }
                });
            });
        });
    </script>
</body>
</html> 