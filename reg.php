<?php
// Start session
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "reg";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $rolee = $_POST['rolee'];

    // Encrypt password using password_hash() function
    $hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);

    // Insert data into the registration table
    $stmt1 = $conn->prepare("INSERT INTO register (firstname, lastname, email, mobile, gender, rolee) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt1->bind_param("ssssss", $firstname, $lastname, $email, $mobile, $gender, $rolee);

    if ($stmt1->execute()) {
        // After successful registration, insert data into the login table
        $stmt2 = $conn->prepare("INSERT INTO login (email, passwd, rolee) VALUES (?, ?, ?)");
        $stmt2->bind_param("sss", $email, $hashed_passwd, $rolee);

        if ($stmt2->execute()) {
            // Redirect to login page or another page after successful registration
            $_SESSION['email'] = $email;
            $_SESSION['rolee'] = $rolee;
            header("Location: login.php");
            exit();
        } else {
            echo "Error inserting into login table: " . $conn->error;
        }
        $stmt2->close();
    } else {
        echo "Error inserting into registration table: " . $conn->error;
    }
    $stmt1->close();
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Form</title>
    
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-content">
            <h1>India Eats</h1>
            <p>Your solution for food waste management</p>
        </div>
    </header>

    <!-- Main Registration Form -->
    <div class="main">
        <h2>Registration Form</h2>
        <form action="" method="post">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required />

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />

            <label for="passwd">Password:</label>
            <input type="password" id="passwd" name="passwd" pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" title="Password must contain at least one number, one alphabet, one symbol, and be at least 8 characters long" required />

            <label for="mobile">Contact No:</label>
            <input type="text" id="mobile" name="mobile" maxlength="10" required />

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="rolee">Role:</label>
            <select id="rolee" name="rolee" required>
                <option value="Donor">Donor</option>
                <option value="User">User</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 All rights reserved by India Eats</p>
    </footer>
</body>
</html>
