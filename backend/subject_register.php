<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "timetable_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Debugging: Check if form data is received
// print_r($_POST); exit();

// Retrieve form data safely
$subject_name = $_POST['subject_name'] ?? '';
$subject_code = $_POST['subject_code'] ?? '';
$subject_description = $_POST['subject_description'] ?? '';

// Validate required fields
if (empty($subject_name) || empty($subject_code)) {
    echo "Subject Name and Code are required!";
    exit();
}

// Insert into database
$sql = "INSERT INTO subject_records (name, code, description) 
        VALUES ('$subject_name', '$subject_code', " . ($subject_description ? "'$subject_description'" : "NULL") . ")";

if ($conn->query($sql) === TRUE) {
    // echo "Subject added successfully!";
    echo "<script>alert('Subject added successfully!'); window.location.href='/TimeTable/admin_panel.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
