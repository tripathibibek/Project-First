<?php
session_start();

if (!isset($_SESSION['islogIn']) || $_SESSION['role'] !== 'owner') {
    header('Location: login.php'); // Redirect if not logged in as an owner
    exit();
}

// Database connection
require_once "database.php";

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $owner_id = $_SESSION['owner_id']; // Assuming owner ID is stored in session

    // Handle file upload
    $photo = $_FILES['photo']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);
    move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);

    // Insert data into homestays table
    $sql = "INSERT INTO homestays (owner_id, title, description, location, price, photo) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "issdss", $owner_id, $title, $description, $price, $location, $photo);

        if (mysqli_stmt_execute($stmt)) {
            echo "<div class='alert alert-success'>Homestay details uploaded successfully. Await admin approval.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error uploading homestay. Please try again.</div>";
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Homestay</title>
</head>
<body>
    <h2>Upload Homestay Details</h2>
    <form action="upload_homestay.php" method="post" enctype="multipart/form-data">
        <label for="title">Homestay Title:</label>
        <input type="text" name="title" required><br>

        <label for="description">Description:</label>
        <textarea name="description" rows="4" required></textarea><br>

        <label for="location">Location:</label>
        <input type="text" name="location" required><br>

        <label for="price">Price:</label>
        <input type="text" name="price" required><br>

        <label for="photo">Upload Photo:</label>
        <input type="file" name="photo" accept="image/*" required><br>

        <input type="submit" name="submit" value="Upload Homestay">
    </form>
</body>
</html>
