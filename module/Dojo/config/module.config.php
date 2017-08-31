<?php
return [
    'service_manager' => [
        'factories' => [
            \Dojo\V1\Rest\Pizza\PizzaResource::class => \Dojo\V1\Rest\Pizza\PizzaResourceFactory::class,
            \Dojo\V1\Rest\Member\MemberResource::class => \Dojo\V1\Rest\Member\MemberResourceFactory::class,
            \Dojo\V1\Rest\PizzaRate\PizzaRateResource::class => \Dojo\V1\Rest\PizzaRate\PizzaRateResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'dojo.rest.pizza' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/pizza[/:pizza_id]',
                    'defaults' => [
                        'controller' => 'Dojo\\V1\\Rest\\Pizza\\Controller',
                    ],
                ],
            ],
            'dojo.rest.member' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/member[/:member_id]',
                    'defaults' => [
                        'controller' => 'Dojo\\V1\\Rest\\Member\\Controller',
                    ],
                ],
            ],
            'dojo.rest.pizza-rate' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/pizza-rate[/:pizza_rate_id]',
                    'defaults' => [
                        'controller' => 'Dojo\\V1\\Rest\\PizzaRate\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'dojo.rest.pizza',
            1 => 'dojo.rest.member',
            2 => 'dojo.rest.pizza-rate',
        ],
    ],
    'zf-rest' => [
        'Dojo\\V1\\Rest\\Pizza\\Controller' => [
            'listener' => \Dojo\V1\Rest\Pizza\PizzaResource::class,
            'route_name' => 'dojo.rest.pizza',
            'route_identifier_name' => 'pizza_id',
            'collection_name' => 'pizza',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'name',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Dojo\V1\Rest\Pizza\PizzaEntity::class,
            'collection_class' => \Dojo\V1\Rest\Pizza\PizzaCollection::class,
            'service_name' => 'Pizza',
        ],
        'Dojo\\V1\\Rest\\Member\\Controller' => [
            'listener' => \Dojo\V1\Rest\Member\MemberResource::class,
            'route_name' => 'dojo.rest.member',
            'route_identifier_name' => 'member_id',
            'collection_name' => 'member',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'name',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Dojo\V1\Rest\Member\MemberEntity::class,
            'collection_class' => \Dojo\V1\Rest\Member\MemberCollection::class,
            'service_name' => 'Member',
        ],
        'Dojo\\V1\\Rest\\PizzaRate\\Controller' => [
            'listener' => \Dojo\V1\Rest\PizzaRate\PizzaRateResource::class,
            'route_name' => 'dojo.rest.pizza-rate',
            'route_identifier_name' => 'pizza_rate_id',
            'collection_name' => 'pizza_rate',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'pizza',
                1 => 'member',
                2 => 'rate',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Dojo\V1\Rest\PizzaRate\PizzaRateEntity::class,
            'collection_class' => \Dojo\V1\Rest\PizzaRate\PizzaRateCollection::class,
            'service_name' => 'PizzaRate',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Dojo\\V1\\Rest\\Pizza\\Controller' => 'HalJson',
            'Dojo\\V1\\Rest\\Member\\Controller' => 'HalJson',
            'Dojo\\V1\\Rest\\PizzaRate\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Dojo\\V1\\Rest\\Pizza\\Controller' => [
                0 => 'application/vnd.dojo.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Dojo\\V1\\Rest\\Member\\Controller' => [
                0 => 'application/vnd.dojo.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Dojo\\V1\\Rest\\PizzaRate\\Controller' => [
                0 => 'application/vnd.dojo.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Dojo\\V1\\Rest\\Pizza\\Controller' => [
                0 => 'application/vnd.dojo.v1+json',
                1 => 'application/json',
            ],
            'Dojo\\V1\\Rest\\Member\\Controller' => [
                0 => 'application/vnd.dojo.v1+json',
                1 => 'application/json',
            ],
            'Dojo\\V1\\Rest\\PizzaRate\\Controller' => [
                0 => 'application/vnd.dojo.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Dojo\V1\Rest\Pizza\PizzaEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'dojo.rest.pizza',
                'route_identifier_name' => 'pizza_id',
                'hydrator' => \DoctrineModule\Stdlib\Hydrator\DoctrineObject::class,
            ],
            \Dojo\V1\Rest\Pizza\PizzaCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'dojo.rest.pizza',
                'route_identifier_name' => 'pizza_id',
                'is_collection' => true,
            ],
            \Dojo\V1\Rest\Member\MemberEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'dojo.rest.member',
                'route_identifier_name' => 'member_id',
                'hydrator' => \DoctrineModule\Stdlib\Hydrator\DoctrineObject::class,
            ],
            \Dojo\V1\Rest\Member\MemberCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'dojo.rest.member',
                'route_identifier_name' => 'member_id',
                'is_collection' => true,
            ],
            \Dojo\V1\Rest\PizzaRate\PizzaRateEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'dojo.rest.pizza-rate',
                'route_identifier_name' => 'pizza_rate_id',
                'hydrator' => \DoctrineModule\Stdlib\Hydrator\DoctrineObject::class,
            ],
            \Dojo\V1\Rest\PizzaRate\PizzaRateCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'dojo.rest.pizza-rate',
                'route_identifier_name' => 'pizza_rate_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'Dojo\\V1\\Rest\\PizzaRate\\Controller' => [
            'input_filter' => 'Dojo\\V1\\Rest\\PizzaRate\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Dojo\\V1\\Rest\\PizzaRate\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\ToInt::class,
                        'options' => [],
                    ],
                ],
                'name' => 'pizza',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\ToInt::class,
                        'options' => [],
                    ],
                ],
                'name' => 'member',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\ToInt::class,
                        'options' => [],
                    ],
                ],
                'name' => 'rate',
            ],
        ],
    ],
];
