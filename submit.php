<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "blood donor"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$your_Name = $_POST['your_Name'];
$blood_Group = $_POST['blood_Group'];
$contact_Number = $_POST['contact_Number'];
$sql = "INSERT INTO donors (Your Name, Blood Group,Contact Number) VALUES ('$your_Name', '$blood_Group', '$contact_Number')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
