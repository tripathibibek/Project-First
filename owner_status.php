<?php
session_start();
include('database.php');

// Check if the user is logged in as an owner
if (!isset($_SESSION['isOwner']) || $_SESSION['isOwner'] !== true) {
    header("Location: login.php");
    exit();
}

$owner_id = $_SESSION['owner_id']; // Assuming the owner ID is stored in the session
$sql = "SELECT * FROM homestay_details WHERE owner_id=$owner_id";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Owner Dashboard</title>
</head>
<body>

<h2>Owner Dashboard</h2>
<h3>Uploaded Homestays Status</h3>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Status</th>
    </tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['homestay_title']; ?></td>
        <td><?php echo $row['status']; ?></td>
    </tr>
<?php } ?>

</table>

</body>
</html>
