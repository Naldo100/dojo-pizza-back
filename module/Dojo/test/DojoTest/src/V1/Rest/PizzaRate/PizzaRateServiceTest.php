<?php

namespace DojoTest\V1\Rest\Member;

use PHPUnit\Framework\TestCase;
use Jonico\Test\Bootstrap;
use Dojo\V1\Rest\PizzaRate\PizzaRateService;
use Dojo\V1\Rest\Pizza\PizzaService;
use Zend\Stdlib\Parameters;

/**
 * @group pizza-rate
 */
class PizzaRateServiceTest extends TestCase
{

    /**
     * @var PizzaRateService
     */
    private $service;
    /**
     *
     * @var PizzaService
     */
    private $pizzaService;
    private $em;

    const ALEXANDRE = 1;

    /**
     * @function setUp
     * Função à ser executada na inicialização do teste unitário
     */
    public function setUp()
    {
        $this->em = Bootstrap::getServiceManager()->get('doctrine.entitymanager.orm_dojo');
        $this->em->getConnection()->beginTransaction();
        $this->service = Bootstrap::getServiceManager()->get(PizzaRateService::SERVICE_CLASS);
        $this->pizzaService = Bootstrap::getServiceManager()->get(PizzaService::SERVICE_CLASS);
    }

    /**
     * @function tearDown
     * Função à ser utilizada na finalização do teste unitário
     */
    public function tearDown()
    {
        $this->em->getConnection()->rollback();
    }

    public function testGetAll()
    {
        $arrPizzaRate = $this->service->getAll();
        $this->assertNotEmpty($arrPizzaRate);
    }
    /**
     * @group pizza-rate-getall-for-name
     */
    public function testGetAllForName()
    {
        $arrPizzaRate = $this->service->getAll(new Parameters(['member' => self::ALEXANDRE]));
        $this->assertNotEmpty($arrPizzaRate);
        $this->assertEquals('Alexandre', $arrPizzaRate[0]->getMember()->getName());
    }

    /**
     * @group pizza-rate-getall-for-name-not-exists
     */
    public function testGetAllForNameNotExists()
    {
        $arrPizzaRate = $this->service->getAll(new Parameters(['member' => 123213]));
        $this->assertEmpty($arrPizzaRate);
    }

    /**
     * @group pizza-rate-add
     */
    public function testAdd()
    {
        $pizza = $this->pizzaService->add(new Parameters(['name' => 'teste']));
        $arrPizzaRate = $this->service->add(new Parameters(['member' => 2, 'pizza' => $pizza->getId(), 'rate' => 5]));
        $this->assertEquals('Bruno', $arrPizzaRate->getMember()->getName());
    }

}
