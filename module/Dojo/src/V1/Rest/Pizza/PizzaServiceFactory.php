<?php

namespace Dojo\V1\Rest\Pizza;

use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of PizzaServiceFactory
 */
class PizzaServiceFactory
{

    public function __invoke(ServiceLocatorInterface $objServiceLocator)
    {
        $objEntityManager = $objServiceLocator->get('doctrine.entitymanager.orm_dojo');
        return new PizzaService($objEntityManager);
    }

}
