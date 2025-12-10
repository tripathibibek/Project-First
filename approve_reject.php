<?php
session_start();

if (!isset($_SESSION['islogIn']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php'); // Redirect if not logged in as admin
    exit();
}

require_once "database.php";

// Handle approve or reject action
if (isset($_POST['approve']) || isset($_POST['reject'])) {
    $homestay_id = $_POST['homestay_id'];
    $status = isset($_POST['approve']) ? 'approved' : 'rejected';

    // Update homestay status
    $sql = "UPDATE homestays SET status = ? WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "si", $status, $homestay_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "<div class='alert alert-success'>Homestay status updated successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error updating homestay status.</div>";
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);

// Redirect to the admin dashboard after updating
header('Location: admin_dashboard.php');
exit();
