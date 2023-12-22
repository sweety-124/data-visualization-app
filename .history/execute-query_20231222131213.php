<?php
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
        $data = array();

        while ($row = $result->fetch_assoc()) {
            // Assuming you want to extract a specific column named 'value'
            $data[] = $row['value'];
        }

        // Encode the data as JSON and send it to the client
        echo json_encode($data);
    } else {
        echo 'Query failed: ' . $conn->error;
    }

    $conn->close();
}
?>
