<?php
require(__DIR__.'/../src/Twilio/autoload.php');

use Twilio\Rest\Client;

$sid = "AC01c60aa38e3057780e9b76191dd85e6c";
$token = "1d47937b02f311e02eb28cba5c12030b";
$client = new Client($sid, $token);

// Create Trunk
$trunk = $client->trunking->v1->trunks->create(
    [
        "friendlyName" => "shiny trunk",
        "secure" => false
    ]
);
print("\n".$trunk."\n");