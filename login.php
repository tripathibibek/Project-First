<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tripathi Homestay</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* General body styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Form container styles */
.form-container {
    background-color: white;
    width: 100%;
    max-width: 400px;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    text-align: center;
}

/* Heading styles */
.form-container h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Input field styles */
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px 15px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}

/* Button styles */
button {
    width: 100%;
    padding: 12px 15px;
    background-color: #f79d17;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #e08b14;
}

/* Paragraph and link styles */
p {
    font-size: 14px;
    color: #555;
    margin-top: 15px;
}

p a {
    color: #f79d17;
    text-decoration: none;
    font-weight: bold;
}

p a:hover {
    text-decoration: underline;
}

    </style>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <?php
        require_once 'config.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['username'] = $user['username'];
                    header("Location: index.php");
                    exit;
                } else {
                    echo "<p class='error'>Invalid password.</p>";
                }
            } else {
                echo "<p class='error'>Invalid username or email.</p>";
            }
        }
        ?>
        <form method="POST" action="login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="register.php">Register</a></p>

        </form>
    </div>
</body>
</html>
