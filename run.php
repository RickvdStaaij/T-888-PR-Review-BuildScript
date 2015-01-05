<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$phpCsFile = 'dev/reports/checkstyle.xml';
if (file_exists($phpCsFile)) {
    $phpCsXml = require $phpCsFile;
    $phpcs = json_encode((array) simplexml_load_string($phpCsXml));
} else {
    $phpcs = json_encode([]);
}

$client = new Client();
$response = $client->post('http://t888.futureportal.com/result-build.php', [
    'body' => [
        'phpcs' => $phpcs,
    ],
]);

echo $response->getBody();
