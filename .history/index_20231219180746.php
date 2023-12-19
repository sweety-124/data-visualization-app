<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MySQL Query Form</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container">
    <h1>MySQL Query Form</h1>
  
    <form id="queryForm">
      <label for="hostname">Hostname:</label>
      <input type="text" id="hostname" name="hostname" placeholder="Enter hostname" required>

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter username" required>

      <label for="database">Database:</label>
      <input type="text" id="database" name="database" placeholder="Enter database" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter password" required>

      <label for="query">MySQL Query:</label>
      <textarea id="query" name="query" placeholder="Enter MySQL query" rows="4" required></textarea>

      <label for="search">Search Term:</label>
      <input type="text" id="search" name="search" placeholder="Enter search term">

      <button type="button" onclick="submitForm(false)">Submit Query</button>
      <button type="button" onclick="submitForm(true)">Search</button>
    </form>

    <div id="result"></div>
  </div>

  <script src="assets/script.js"></script>
</body>
</html>


<?php
// index.php

// ... (previous HTML code)

// Backend PHP code for handling database queries
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tableName = $_POST['Sales'];
    
    // Assuming you have a MySQL database, adjust the connection details accordingly
    $servername = "65818a11.dorsy.net";
    $username = "d03f01e0";
    $password = "K5nZ9RXBBwdbDztsaoct";
    $dbname = "d03f01e0";
    
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
