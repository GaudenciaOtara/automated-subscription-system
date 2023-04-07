<?php

// Set response content type to application/json
header('Content-Type: application/json');

// Get the request body sent by Safaricom
$requestBody = file_get_contents('php://input');

// Log the request body for debugging purposes
file_put_contents('log.txt', $requestBody . PHP_EOL, FILE_APPEND);

// Decode the request body from JSON to an array
$data = json_decode($requestBody, true);

// Extract the transaction details from the request body
$transactionType = $data['TransactionType'];
$transactionId = $data['TransID'];
$transactionTime = $data['TransTime'];
$transactionAmount = $data['TransAmount'];
$transactionPhoneNumber = $data['MSISDN'];
$transactionReference = $data['BillRefNumber'];
$transactionResultCode = $data['ResultCode'];
$transactionResultDesc = $data['ResultDesc'];

// Here you can perform any necessary actions based on the transaction details received
// For example, you could update your database with the transaction details or send a notification to the user

// Send a success response back to Safaricom
$response = [
    'ResultCode' => '0',
    'ResultDesc' => 'Transaction completed successfully'
];

echo json_encode($response);
