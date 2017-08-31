<?php

namespace Dojo\V1\Rest\Member;

use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Description of MemberServiceFactory
 */
class MemberServiceFactory
{

    public function __invoke(ServiceLocatorInterface $objServiceLocator)
    {
        $objEntityManager = $objServiceLocator->get('doctrine.entitymanager.orm_dojo');
        return new MemberService($objEntityManager);
    }

}
