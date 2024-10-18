<?php
// Database connection settings
// $servername = "103.163.138.109"; // Database server (usually "localhost")
// $username = "inproori_admin"; // Database username
// $password = "2k;X,Hf^R,9z"; // Database password
// $database = "inproori_counter"; // Name of the database

$servername = "127.0.0.1"; // Database server (usually "localhost")
$username = "yehezkiel"; // Database username
$password = "123"; // Database password
$database = "counter_app"; // Name of the database

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Close the connection
// $conn->close();
?>
