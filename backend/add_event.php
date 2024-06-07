<?php
// Include your database connection file
include 'dbconnection.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $postData = json_decode(file_get_contents("php://input"), true);

    // Extract data from the POST request
    $title = isset($postData['title']) ? $postData['title'] : null;
    $start = isset($postData['start']) ? $postData['start'] : null;
    // $end_date = isset($postData['end']) ? $postData['end'] : null; // Assuming you meant 'end' instead of 'start' here
    $className = isset($postData['className']) ? $postData['className'] : null;


$sql = "INSERT INTO `events`(`title`, `start`, `className`)
VALUES ('$title','$start','$className')";

if ($conn->query($sql) === TRUE) {
  echo "<script>
        alert('Event Added Successfully');
        window.location.href='../organization/events.html';
        </script>
        ";
            } else {
                echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../organization/events.html';
        </script>
        ";
            }



}

?>