<?php
// query_backend.php

require_once 'db_connect.php';

// Get either the predefined query or the custom query from the frontend
$query = isset($_POST['customQuery']) ? $_POST['customQuery'] : $_POST['query'];

// Execute query
$result = $conn->query($query);

// Prepare data for transmission
$data = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close the connection
$conn->close();

// Send data to the frontend
echo json_encode($data);
?>
