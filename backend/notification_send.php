<?php
require __DIR__ . '/../vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio Credentials
$account_sid = "AC01c60aa38e3057780e9b76191dd85e6c";
$auth_token = "1d47937b02f311e02eb28cba5c12030b";
$messagingServiceSid = 'MG70eb0d0bb85b755aac190074eeee1632'; 

// MySQL Database Connection
$host = "localhost";
$dbname = "timetable_db";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get records for today's day
$today = date("l"); // Get current day (e.g., Monday, Tuesday)
$sql = "SELECT faculty_name, subject_name, faculty_number, class FROM timetable_record WHERE day = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $client = new Client($account_sid, $auth_token); // Initialize Twilio Client

    while ($row = $result->fetch_assoc()) {
        $faculty_name = $row['faculty_name'];
        $subject_name = $row['subject_name'];
        $faculty_number = trim($row['faculty_number']);
        $class = $row['class'];

        // Ensure the phone number starts with +91
        $phone_number = "+91" . $faculty_number;

        // Validate phone number (10-digit numeric check)
        if (preg_match('/^\+91\d{10}$/', $phone_number)) {
            $message_body = "Hello $faculty_name, you have $subject_name class today for $class.";

            try {
                $message = $client->messages->create(
                    $phone_number,
                    [
                       'messagingServiceSid' => $messagingServiceSid, // Use Messaging Service SID
                       'body' => $message_body
                    ]
                );
                echo "Notification sent to $faculty_name ($phone_number)<br>";
            } catch (Exception $e) {
                echo "Error sending message to $faculty_name: " . $e->getMessage() . "<br>";
            }
        } else {
            echo "Invalid phone number for $faculty_name: $phone_number<br>";
        }
    }
} else {
    echo "No records found for today ($today).";
}

$stmt->close();
$conn->close();
?>
