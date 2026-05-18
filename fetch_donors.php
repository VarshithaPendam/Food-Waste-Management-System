<?php
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "reg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, contact, tof, qof, addr FROM donor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['contact']}</td>
                <td>{$row['tof']}</td>
                <td>{$row['qof']}</td>
                <td>{$row['addr']}</td>
                <td><button class='hide'>Hide</button></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No data available</td></tr>";
}

$conn->close();
?>
