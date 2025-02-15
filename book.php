
<?php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'tripathihomestayy');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $rooms = $_POST['rooms'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Insert the booking data into the database
    $query = "INSERT INTO booking (name, email, number, rooms, checkin, checkout) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssiss", $name, $email, $number, $rooms, $checkin, $checkout);

    if ($stmt->execute()) {
        echo "<script>alert('Booking submitted successfully!'); window.location.href = 'index.php';</script>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homestay Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .booking-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-top: 15px;
        }
        input, select, button {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #f79d17;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #e68a00;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Restrict past dates for check-in
        var today = new Date().toISOString().split('T')[0];
        var checkinInput = document.getElementById('checkin');
        var checkoutInput = document.getElementById('checkout');

        checkinInput.setAttribute('min', today);
        checkoutInput.setAttribute('min', today);

        // Update the min attribute of checkout date based on the selected check-in date
        checkinInput.addEventListener('change', function () {
            var checkinDate = new Date(this.value);
            var nextDay = new Date(checkinDate);
            nextDay.setDate(checkinDate.getDate() + 1); // Add one day to check-in date
            checkoutInput.setAttribute('min', nextDay.toISOString().split('T')[0]);
        });

        // Validate phone number length
        document.getElementById('number').addEventListener('input', function (event) {
            var phone = event.target.value;
            if (phone.length > 10) {
                event.target.value = phone.slice(0, 10);
            }
        });
    });
</script>


</head>
<body>
    <div class="booking-container">
        <h2>Tripathi Homestay Booking</h2>
        <form action="book.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="number">Phone Number:</label>
                <input type="tel" id="number" name="number" placeholder="Enter your phone number" required pattern="\d{10}" title="Please enter exactly 10 digits">
            </div>
            <div class="form-group">
                <label for="rooms">Number of Rooms:</label>
                <select id="rooms" name="rooms" required>
                    <option value="" disabled selected>Select rooms</option>
                    <option value="1">1 Room</option>
                    <option value="2">2 Rooms</option>
                    <option value="3">3 Rooms</option>
                    <option value="4">4 Rooms</option>
                    <option value="5">5 Rooms</option>
                </select>
            </div>
            <div class="form-group">
                <label for="checkin">Check-in Date:</label>
                <input type="date" id="checkin" name="checkin" required>
            </div>
            <div class="form-group">
                <label for="checkout">Check-out Date:</label>
                <input type="date" id="checkout" name="checkout" required>
            </div>
            <button type="submit">Book Now</button>
        </form>
    </div>
</body>
</html>
