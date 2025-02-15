
    <?php include 'header.php';
    include 'config.php';
     ?>
    <?php


// if (!isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit;
// }


?>

<style>
.container1 {
    width: 100%;
    height: 100vh; /* Adjusted height for full-screen effect */
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('banner1.jpg');
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
    font-family: Arial, sans-serif;
    box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.5);
    position: relative;
    top: 0;
     
}
.container2 {
    width: 100%;
    height: 100vh; /* Adjusted height for full-screen effect */
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('b2.jpg');
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
    font-family: Arial, sans-serif;
    box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.5);
}
.container3 {
    width: 100%;
    height: 100vh; /* Adjusted height for full-screen effect */
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('banner3.jpg.jpg');
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
    font-family: Arial, sans-serif;
    box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.5);
}

h2 {
    color: white;
    font-size: 2.5em;
    position: relative;
    top : 10px;
    font-weight: bold;
    margin-bottom: 15px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Adds depth to the heading */
    
}

p {
    color : white;
    font-size: 1.2em;
    line-height: 1.6;
    position: relative;
    top : 5px
    max-width: 800px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5); /* Subtle text shadow for readability */
    margin: 0 auto;
}

    </style>
    
    <?php
// Check if user is logged in
if (isset($_SESSION['username'])) {
    $user_email = $_SESSION['username'];

    // Fetch the user's name from the database
    $query = "SELECT username FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a result was returned
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $username = $user_data['username'];
    } else {
        $username = "Guest"; // Fallback if no user is found
    }

    $stmt->close();
} else {
    $username = "Guest"; // Default value if user is not logged in
}
?>


<style>
/* Adding styles here */
</style>

<section id="home" class="section">
    <div class="container1">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?>, to Tripathi Homestay</h2>
        <p>Experience the comfort and warmth of our homestays, where every moment feels like home.</p>
    </div>
</section>


    <section id="homestays" class="section">
        <div class="container2">
          
            
<?php
// Include the database connection file
include('config.php');

// Check if the user clicked "Book Now"
if (isset($_GET['book'])) {
    $room_id = $_GET['book'];

    // Fetch room details for booking
    $query = "SELECT * FROM guest_rooms WHERE room_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $room_data = $result->fetch_assoc();
    $stmt->close();
}

// Handle the booking form submission
if (isset($_POST['book_room'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $room_id = $_POST['room_id'];

    // Here you can insert the booking information into a bookings table (not shown in this code)
    // For now, just a confirmation message
    echo "<script>alert('Thank you, $user_name. Your booking is confirmed for room ID: $room_id.');</script>";
}
?>


    <style>
        /* Basic card styling */
        .card {
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            text-align: center;
            background-color: #fff;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .card h3 {
            font-size: 1.5em;
            margin: 10px 0;
            color: #007BFF;
        }

        .card p {
            font-size: 1em;
            color: #555;
        }

        .card .actions {
            margin-top: 10px;
        }

        .card .actions a {
            padding: 5px 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        .card .actions a.book-now {
            background-color: #28a745;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .booking-form {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: auto;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Available Guest Rooms</h2>

<!-- Display the guest rooms in cards -->
<div class="container">
    <?php
    // Fetch all guest rooms from the database
    $query = "SELECT * FROM guest_rooms ";  // Only show available rooms
    $result = $conn->query($query);

    // Display each room as a card
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<img src='admin/" . $row['image'] . "' alt='Room Image'>"; 
        echo "<h3>" . $row['room_name'] . "</h3>";
        echo "<p>Type: " . $row['room_type'] . "</p>";
        echo "<p>Max Guests: " . $row['max_guests'] . "</p>";
        echo "<p>Price: Rs." . $row['price'] . " per night</p>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<div class='actions'>";
        echo "<a href='book.php?book=" . $row['room_id'] . "' class='book-now'>Book Now</a>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>

<!-- Display booking form if booking a room -->
<?php
if (isset($room_data)) {
    ?>
    <h3>Book Room: <?php echo $room_data['room_name']; ?></h3>
    <form action="index.php" method="POST" class="booking-form">
        <input type="hidden" name="room_id" value="<?php echo $room_data['room_id']; ?>">

        <label for="user_name">Your Name:</label>
        <input type="text" name="user_name" required>

        <label for="user_email">Your Email:</label>
        <input type="email" name="user_email" required>

        <input type="submit" name="book_room" value="Confirm Booking">
    </form>
    <?php
}
?>
        </div>
    </section>

    <section id="about" class="section">
        <div class="container3">
            <h2>About Us</h2>
            <p>At Tripathi Homestay, we strive to provide a home away from home with unparalleled hospitality.</p>
        </div>
    </section>




    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
