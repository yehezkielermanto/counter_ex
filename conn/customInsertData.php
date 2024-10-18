<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # update data
    $customNumber = $_POST['number'];
    if($customNumber){
        $sqlUpdate = "UPDATE counter set count = ?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("i", $customNumber); // Bind the parameter as an integer
    
        if ($stmt->execute()) {
            echo $customNumber;
        } else {
            throw new Exception("Failed to update count.");
        }
    }else{
        echo "0";
    }
    
    // Close the connection
    mysqli_close($conn);
}
