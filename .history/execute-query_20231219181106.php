<?php
// execute-query.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input values from the form
    $hostname = $_POST['hostname'];
    $username = $_POST['username'];
    $database = $_POST['database'];
    $password = $_POST['password'];
    $customQuery = $_POST['customQuery'];

    // Create a connection to the MySQL server
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Execute the custom SQL query
    $result = $conn->query($customQuery);

    if ($result) {
        // Display the query result
        while ($row = $result->fetch_assoc()) {
            echo '<pre>' . print_r($row, true) . '</pre>';
        }
    } else {
        // Display an error message if the query fails
        echo 'Query failed: ' . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
