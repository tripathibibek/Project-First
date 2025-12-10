<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: white;
        }

        .header .logo {
            font-size: 1.5em;
            font-weight: bold;
        }

        .header nav {
            display: flex;
            gap: 15px;
        }

        .header nav a {
            color: white;
            text-decoration: none;
            font-size: 1em;
        }

        .header nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">Homestay Booking</div>
        <nav>
            <a href="guest.php">Guest</a>
            <a href="homestay.php">Homestay</a>
            <a href="#booking">Booking</a>
            <a href="#payment">Payment</a>
            <a href="#owner">Owner</a>
        </nav>
    </header>
</body>
</html>
