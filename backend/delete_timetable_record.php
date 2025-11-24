<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "timetable_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $timetableId = $_POST['id']; 

    if (!empty($timetableId)) {
        $query = "DELETE FROM  timetable_record WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $timetableId);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Timetable record deleted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to delete timetable record"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Invalid timetable Id"]);
    }
}

$conn->close();
?>