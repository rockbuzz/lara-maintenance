<?php

return [
    'mode' => env('APP_MAINTENANCE_MODE', false),
    'except' => env('APP_MAINTENANCE_EXCEPT', []) //IPs array
];
