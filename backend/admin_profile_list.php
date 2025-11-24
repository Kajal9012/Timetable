<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "timetable_db");

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Fetch all subjects
$sql = "SELECT * FROM admin_login";
$result = $conn->query($sql);

$adminlogin = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $adminlogin[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($adminlogin);

$conn->close();
?>
