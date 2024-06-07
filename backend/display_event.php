<?php
require 'dbconnection.php'; 
$display_query = "SELECT * FROM `events`";             
$results = mysqli_query($conn, $display_query);

$events = []; // Initialize an empty array to store events

// Fetch events data from the result set
if ($results) {
    while ($row = mysqli_fetch_assoc($results)) {
        $events[] = $row;
    }
}

// Close the database connection
mysqli_close($conn);

// Convert the events array to JSON format
$jsonData = json_encode($events);

// Output the JSON data
echo $jsonData;
?>
