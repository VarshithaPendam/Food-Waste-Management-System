<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Details</title>
    <link rel="stylesheet" href="/IndiaEats/CSS/process.css">
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_vX5iW34dK-IF0UYS-1kXxls14gpFi26owQ&s" alt="Side Image">
        </div>
        <div class="right-side">
            <h2>Food Details</h2>
            <form id="signup-form" method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>

                <label for="contact">Contact</label>
                <input type="text" id="contact" name="contact" required>

                <label for="tof">Type of Food</label>
                <input type="text" id="tof" name="tof" required>

                <label for="qof">Quantity of Food</label>
                <input type="text" id="qof" name="qof" required>

                <label for="addr">Address</label>
                <input type="text" id="addr" name="addr" required>

                <div class="checkbox">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I agree to the <a href="#">Terms of Use</a></label>
                </div>

                <button type="submit">Submit</button>
            </form>
            <?php
            // Start session (if needed)
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

            // Handle form submission
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Escape user inputs for security
                $name = $conn->real_escape_string($_POST['name']);
                $contact = $conn->real_escape_string($_POST['contact']);
                $tof = $conn->real_escape_string($_POST['tof']);
                $qof = $conn->real_escape_string($_POST['qof']);
                $addr = $conn->real_escape_string($_POST['addr']);

                // Insert data into 'donor' table
                $sql = "INSERT INTO donor (name, contact, tof, qof, addr) VALUES ('$name', '$contact', '$tof', '$qof', '$addr')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p>Data saved to the database successfully.</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
