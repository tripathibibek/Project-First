<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $rooms = $_POST['rooms'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'tripathihomestayy');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql = "INSERT INTO booking (name, email, number, rooms, checkin, checkout) 
            VALUES ('$name', '$email', '$number', '$rooms', '$checkin', '$checkout')";

    if ($conn->query($sql) === TRUE) {
        // Success message as a JavaScript alert
        echo "<script>
                alert('Booking successful!');
                window.location.href = 'book.php'; // Redirect back to the booking page
              </script>";
    } else {
        // Error message as a JavaScript alert
        echo "<script>
                alert('Error: " . $conn->error . "');
                window.location.href = 'book.php'; // Redirect back to the booking page
              </script>";
    }

    $conn->close();
}
?>
