<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Visualization App</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container">
    <h1>Data Visualization App</h1>
  
    <label for="tableName">Enter Table Name:</label>
    <input type="text" id="tableName" placeholder="Enter table name">

    <button onclick="queryData()">Query Data</button>

    <div id="visualization"></div>
  </div>

  <script src="assets/script.js"></script>
</body>
</html>

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
