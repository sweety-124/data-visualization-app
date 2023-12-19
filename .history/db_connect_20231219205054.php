<?php
// db_connect.php

$hostname = "your_db_hostname";
$username = "your_db_username";
$password = "your_db_password";
$database = "your_database_name";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
