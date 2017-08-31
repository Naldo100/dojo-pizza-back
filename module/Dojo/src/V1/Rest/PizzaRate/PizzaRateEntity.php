<?php
namespace Dojo\V1\Rest\PizzaRate;

use Doctrine\ORM\Mapping as ORM;
use Dojo\V1\Rest\Pizza\PizzaEntity;
use Dojo\V1\Rest\Member\MemberEntity;

/**
 * PizzaRateEntity
 * @ORM\Table(name="tb_pizza_rate")
 * @ORM\Entity(repositoryClass="PizzaRateRepository")
 */
class PizzaRateEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tb_pizza_rate_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Dojo\V1\Rest\Pizza\PizzaEntity
     *
     * @ORM\ManyToOne(targetEntity="\Dojo\V1\Rest\Pizza\PizzaEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pizza", referencedColumnName="id")
     * })
     */
    private $pizza;

    /**
     * @var \Dojo\V1\Rest\Member\MemberEntity
     *
     * @ORM\ManyToOne(targetEntity="\Dojo\V1\Rest\Member\MemberEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="member", referencedColumnName="id")
     * })
     */
    private $member;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate", type="integer", length=1, nullable=false)
     */
    private $rate;

    public function getId()
    {
        return $this->id;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;
        return $this;
    }

    public function getPizza(): PizzaEntity
    {
        return $this->pizza;
    }

    public function getMember(): MemberEntity
    {
        return $this->member;
    }

    public function setPizza(PizzaEntity $pizza)
    {
        $this->pizza = $pizza;
        return $this;
    }

    public function setMember(MemberEntity $member)
    {
        $this->member = $member;
        return $this;
    }
}
