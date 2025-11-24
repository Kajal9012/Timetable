<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Correct path to autoload.php

use Twilio\Rest\Client;  // Correct placement of the 'use' statement

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
$subjectname = $_POST["subjectname"];
$facultyname = $_POST["facultyname"];
$daytask = $_POST["daytask"];
$taskdate = $_POST["taskdate"];
$starttime = $_POST["startTime"];
$endTime = $_POST["endTime"];
$phone = $_POST["phone"];
$classroom = $_POST["classroom"];

// Check if a subject is already assigned on the same date and time slot
$sql_check_schedule = "SELECT * FROM timetable_record 
    WHERE date = '$taskdate' 
    AND start_time = '$starttime' 
    AND end_time = '$endTime'";

$result = $con->query($sql_check_schedule);

if ($result->num_rows > 0) {
    echo "<script>alert('A subject is already scheduled at this time on $taskdate. Please choose a different time slot.');window.location.href='/TimeTable/admin_panel.php';</script>";
    exit();
}

// Insert into database
$sql = "INSERT INTO timetable_record (subject_name, faculty_name, start_time, end_time, day, date, faculty_number, class) 
VALUES ('$subjectname', '$facultyname', '$starttime', '$endTime', '$daytask', '$taskdate', '$phone', '$classroom')";

if ($con->query($sql) === TRUE) {

    $sid = "AC01c60aa38e3057780e9b76191dd85e6c";
    $token = "1d47937b02f311e02eb28cba5c12030b";
    

    
    // Use your Messaging Service SID
    $messagingServiceSid = "MG70eb0d0bb85b755aac190074eeee1632";
    
    try {
        // Initialize Twilio client
        $client = new Client($sid, $token);

        // Format your message
        $message = "Hello $facultyname, your lecture for '$subjectname' is scheduled on $daytask ($taskdate) from $starttime to $endTime in class $classroom.";

        // Validate and sanitize the phone number
        $phoneNumber = '+91' . preg_replace('/[^0-9]/', '', $_POST['phone']); 

        // Send SMS using Messaging Service SID (no need to set 'from')
        $client->messages->create(
            $phoneNumber, // Faculty phone number
            [
                'messagingServiceSid' => $messagingServiceSid, // Messaging Service SID
                'body' => $message
            ]
        );

        $updateNotifySQL = "UPDATE timetable_record 
            SET notify = 1 
            WHERE subject_name = '$subjectname' 
            AND faculty_name = '$facultyname' 
            AND date = '$taskdate' 
            AND start_time = '$starttime'";
            
        if ($con->query($updateNotifySQL) === TRUE) {
            echo "<script>alert('Lecture Added Successfully. SMS sent and notification status updated.'); window.location.href='/TimeTable/admin_panel.php';</script>";
            
        }        

    } catch (Exception $e) {
        // If the SMS fails, display an error
        echo "<script>alert('Lecture Added Successfully. But failed to send SMS: " . addslashes($e->getMessage()) . "'); window.location.href='/TimeTable/admin_panel.php';</script>";
    }

} else {
    echo "<script>alert('". addslashes($con->error) ."');window.location.href='/TimeTable/admin_panel.php';</script>";
}   

$con->close();
?>
