<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$database = "timetable_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $classroomId = $_POST['id']; // Get the classroom ID from the request

    if (!empty($classroomId)) {
        $query = "DELETE FROM classroom_records WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $classroomId);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Classroom record deleted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to delete Classroom record"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Invalid Classroom Id"]);
    }
}

$conn->close();
?>