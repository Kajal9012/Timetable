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

// Get Subject ID from the request
$subjectId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($subjectId > 0) {
    // Fetch the subject from the database
    $query = "SELECT * FROM subject_records WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $subjectId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $subject = $result->fetch_assoc();
        echo json_encode($subject);
    } else {
        echo json_encode(["error" => "Subject not found"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid Subject ID"]);
}

$conn->close();
?>
