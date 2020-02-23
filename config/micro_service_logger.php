<?php

return [
    'name' => 'MicroServiceLogger',

    'service_name'        => 'Website',
    'force_generate_uuid' => env('MICRO_LOG_FORCE_GENERATE_UUID', false),

    'db_connection' => env('MICRO_LOG_DB_CONNECTION'),
    'details'       => env('MICRO_LOG_DETAILS', true),

    'queue_enable'     => env('MICRO_LOG_QUEUE_ENABLE', false),
    'queue_connection' => env('MICRO_LOG_QUEUE_CONNECTION', env('QUEUE_CONNECTION', 'sync')),
    'queue_name'       => env('MICRO_LOG_QUEUE_NAME', 'default'),

    'processors' => [
        \Mont4\MicroServiceLogger\Processors\LaravelRequestProcessor::class,
        \Monolog\Processor\WebProcessor::class,
        \Monolog\Processor\GitProcessor::class,
    ],
];
