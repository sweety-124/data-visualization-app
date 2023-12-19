<?php
// index.php

// ... (previous HTML code)

// Backend PHP code for handling database queries
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tableName = $_POST['tableName'];
    
    // Assuming you have a MySQL database, adjust the connection details accordingly
    $servername = "your-db-host";
    $username = "your-db-user";
    $password = "your-db-password";
    $dbname = "your-db-name";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Query the database
    $query = "SELECT * FROM $tableName";
    $result = $conn->query($query);
    
    // Convert result to an associative array
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    // Return data as JSON
    echo json_encode($data);
    
    // Close connection
    $conn->close();
}
?>
