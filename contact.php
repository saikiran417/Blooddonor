<?php
// Database connection configuration
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Change this if you have a different username
$password = ""; // Change this if you have set a password for MySQL
$dbname = "contact_details"; // Change this to the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$sql_create_table = "CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    contact VARCHAR(20) NOT NULL
)";
if ($conn->query($sql_create_table) === FALSE) {
    die("Error creating table: " . $conn->error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo"
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $contact = $_POST['contact'];

    // Prepare and bind the INSERT statement
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message, contact) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $message, $contact);

    // Execute statement
    if ($stmt->execute() === TRUE) {
        // Close statement
        $stmt->close();
        // Close connection
        $conn->close();
        // Redirect back to the main page or show a success message
        header("Location: blood_donor.php"); // Redirect to blood_donor.php in the same directory
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

