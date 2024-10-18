<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "SELECT count FROM counter LIMIT 1";
    
    $result = mysqli_query($conn, $sql);
    
    // Check if the query was successful and if there is a result
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the count
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'] +=1 ; // Get the count value
    
        # update data
        $sqlUpdate = "UPDATE counter set count = ?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("i", $count); // Bind the parameter as an integer

        if ($stmt->execute()) {
            echo $count;
        } else {
            throw new Exception("Failed to update count.");
        }
    } else {
        echo "0"; // Return 0 if no result
    }
    
    // Close the connection
    mysqli_close($conn);
}
