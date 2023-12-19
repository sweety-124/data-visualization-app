<?php
// execute-query.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hostname = $_POST['hostname'];
    $username = $_POST['username'];
    $database = $_POST['database'];
    $password = $_POST['password'];
    $customQuery = $_POST['customQuery'];
    $conn = new mysqli($hostname, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($customQuery);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo '<pre>' . print_r($row, true) . '</pre>';
        }
    } else {
        echo 'Query failed: ' . $conn->error;
    }
    $conn->close();
}
?>
