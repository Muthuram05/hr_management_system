<?php
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$team = $_POST['team'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "siteuser";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use prepared statement to prevent SQL injection
$sql = $conn->prepare("INSERT INTO users (name, email, contact, address, team) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("sssss", $name, $email, $contact, $address, $team);

if ($sql->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql->close();
$conn->close();
?>
