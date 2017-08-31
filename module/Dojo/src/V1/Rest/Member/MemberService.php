<?php

namespace Dojo\V1\Rest\Member;

use Jonico\Service\AbstractService;

/**
 * Member service manager
 */
class MemberService extends AbstractService
{

    const SERVICE_CLASS = 'Dojo\Service\Member';

    /**
     * List of pizza
     * @param stdClass $params
     * @return ?array
     */
    public function getAll($params = []): ?array
    {
        return $this->em->getRepository(MemberEntity::class)->findBy((array) $params);
    }
}
