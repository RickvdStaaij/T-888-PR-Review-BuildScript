<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$result = [
    'build' => 'done'
];

$phpCsFile = 'dev/reports/checkstyle.xml';
if (file_exists($phpCsFile)) {
    $phpCsXml = file_get_contents($phpCsFile);
    $result['phpcs'] = $phpCsXml;
}

$client = new Client();
$response = $client->post('http://t888.futureportal.com/result-build.php', [
    'body' => [
        $result
    ],
]);

echo $response->getBody();
