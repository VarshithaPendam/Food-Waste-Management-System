<?php
session_start(); // Start a session at the beginning

$login_error = '';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $rolee = $_POST['rolee'];

    // Database connection parameters
    $servername = 'localhost'; // Change to your actual hostname if different
    $username = 'root'; // Change to your actual database username
    $password = ''; // Change to your actual database password
    $database = 'reg'; // Change to your actual database name

    // Establish database connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to protect against SQL injection
    $stmt = $conn->prepare("SELECT * FROM login WHERE email = ? AND passwd = ? AND rolee = ?");
    $stmt->bind_param("sss", $email, $passwd, $rolee);

    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;

    if ($count == 1) {
        // Store session variables
        $_SESSION['email'] = $email;
        $_SESSION['rolee'] = $rolee;

        if ($rolee == 'Donor') {
            header("Location: http://localhost/fwms/donorhome.php/");
        } elseif ($rolee == 'User') {
            header("Location: http://localhost/fwms/userhome.php/");
        }
        exit(); // Ensure no further code is executed after redirection
    } else {
        $login_error = ("Login failed. Invalid email or password." . $conn->connect_error);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - India Eats</title>
    <link rel="stylesheet" href="/IndiaEats/CSS/login.css">
    
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-content">
            <h1>India Eats</h1>
            <p>Your solution for food waste management</p>
        </div>
    </header>

    <!-- Main Login Form Section -->
    <div class="main">
        <h2>Login Form</h2>
        <?php if (!empty($login_error)): ?>
            <div class="error"><?php echo $login_error; ?></div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="passwd">Password:</label>
            <input type="password" id="passwd" name="passwd" required>

            <label for="rolee">Role:</label>
            <select id="rolee" name="rolee" required>
                <option value="Donor">Donor</option>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
            <a class="register-link" href="http://localhost/IndiaEats/reg.php/">Register now</a>
            <a class="register-link" href="http://localhost/IndiaEats/forgot.php/">Forgot password</a>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 All rights reserved by India Eats</p>
    </footer>
</body>
</html>
