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
$email = $_POST["email"];
$phone = $_POST["phone"];
$education = $_POST["education"];
$subject = $_POST["subject"];
$gender = $_POST["gender"];
$address = $_POST["address"];

// Check if email already exists in the database
$sql_check_email = "SELECT * FROM faculty_records WHERE email = '$email'";
$result = $con->query($sql_check_email);

if ($result->num_rows > 0) {
    echo "<script>alert('The email address is already registered. Please use a different email.');window.location.href='/TimeTable/admin_panel.php';</script>";
    exit();
}

  // Insert into database
  $sql = "INSERT INTO faculty_records (name, email, phone, education, subject, gender, address) 
  VALUES ('$name', '$email', '$phone', '$education', '$subject', '$gender', '$address')";

if ($con->query($sql) === TRUE) {
echo "<script>alert('Faculty Information Submited Successfully.'); window.location.href='/TimeTable/admin_panel.php';</script>";
} else {
echo "<script>alert('". addslashes($con->error) ."');window.location.href='/TimeTable/admin_panel.php';</script>";
// echo "Error: " . $sql . "<br>" . $con->error;
}   

$con->close();
?>
