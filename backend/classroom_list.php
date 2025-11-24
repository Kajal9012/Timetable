<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$database = "timetable_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

// Fetch alumni data
$sql = "SELECT * FROM classroom_records";
$result = $conn->query($sql);

$facultyData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $facultyData[] = $row;
    }
}

// Convert to JSON
header('Content-Type: application/json');
echo json_encode($facultyData);

$conn->close();
?>
