<?php
include('db.php');

// Fetch metrics
$totalGuests = $conn->query("SELECT COUNT(*) as count FROM guest")->fetch_assoc()['count'];
$totalBookings = $conn->query("SELECT COUNT(*) as count FROM booking")->fetch_assoc()['count'];
$totalHomestays = $conn->query("SELECT COUNT(*) as count FROM homestay")->fetch_assoc()['count'];
$totalPayments = $conn->query("SELECT SUM(amount) as total FROM payment")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <div class="metrics">
            <div class="metric">
                <h2>Total Guests</h2>
                <p><?= $totalGuests ?></p>
            </div>
            <div class="metric">
                <h2>Total Bookings</h2>
                <p><?= $totalBookings ?></p>
            </div>
            <div class="metric">
                <h2>Total Homestays</h2>
                <p><?= $totalHomestays ?></p>
            </div>
            <div class="metric">
                <h2>Total Revenue</h2>
                <p>$<?= $totalPayments ?></p>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="admin.php">Admin Management</a></li>
                <li><a href="booking.php">Bookings</a></li>
                <li><a href="guest.php">Guests</a></li>
                <li><a href="homestay.php">Homestays</a></li>
                <li><a href="owner.php">Owners</a></li>
                <li><a href="payment.php">Payments</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
