<?php

include 'conn.php';

$sql = "SELECT count FROM counter LIMIT 1";

$result = mysqli_query($conn, $sql);

// Check if the query was successful and if there is a result
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the count
    $row = mysqli_fetch_assoc($result);
    $count = $row['count']; // Get the count value
    echo $count; // Return it as JSON
} else {
    echo "0"; // Return 0 if no result
}

// Close the connection
mysqli_close($conn);
