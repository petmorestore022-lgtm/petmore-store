<?php
return [
    'backend' => [
        'frontName' => 'admin_wzxnrj2'
    ],
    'remote_storage' => [
        'driver' => 'aws-s3',
        'prefix' => 'online-store',
        'config' => [
            'endpoint' => 'https://5e4aa13fb4c7c9e449efef166687d171.r2.cloudflarestorage.com',
            'bucket' => 'petmorestore',
            'region' => 'auto',
            'credentials' => [
                'key' => '367e5c609fe2a7f4c4f5eee15217ab3b',
                'secret' => 'eeba872cec1fb1c36880a07cf5f318ce726862416f2db32f525f22c4b66eb263'
            ],
            'use_path_style_endpoint' => true,
            'path-style' => true
        ]
    ],
    'cache' => [
        'graphql' => [
            'id_salt' => 'VTQs632hNcJSdlPagQW3m31SWurQndUI'
        ],
        'frontend' => [
            'default' => [
                'id_prefix' => '92b_'
            ],
            'page_cache' => [
                'id_prefix' => '92b_'
            ]
        ],
        'allow_parallel_generation' => false
    ],
    'config' => [
        'async' => 0
    ],
    'queue' => [
        'consumers_wait_for_messages' => 1
    ],
    'crypt' => [
        'key' => 'base64fAWeWEk3f2Lg28iLH8L3xsO8tgyKapdDlOC2UYW1KWc'
    ],
    'db' => [
        'table_prefix' => '',
        'connection' => [
            'default' => [
                'host' => 'db:3306',
                'dbname' => 'petmorestore',
                'username' => 'dummy_root',
                'password' => 'testes',
                'model' => 'mysql4',
                'engine' => 'innodb',
                'initStatements' => 'SET NAMES utf8;',
                'active' => '1',
                'driver_options' => [
                    1014 => false
                ]
            ]
        ]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'production',
    'session' => [
        'save' => 'files'
    ],
    'lock' => [
        'provider' => 'db'
    ],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'graphql_query_resolver_result' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1
    ],
    'downloadable_domains' => [
        '${DOWNLOADABLE_DOMAINS}'
    ],
    'install' => [
        'date' => 'Mon, 25 Apr 2025 16:07:40 +0000'
    ],
    'system' => [
        'default' => [
            'catalog' => [
                'search' => [
                    'engine' => 'opensearch',
                    'opensearch_server_hostname' => 'opensearch',
                    'opensearch_server_port' => '9200',
                    'opensearch_index_prefix' => 'localpetmore',
                    'opensearch_server_timeout' => '300',
                    'opensearch_enable_auth' => false,
                    'opensearch_auth_username' => 'admin',
                    'opensearch_auth_password' => 'testes'
                ]
            ],
            'web' => [
                'unsecure' => [
                    'base_media_url' => 'https://media-store.petmore.online/online-store/media/'
                ],
                'secure' => [
                    'base_media_url' => 'https://media-store.petmore.online/online-store/media/'
                ]
            ]
        ]
    ],
    'modules' => [
        'Magento_TwoFactorAuth' => 0,
        'Magento_AwsS3' => 1
    ]
];
