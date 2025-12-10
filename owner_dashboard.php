<?php
session_start();

if (!isset($_SESSION['islogIn']) || $_SESSION['role'] !== 'owner') {
    header('Location: login.php'); // Redirect if not logged in as owner
    exit();
}

require_once "database.php";

// Fetch homestays uploaded by the owner
$owner_id = $_SESSION['owner_id'];
$sql = "SELECT * FROM homestays WHERE owner_id = ? ORDER BY created_at DESC";
$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $owner_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard</title>
</head>
<body>
    <h2>Owner Dashboard</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>
                    <h3>" . htmlspecialchars($row['title']) . "</h3>
                    <p>Status: " . htmlspecialchars($row['status']) . "</p>
                    <p>Location: " . htmlspecialchars($row['location']) . "</p>
                    <p>Price: $" . htmlspecialchars($row['price']) . "</p>
                    <img src='uploads/" . htmlspecialchars($row['photo']) . "' alt='Homestay Photo' width='200'>
                </div><br>";
        }
    } else {
        echo "<p>No homestays uploaded yet.</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    ?>
</body>
</html>
