<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
$response = $client->post('http://t888.futureportal.com/result-build.php', [
    'test' => 'omg this is an actual test result'
]);

echo $response->getBody();
