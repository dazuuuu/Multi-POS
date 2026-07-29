<?php

return [

    'version' => 'v1',

    'prefix' => 'api/v1',

    'rate_limit' => [
        'default' => env('API_RATE_LIMIT', 60),
        'auth' => env('API_AUTH_RATE_LIMIT', 10),
    ],

    'pagination' => [
        'per_page' => (int) env('API_PER_PAGE', 15),
        'max_per_page' => (int) env('API_MAX_PER_PAGE', 100),
    ],

    'response' => [
        'wrap' => true,
        'include_meta' => true,
    ],

];
