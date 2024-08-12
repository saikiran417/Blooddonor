<?php
// Connect to MySQL database
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Change this if you have a different username
$password = ""; // Change this if you have set a password for MySQL
$dbname = "blood_donation"; // Change this to the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password);

$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->select_db($dbname);
// Create table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    blood_group VARCHAR(5) NOT NULL,
    contact VARCHAR(20) NOT NULL
)";
if ($conn->query($sql_create_table) === FALSE) {
    die("Error creating table: " . $conn->error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $contact = $_POST['contact'];
    // Prepare and bind the INSERT statement
    $stmt = $conn->prepare("INSERT INTO donations (name, blood_group, contact) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $blood_group, $contact);

    // Execute statement
    if ($stmt->execute() === TRUE) {
        echo "Successful submission for Blood donation.";
        // Close statement
        $stmt->close();
        // Close connection
        $conn->close();
        // Redirect back to the main page or show a success message
     // Change this to the appropriate URL
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

// If the code reaches here, it means the form has not been submitted
?>
