<?php
// Database connection
include 'db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from 'guest' table
$sql = "SELECT g_id, g_name, g_email, g_password, g_contact, g_document FROM guest";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Table Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn{
            background:green;
            color:black;
            border-radius: 5px;
            padding: 5px 10px;
            text-decoration: none;
            display: inline-block;
            
        }
    </style>
</head>
<body>

<h2>Guest Table Data</h2>

<table>
    <thead>
        <tr>
            <th>g_id</th>
            <th>g_name</th>
            <th>g_email</th>
            <th>g_contact</th>
            <th>g_document</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['g_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['g_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['g_email']) . "</td>";
                
                echo "<td>" . htmlspecialchars($row['g_contact']) . "</td>";
                echo "<td>" . htmlspecialchars($row['g_document']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        ?>
    </tbody>
</table>
<button class="btn"><a href="admin_dashboard.php">Back</a></button>
<?php
// Close connection
$conn->close();
?>

</body>
</html>
