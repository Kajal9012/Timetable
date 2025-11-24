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

// Get Classroom ID from the request
$classroomId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($classroomId > 0) {
    // Fetch the classroom from the database
    $query = "SELECT * FROM classroom_records WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $classroomId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $classroom = $result->fetch_assoc();
        echo json_encode($classroom);
    } else {
        echo json_encode(["error" => "Class not found"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid Class ID"]);
}

$conn->close();
?>
