<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nike Online Shop</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php
    session_start();
    include 'config/db.php';
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
            <li><a href="#">My Locker</a></li>
        </ul>
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
                <form action="actions/add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="1">
                    <button type="submit" name="add_to_bag" class="buy-btn">Add to Bag</button>
                </form>
            </div>

            <div class="product-card">
                <img src="assets/images/NikeAir Force 1 '07.jpg" alt="Air Force 1">
                <h3>Air Force 1 '07</h3>
                <p>₱5,495</p>
                <form action="actions/add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="2">
                    <button type="submit" name="add_to_bag" class="buy-btn">Add to Bag</button>
                </form>
            </div>

            <div class="product-card">
                <img src="assets/images/NikeAir Force 1 '07.jpg" alt="Air Force 1">
                <h3>Air Force 1 '07</h3>
                <p>₱5,495</p>
                <form action="actions/add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="3">
                    <button type="submit" name="add_to_bag" class="buy-btn">Add to Bag</button>
                </form>
            </div>

            <div class="product-card">
                <img src="assets/images/NikeAir Force 1 '07.jpg" alt="Air Force 1">
                <h3>Air Force 1 '07</h3>
                <p>₱5,495</p>
                <form action="actions/add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="4">
                    <button type="submit" name="add_to_bag" class="buy-btn">Add to Bag</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartForms = document.querySelectorAll('form[action="actions/add_to_cart.php"]');

            cartForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Stop page reload

                    const formData = new FormData(this);
                    formData.append('add_to_bag', '1'); // Ensure PHP sees the button click

                    fetch('actions/add_to_cart.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            if (data.trim() === "success") {
                                Swal.fire({
                                    title: 'Added to Bag!',
                                    text: 'Nike Air Force 1 07',
                                    icon: 'success',
                                    confirmButtonColor: '#000'
                                });
                            } else {
                                console.log("Server response:", data);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
</body>
</html>