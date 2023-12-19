<?php
// db_connect.php

$hostname = $_POST['hostname'];
$username = $_POST['username'];
$database = $_POST['database'];
$password = $_POST['password'];


$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
