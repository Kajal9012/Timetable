<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "timetable_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $facultyId = $_POST['id']; 

    if (!empty($facultyId)) {
        $query = "DELETE FROM faculty_records WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $facultyId);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Faculty record deleted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to delete faculty record"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Invalid Faculty Id"]);
    }
}

$conn->close();
?>