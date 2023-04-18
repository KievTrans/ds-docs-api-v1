<?php

$api_key = 'Your API-key';

$api_url = 'https://api.dshield.co/v1/payment';

// Prepare the data
$data = array(
    'client_id' => '42',
    'client_email' => 'example@mail.com',
    'amount' => '100',
    'currency' => 'USD',
    'description' => 'Short description of the transaction',
    'success_url' => 'https://example.com/thank-you',
    'failed_url' => 'https://example.com/error',
    'callback_url' => 'https://example.com/callback'
);

// CURL setup 
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => ["api-key: $api_key"]
));

// Make a request
$response = curl_exec($curl);

curl_close($curl);

// Parse the response
$result = json_decode($response, true);

// Print the result
var_dump($result);
