<?php

$requestUri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

if ($requestUri === '/api/health') {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'ok']);
    exit;
}

echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Multi POS</title></head><body>';
echo '<h1>Multi POS</h1>';
echo '<p>The app entry point is working.</p>';
echo '</body></html>';

