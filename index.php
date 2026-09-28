<?php

header('Content-Type: application/json');

$location = $_GET['location'] ?? '';
$sensorId = $_GET['sensorId'] ?? '';

// If no location is provided, use a default based on sensor ID
if ($location === '') {
    switch ($sensorId) {
        case '1':
            $location = 'Living Room';
            break;
        case '2':
            $location = 'Bedroom';
            break;
        case '3':
            $location = 'Kitchen';
            break;
        default:
            $location = 'Unknown';
    }
}

// If no sensor ID is provided, generate one based on location
if ($sensorId === '') {
    switch ($location) {
        case 'Living Room':
            $sensorId = '1';
            break;
        case 'Bedroom':
            $sensorId = '2';
            break;
        case 'Kitchen':
            $sensorId = '3';
            break;
        default:
            $sensorId = '0';
    }
}

// Generate random temperature from 18.0 to 30.0 °C
$temperature = rand(180, 300) / 10;

$response = [
    'location' => $location,
    'sensorId' => $sensorId,
    'temperature' => $temperature,
    'unit' => 'C'
];

echo json_encode($response, JSON_PRETTY_PRINT);