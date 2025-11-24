<?php
// Database connection
$host = "localhost";
$user = "root"; // Change as per your DB credentials
$password = "";
$database = "timetable_db"; // Change to your database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the JSON input
    $data = json_decode(file_get_contents("php://input"), true);

    // Extract the data
    $id = isset($data["id"]) ? intval($data["id"]) : 0;
    $name = isset($data["name"]) ? trim($data["name"]) : "";
    $code = isset($data["code"]) ? trim($data["code"]) : "";
    $description = isset($data["description"]) ? trim($data["description"]) : "";

    // Validate inputs
    if ($id <= 0 || empty($name) || empty($code)) {
        echo json_encode(["error" => "Invalid data provided"]);
        exit;
    }

    // Update query
    $query = "UPDATE subject_records SET name = ?, code = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $name, $code, $description, $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Subject updated successfully"]);
    } else {
        echo json_encode(["error" => "Failed to update subject"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid request method"]);
}

$conn->close();
?>
