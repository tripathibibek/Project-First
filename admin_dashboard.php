<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
<head>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

.dashboard {
    display: flex;
    min-height: 100vh;
}

.sidebar {
    background-color: #333;
    color: white;
    width: 200px;
    padding: 20px;
}

.sidebar ul {
    list-style-type: none;
}

.sidebar ul li {
    margin: 20px 0;
}

.menu-item {
    background-color: #444;
    border: none;
    color: white;
    font-size: 18px;
    padding: 10px;
    width: 100%;
    text-align: left;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.menu-item:hover {
    background-color: #555;
}

.main-content {
    flex: 1;
    padding: 20px;
    background-color: white;
}

h1 {
    color: #333;
}

p {
    color: #666;
}

    </style>

</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <ul>
            <li><a href="booking.php"><button class="menu-item">Booking</button></a></li>
                <li><a href="#"><button class="menu-item">Guest</button></a></li>
                <li><a href="homestay.php"><button class="menu-item">Homestay</button></a></li>
                <li><a href="#" ><button class="menu-item">Owner</button></a></li>
                <li><a href="#"><button class="menu-item">Payment</button></a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Admin Dashboard</h1>
            <p>Manage all the aspects of the homestay service here.</p>
        </div>
    </div>
   
</body>
</html>
