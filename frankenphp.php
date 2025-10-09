<?php
return [
    'server' => [
        'document_root' => 'pub',
        'host' => '0.0.0.0',
        'port' => 8084,
        'workers' => 4,
        'cpus' => 2,
    ],
    'php' => [
        'memory_limit' => '4G',
        'max_execution_time' => 180,
        'opcache.enable' => 1,
        'opcache.memory_consumption' => 256,
        'opcache.max_accelerated_files' => 20000,
        'realpath_cache_size' => '10M',
        'realpath_cache_ttl' => 7200,
    ],
    'applications' => [
        'magento' => [
            'root' => '/',
            'env' => [
                'MAGE_MODE' => 'developer',
            ]
        ]
    ]
];
