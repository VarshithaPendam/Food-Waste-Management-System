<?php
session_start();

$reset_error = '';
$reset_success = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Database connection parameters
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'reg';

    // Establish database connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to protect against SQL injection
    $stmt = $conn->prepare("SELECT * FROM login WHERE email = ?");
    $stmt->bind_param("s", $email);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $reset_success = "A password reset link has been sent to your email.";
    } else {
        $reset_error = "No account found with that email.";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="/IndiaEats/CSS/forgot.css">

</head>
<body>
    <header>
        <h1>India Eats</h1>
        <p>Your solution for food waste management</p>
    </header>
    <nav>
        <a href="/IndiaEats/home.php">Home</a>
        <a href="/IndiaEats/about.php">About</a>
        <a href="/IndiaEats/contact.php">Contact</a>
    </nav>
    <main>
        <div class="main">
            <h2>Forgot Password</h2>
            <?php if (!empty($reset_error)): ?>
                <div class="error"><?php echo $reset_error; ?></div>
            <?php endif; ?>
            <?php if (!empty($reset_success)): ?>
                <div class="success"><?php echo $reset_success; ?></div>
            <?php endif; ?>
            <form action="forgot.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <button type="submit" name="submit">Reset Password</button>
            </form>
            <a class="login-link" href="/IndiaEats/login.php">Back to Login</a>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 India Eats. All rights reserved.</p>
    </footer>
</body>
</html>
