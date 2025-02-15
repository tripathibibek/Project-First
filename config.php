<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tripathihomestayy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
