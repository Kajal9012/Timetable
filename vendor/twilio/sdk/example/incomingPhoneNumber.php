<?php
require(__DIR__.'/../src/Twilio/autoload.php');

use Twilio\Rest\Client;

$sid = "AC01c60aa38e3057780e9b76191dd85e6c";
$token = "1d47937b02f311e02eb28cba5c12030b";
$client = new Client($sid, $token);

function buyNumber(): ?Twilio\Rest\Api\V2010\Account\IncomingPhoneNumberInstance{
    // Look up some phone numbers
    global $client;

    // Specify the [ISO country code](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) of the country
    // from which to read phone numbers, eg: "US"
    $numbers = $client->availablePhoneNumbers("XX")->local->read();

    // Buy the first phone number
    if(!empty($numbers)){
        $local = $numbers[0];
        return $client->incomingPhoneNumbers->create(["phoneNumber" => $local->phoneNumber]);
    }

    return null;
}

// Get a number
$number = buyNumber();
print("Twilio purchased phoneNumber: ".$number->phoneNumber."\n");