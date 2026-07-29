<?php

return [
    'name' => 'Multi-POS',
    'version' => '1.0.0',
    'url' => getenv('APP_URL') ?: 'http://localhost',
    'debug' => (bool) (getenv('APP_DEBUG') ?: true),
    'timezone' => 'UTC',
    'subscription_enforcement' => false,
];
