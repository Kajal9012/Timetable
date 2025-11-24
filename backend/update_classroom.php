<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json");

// Database connection
$host = "localhost";
$user = "root"; // Change as per your DB credentials
$password = "";
$database = "timetable_db"; // Change to your database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the JSON input
    $data = json_decode(file_get_contents("php://input"), true);

    // Extract the data
    $id = isset($data["id"]) ? intval($data["id"]) : 0;
    $name = isset($data["name"]) ? trim($data["name"]) : "";
    $capacity = isset($data["capacity"]) ? intval($data["capacity"]) : 0; // Assuming capacity is a number

    // Validate inputs
    if ($id <= 0 || empty($name) || $capacity <= 0) {
        echo json_encode(["error" => "Invalid data provided"]);
        exit;
    }

    // Update query
    $query = "UPDATE classroom_records SET name = ?, capacity = ? WHERE id = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo json_encode(["error" => "Failed to prepare statement"]);
        exit;
    }

    $stmt->bind_param("sii", $name, $capacity, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Classroom updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update classroom"]);
    }

    $stmt->close();
    exit;
} else {
    echo json_encode(["error" => "Invalid request method"]);
    exit;
}

$conn->close();
exit;
?>
