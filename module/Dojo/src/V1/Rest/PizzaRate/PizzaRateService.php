<?php

namespace Dojo\V1\Rest\PizzaRate;

use Jonico\Service\AbstractService;
use Dojo\V1\Rest\Member\MemberEntity;
use Dojo\V1\Rest\Pizza\PizzaEntity;
use Dojo\V1\Rest\PizzaRate\PizzaRateEntity;
use Jonico\Exception\ValidateException;

/**
 * PizzaRate service manager
 */
class PizzaRateService extends AbstractService
{
    const SERVICE_CLASS = 'Dojo\Service\PizzaRate';
    /**
     * List of pizza-rate
     * @param stdClass $params
     * @return array
     */
    public function getAll($params=[]): ?array
    {
        return $this->em->getRepository(PizzaRateEntity::class)->listAll($params);
    }

    /**
     * Add pizza rate
     * @param \stdClass $param
     * @return PizzaRateEntity
     * @throws ValidateException
     */
    public function add($param): PizzaRateEntity
    {
        if($param->rate < 1 || $param->rate > 9){
            throw new ValidateException("Número inválido");
        }

        if ($param->rate % 2 == 0) {
            throw new ValidateException('Número par');
        }

        $pizzaRateExists = $this->em->getRepository(PizzaRateEntity::class)
            ->findBy(['member'=>$param->member,'pizza'=>$param->pizza]);

        if($pizzaRateExists){
            throw new ValidateException('Pizza já cadastrada pelo membro');
        }

        $member = $this->em->getRepository(MemberEntity::class)->find($param->member);
        $pizza = $this->em->getRepository(PizzaEntity::class)->find($param->pizza);
        $pizzaRate = new PizzaRateEntity();
        $pizzaRate->setMember($member);
        $pizzaRate->setPizza($pizza);
        $pizzaRate->setRate($param->rate);
        $this->persist($pizzaRate);
        return $pizzaRate;
    }
}
