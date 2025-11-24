<?php
session_start(); // Start session for additional security
$servername = "localhost";
$db_username = "root"; 
$db_password = "";
$database = "timetable_db";

// Create connection
$con = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get form data
$username = $_POST["username"];
$password = $_POST["password"];

// Use prepared statements to prevent SQL injection
$stmt = $con->prepare("SELECT password FROM admin_login WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check login credentials
if ($row = $result->fetch_assoc()) {
    if ($password === $row['password']) { // Use password_verify() if passwords are hashed
        // Generate a secure auth token
        $authToken = bin2hex(random_bytes(32)); // 64-character secure token
        
        // Set cookie (valid for 1 day, only accessible via HTTP)
        setcookie("authToken", $authToken, time() + (86400), "/", "", false, true);
        // Store token in session (extra security)
        $_SESSION["authToken"] = $authToken;
        $_SESSION["username"] = $username; 
        
        echo "<script>alert('Welcome to Admin Panel'); window.location.href='/TimeTable/admin_panel.php';</script>";
    } else {
        echo "<script>alert('Invalid username or password'); window.location.href='/TimeTable/index.php';</script>";
    }
} else {
    echo "<script>alert('Invalid username or password'); window.location.href='/TimeTable/index.php';</script>";
}

// Close connection
$stmt->close();
$con->close();
?>
