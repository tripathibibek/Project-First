<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tripathi Homestay</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="logo.png" alt="Tripathi Homestay Logo" class="logo">
            <h1>Tripathi Homestay</h1>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#homestays">Homestays</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="">Profile</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <!-- Display "Logout" if the user is logged in -->
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <!-- Display "Login" if the user is not logged in -->
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <footer>
</body>
</html>
