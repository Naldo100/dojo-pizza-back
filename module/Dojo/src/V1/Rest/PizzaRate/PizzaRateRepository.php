<?php
namespace Dojo\V1\Rest\PizzaRate;

use Doctrine\ORM\EntityRepository;

/**
 * Description of PizzaRateRepository
 *
 * @author fsilva
 */
class PizzaRateRepository extends EntityRepository
{
    /**
     * List all pizza rate
     * @param \stdClass $params
     * @return array
     */
    public function listAll($params=[])
    {
        $queryBuilder = $this->createQueryBuilder('pizzaRate');
        if (isset($params->member) && !empty($params->member)) {
            $queryBuilder->andWhere('pizzaRate.member = :member')->setParameter('member', $params->member);

        }
        if (isset($params->pizza) && !empty($params->pizza)) {
            $queryBuilder->andWhere('pizzaRate.pizza = :pizza')->setParameter('pizza', $params->pizza);

        }
        if (isset($params->rate) && !empty($params->rate)) {
            $queryBuilder->andWhere('pizzaRate.rate = :rate')->setParameter('rate', $params->rate);
        }
        $queryBuilder->orderBy('pizzaRate.member');
        return $queryBuilder->getQuery()->getResult();
    }
}
