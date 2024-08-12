<?php
// MySQL server configuration
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password

// Connect to MySQL server
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define the name of the database you want to delete
$database_name = "blood_donation"; // Change this to the name of the database you want to delete

// Define the SQL query to delete the database
$sql = "DROP DATABASE $database_name";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Database deleted successfully";
} else {
    echo "Error deleting database: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
