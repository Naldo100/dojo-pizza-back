<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c] 2014-2016 Zend Technologies USA Inc. (http://www.zend.com]
 */

return [
    'zf-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        'adapters' => [
            'dummy' => [],
        ],
    ],
    'doctrine' => [
        'entitymanager' => [
            'orm_dojo' => [
                'connection' => 'orm_dojo',
                'configuration' => 'orm_dojo'
            ],
        ],
        'connection' => [
            'orm_dojo' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOPgSql\Driver',
                'params' => [
                    'port' => '5432',
                    'host' => '127.0.0.1',
                    'user' => 'postgres',
                    'password' => '12345678',
                    'dbname' => 'db_dojo',
                    'schema' => 'public',
                    'charset' => 'utf8',
                ],
            ],
        ],
        'configuration' => [
            'orm_dojo' => [
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
                'driver' => 'orm_dojo',
                'generate_proxies' => true,
                'proxy_dir' => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace' => 'DoctrineORMModule\Proxy',
                'filters' => []
            ],
        ],
        'driver' => [
            'orm_dojo' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../../module/Dojo/src/Pizza/V1/Rest/Pizza',
                ]
            ],
        ],
    ],
];
