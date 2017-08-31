<?php

namespace Dojo\V1\Rest\PizzaRate;

use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of PizzaRateServiceFactory
 */
class PizzaRateServiceFactory
{

    public function __invoke(ServiceLocatorInterface $objServiceLocator)
    {
        $objEntityManager = $objServiceLocator->get('doctrine.entitymanager.orm_dojo');
        return new PizzaRateService($objEntityManager);
    }

}
