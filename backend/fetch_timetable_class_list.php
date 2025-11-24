<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "timetable_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["success" => false, "error" => "Connection failed: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents("php://input"), true);

if (empty($data["class"])) {
    echo json_encode(["success" => false, "error" => "Please Select The Class!"]);
    exit;
}

$classValue = trim($data["class"]);

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT day, subject_name, faculty_name, notify FROM timetable_record WHERE class = ?");
$stmt->bind_param("s", $classValue);
$stmt->execute();
$result = $stmt->get_result();

$timetable = [
    'Monday' => [],
    'Tuesday' => [],
    'Wednesday' => [],
    'Thursday' => [],
    'Friday' => [],
    'Saturday' => []
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $day = ucfirst(strtolower($row['day']));
        if (isset($timetable[$day])) {
            $timetable[$day][] = $row;
        }
    }
    echo json_encode(["success" => true, "timetable" => $timetable]);
} else {
    echo json_encode(["success" => false, "error" => "No timetable found"]);
}

$conn->close();
?>
