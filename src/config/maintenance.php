<?php

return [
    'mode' => env('APP_MAINTENANCE_MODE', false),
    'except' => env('APP_MAINTENANCE_EXCEPT', []), //IPs array
    'server_key_client_ip' => 'X-KEY-CUSTOM' //$_SERVER['X-KEY-CUSTOM']
];
