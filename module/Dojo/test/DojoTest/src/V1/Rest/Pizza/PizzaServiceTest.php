<?php

namespace DojoTest\V1\Rest\Pizza;

use PHPUnit\Framework\TestCase;
use Jonico\Test\Bootstrap;
use Dojo\V1\Rest\Pizza\PizzaService;
use Zend\Stdlib\Parameters;

/**
 * @group pizza
 */
class PizzaServiceTest extends TestCase
{

    /**
     * @var PizzaService
     */
    private $service;
    private $em;

    /**
     * @function setUp
     * Função à ser executada na inicialização do teste unitário
     */
    public function setUp()
    {
        $this->em = Bootstrap::getServiceManager()->get('doctrine.entitymanager.orm_dojo');
        $this->em->getConnection()->beginTransaction();
        $this->service = Bootstrap::getServiceManager()->get(PizzaService::SERVICE_CLASS);
    }

    /**
     * @function tearDown
     * Função à ser utilizada na finalização do teste unitário
     */
    public function tearDown()
    {
        $this->em->getConnection()->rollback();
    }

    /**
     * @group pizza-getall
     */
    public function testGetAll()
    {
        $arrPizza = $this->service->getAll();
        $this->assertNotEmpty($arrPizza);
    }

    /**
     * @group pizza-getall-for-name
     */
    public function testGetAllForName()
    {
        $arrPizza = $this->service->getAll(['name' => 'Marguerita']);
        $this->assertNotEmpty($arrPizza);
        $this->assertEquals('Marguerita', $arrPizza[0]->getName());
    }

    /**
     * @group pizza-getall-for-name-not-exists
     */
    public function testGetAllForNameNotExists()
    {
        $arrPizza = $this->service->getAll(['name' => 'Não existente']);
        $this->assertEmpty($arrPizza);
    }

    /**
     * @group pizza-add
     */
    public function testAdd()
    {
        $params = new Parameters(['name' => 'Pizza Teste']);
        $pizza = $this->service->add($params);
        $this->assertNotEmpty($pizza->getId());
    }

}
