<?php
require __DIR__ . '/../vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio Credentials
$sid    = "AC01c60aa38e3057780e9b76191dd85e6c";
$token  = "1d47937b02f311e02eb28cba5c12030b";
$client = new Client($sid, $token);

// Phone numbers
$to   = "+917821059012";      // Student / Faculty Number
$from = "+14632837377";       // Your Twilio Number

// Message
$body = "Your timetable has been updated! Please check the portal.";

// Send SMS
try {
    $message = $client->messages->create($to, [
        "from" => $from,
        "body" => $body
    ]);

    echo "SMS Sent! Message SID = " . $message->sid;
} catch (Exception $e) {
    echo "Error sending SMS: " . $e->getMessage();
}
