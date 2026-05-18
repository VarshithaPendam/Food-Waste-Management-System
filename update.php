<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "reg";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize $update variable to false
$update = false;
$updateMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Assuming you have already sanitized or validated your input fields
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd']; // Remember to hash passwords securely
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $rolee = $_POST['rolee'];

    // Example SQL update query
    $sql = "UPDATE users SET firstname=?, lastname=?, email=?, passwd=?, mobile=?, gender=?, rolee=? WHERE user_id=?";

    // Assuming you have a user_id stored in session or passed via hidden input field
    $user_id = $_SESSION['user_id']; // Example of getting user_id from session

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bind_param("sssssssi", $firstname, $lastname, $email, $passwd, $mobile, $gender, $rolee, $user_id);

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        // Set $update to true on successful execution
        $update = true;
        $updateMessage = "Profile updated successfully!";
    } else {
        $updateMessage = "Error updating profile: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details</title>
    
    <link rel="stylesheet" href="/IndiaEats/CSS/update.css">
    <script>
        function setError(id, message) {
            document.getElementById(id).innerText = message;
        }

        function clearErrors() {
            const errors = document.querySelectorAll('.error');
            errors.forEach(error => error.innerText = '');
        }

        function validateForm(event) {
            clearErrors();
            let isValid = true;

            const firstname = document.getElementById('firstname').value;
            if (firstname === '') {
                setError('firstname_error', '*Field is required');
                isValid = false;
            }

            const lastname = document.getElementById('lastname').value;
            if (lastname === '') {
                setError('lastname_error', '*Field is required');
                isValid = false;
            }

            const email = document.getElementById('email').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === '') {
                setError('email_error', '*Field is required');
                isValid = false;
            } else if (!emailPattern.test(email)) {
                setError('email_error', '*Enter valid email address');
                isValid = false;
            }

            const passwd = document.getElementById('passwd').value;
            const passwdPattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,}$/;
            if (passwd === '') {
                setError('passwd_error', '*Field is required');
                isValid = false;
            } else if (!passwdPattern.test(passwd)) {
                setError('passwd_error', '*Minimum length of password must be 6, must contain a symbol and a number');
                isValid = false;
            }

            const mobile = document.getElementById('mobile').value;
            if (mobile === '') {
                setError('mobile_error', '*Field is required');
                isValid = false;
            } else if (mobile.length !== 10) {
                setError('mobile_error', '*Enter valid phone number');
                isValid = false;
            }

            const gender = document.querySelector('input[name="gender"]:checked');
            if (!gender) {
                setError('gender_error', '*Please select a gender');
                isValid = false;
            }

            const rolee = document.getElementById('rolee').value;
            if (rolee === '') {
                setError('rolee_error', '*Field is required');
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }

            return isValid;
        }
    </script>
</head>
<body>
    <header class="header">
        <h1>Update Details</h1>
    </header>
    
    <nav>
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        
                    </li>
                    <li class="nav-item">
                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <?php if ($update): ?>
                <p><?php echo $updateMessage; ?></p>
            <?php endif; ?>
            <form method="post" onsubmit="return validateForm(event);">
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" value="<?php echo $_POST['firstname'] ?? ''; ?>">
                    <span id="firstname_error" class="error"></span>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" value="<?php echo $_POST['lastname'] ?? ''; ?>">
                    <span id="lastname_error" class="error"></span>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>">
                    <span id="email_error" class="error"></span>
                </div>
                <div class="form-group">
                    <label for="passwd">Password:</label>
                    <input type="password" id="passwd" name="passwd">
                    <span id="passwd_error" class="error"></span>
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile:</label>
                    <input type="text" id="mobile" name="mobile" value="<?php echo $_POST['mobile'] ?? ''; ?>">
                    <span id="mobile_error" class="error"></span>
                </div>
                <div class="form-group">
                    <label>Gender:</label>
                    <div class="gender-options">
                        <label for="male">Male</label>
                        <input type="radio" id="male" name="gender" value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'checked' : ''; ?>>
                        <label for="female">Female</label>
                        <input type="radio" id="female" name="gender" value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'checked' : ''; ?>>
                    </div>
                    <span id="gender_error" class="error"></span>
                </div>
                <div class="form-group">
                    <label for="rolee">Role:</label>
                    <input type="text" id="rolee" name="rolee" value="<?php echo $_POST['rolee'] ?? ''; ?>">
                    <span id="rolee_error" class="error"></span>
                </div>
                <div class="form-actions">
                    <button type="submit">Update</button>
                    <button type="reset" class="reset">Reset</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
    <p>&copy; 2024 All rights reserved by India Eats</p>
    </footer>
</body>
</html>
