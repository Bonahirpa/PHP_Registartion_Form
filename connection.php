<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP is empty
$dbname = "stud_register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Example: Fetch data from the database
    $sql = "SELECT * FROM users"; // Replace 'users' with your table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode(['status' => 'success', 'data' => $data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No data found']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Close connection
$conn->close();
?>