<?php
namespace Dojo;

use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'Dojo\Service\Pizza' => V1\Rest\Pizza\PizzaServiceFactory::class,
                'Dojo\Service\Member' => V1\Rest\Member\MemberServiceFactory::class,
                'Dojo\Service\PizzaRate' => V1\Rest\PizzaRate\PizzaRateServiceFactory::class,
            ]
        ];
    }
}
