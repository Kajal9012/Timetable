<?php
require __DIR__ . '/../vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio Credentials
$sid    = "AC01c60aa38e3057780e9b76191dd85e6c";
$token  = "1d47937b02f311e02eb28cba5c12030b";
$client = new Client($sid, $token);

// Get last 10 usage records
$records = $client->usage->records->read([], 10);

foreach ($records as $record) {
    echo "Category: " . $record->category . "\n";
    echo "Description: " . $record->description . "\n";
    echo "Usage: " . $record->usage . " " . $record->usageUnit . "\n";
    echo "Price: " . $record->price . " " . $record->priceUnit . "\n";
    echo "Start Date: " . $record->startDate->format("Y-m-d H:i:s") . "\n";
    echo "End Date: " . $record->endDate->format("Y-m-d H:i:s") . "\n";
    echo "------------------------------------------\n";
}
