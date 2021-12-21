<?php

return [
    'app' => [

        'path' => env('CMS_PATH', 'cms'),

        'subdomain' => env('CMS_SUBDOMAIN', null),
    ],

    'database' => [
        'table_prefix' => env('CMS_DB_PREFIX', null),
    ],

    'storage' => [
        'uploads' => storage_path('app/jecar/uploads'),
        'cache' => storage_path('app/jecar/cache'),
    ]
];
