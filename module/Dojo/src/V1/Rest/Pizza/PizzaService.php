<?php

namespace Dojo\V1\Rest\Pizza;

use Jonico\Service\AbstractService;
use Dojo\V1\Rest\Pizza\PizzaEntity;

/**
 * Pizza service manager
 */
class PizzaService extends AbstractService
{

    const SERVICE_CLASS = 'Dojo\Service\Pizza';

    /**
     * List of pizza
     * @param stdClass $params
     * @return ?array
     */
    public function getAll($params = []): ?array
    {
        return $this->em->getRepository(PizzaEntity::class)->findBy((array) $params);
    }

    /**
     * Add pizza
     * @param \stdClass $params
     * @return PizzaEntity
     */
    public function add($params): PizzaEntity
    {
        $pizza = new PizzaEntity();
        $pizza->setName($params->name);
        parent::persist($pizza);
        return $pizza;
    }
}
