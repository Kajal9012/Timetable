<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "timetable_db";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}   

// Get form data
$name = $_POST["name"];
$capacity = $_POST["capacity"];

// Check if class already exists in the database
$sql_check_class = "SELECT * FROM classroom_records WHERE name = '$name'";
$result = $con->query($sql_check_class);

if ($result->num_rows > 0) {
    echo "<script>alert('The Class is already exists. Please create a different classroom.');</script>";
    exit();
}

$sql = "INSERT INTO classroom_records (name, capacity) 
VALUES ('$name', '$capacity')";

if ($con->query($sql) === TRUE) {
echo "<script>alert('Information Sent Successfully'); window.location.href='/TimeTable/admin_panel.php';</script>";
} else {
echo "<script>alert('". addslashes($con->error) ."');</script>";
// echo "Error: " . $sql . "<br>" . $con->error;
}   

$con->close();
?>
