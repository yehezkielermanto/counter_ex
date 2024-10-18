<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $count = 0;

    $sqlUpdate = "UPDATE counter set count = ?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("i", $count); // Bind the parameter as an integer

    if ($stmt->execute()) {
        echo $count;
    } else {
        throw new Exception("Failed to update count.");
    }
    
    // Close the connection
    mysqli_close($conn);
}
