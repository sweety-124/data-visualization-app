<?php
// search.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input values from the form
    $hostname = $_POST['hostname'];
    $username = $_POST['username'];
    $database = $_POST['database'];
    $password = $_POST['password'];
    $searchTerm = $_POST['search'];

    // Create a connection to the MySQL server
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Execute a search query
    $query = "SELECT * FROM your_table WHERE column_name LIKE '%$searchTerm%'";
    $result = $conn->query($query);

    if ($result) {
        // Display the search result
        while ($row = $result->fetch_assoc()) {
            echo '<pre>' . print_r($row, true) . '</pre>';
        }
    } else {
        // Display an error message if the search fails
        echo 'Search failed: ' . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
