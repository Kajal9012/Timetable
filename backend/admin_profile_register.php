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

// Check if 'id' is set in POST request
if (isset($_POST["admin_id"])) {
    // Get form data
    $id = $_POST["admin_id"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    // Update query
    $query = "UPDATE admin_login SET username = ?, email = ?, password = ?, name = ?, phone = ? WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("sssssi", $username, $email, $password, $name, $phone, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Admin Information Saved Successfully.'); window.location.href='/TimeTable/admin_panel.php';</script>";
    } else {
        echo "<script>alert('". addslashes($con->error) ."');window.location.href='/TimeTable/admin_profile.php';</script>";

    }
} else {
    echo json_encode(["error" => "ID is not set in the request"]);
}

$con->close();
?>
