<?php
require __DIR__ . '/../vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio credentials
$sid    = "AC01c60aa38e3057780e9b76191dd85e6c";
$token  = "1d47937b02f311e02eb28cba5c12030b";
$client = new Client($sid, $token);

// Sender (Twilio purchased number)
$from = "+14632837377";  // Your Twilio number

// Bulk phone numbers
$numbers = [
    "+917821059012",
    "+91XXXXXXXXXX",
    "+91XXXXXXXXXX"
];

$messageBody = "Hello! This is a bulk SMS from timetable system.";

$success = 0;
$failed = 0;

foreach ($numbers as $to) {
    try {
        $sms = $client->messages->create($to, [
            'from' => $from,
            'body' => $messageBody
        ]);
        echo "✔ Sent to: $to | SID: {$sms->sid}\n";
        $success++;
    } catch (Exception $e) {
        echo "✘ Failed to send to: $to | Error: " . $e->getMessage() . "\n";
        $failed++;
    }
}

echo "\nTotal Sent: $success | Failed: $failed\n";
