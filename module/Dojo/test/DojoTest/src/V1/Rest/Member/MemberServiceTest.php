<?php

namespace DojoTest\V1\Rest\Member;

use PHPUnit\Framework\TestCase;
use Jonico\Test\Bootstrap;
use Dojo\V1\Rest\Member\MemberService;

/**
 * @group member
 */
class MemberServiceTest extends TestCase
{

    /**
     * @var MemberService
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
        $this->service = Bootstrap::getServiceManager()->get(MemberService::SERVICE_CLASS);
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
     * @group member-getall
     */
    public function testGetAll()
    {
        $arrMember = $this->service->getAll();
        $this->assertNotEmpty($arrMember);
    }

    /**
     * @group member-getall-for-name
     */
    public function testGetAllForName()
    {
        $arrMember = $this->service->getAll(['name' => 'Gabriel']);
        $this->assertNotEmpty($arrMember);
        $this->assertEquals('Gabriel', $arrMember[0]->getName());
    }

    /**
     * @group member-getall-for-name-not-exists
     */
    public function testGetAllForNameNotExists()
    {
        $arrMember = $this->service->getAll(['name' => 'Não existente']);
        $this->assertEmpty($arrMember);
    }

}
