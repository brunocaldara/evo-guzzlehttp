<?php

// https://packagist.org/packages/guzzlehttp/guzzle
// https://docs.guzzlephp.org/en/stable/
// https://guzzle3.readthedocs.io/index.html
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new GuzzleHttp\Client();

$baseUrl = $_ENV['EVO_BASE_URL'];
$serviceUrl = $_ENV['EVO_SERVICE_URL'];
$instance = $_ENV['EVO_INSTANCE_NAME'];
$apiKey = $_ENV['EVO_API_KEY'];
$number = '5528992984838'; //'556384193411';
$text = 'Olá! Texto enviado pelo GuzzleHttp';

$response = $client->request(
  'POST',
  "{$baseUrl}{$serviceUrl}{$instance}",
  [
    'headers' => [
      'content-type' => 'application/json',
      'apiKey' => $apiKey
    ],
    'json' => [
      'number' => $number,
      'text' => $text,
      'delay' => 1200
    ]
  ]
);

// Parse the response object, e.g. read the headers, body, etc.
$headers = $response->getHeaders();
$body = $response->getBody();
$statusCode = $response->getStatusCode();

// Output headers and body for debugging purposes
var_dump($headers, $body, $statusCode);
