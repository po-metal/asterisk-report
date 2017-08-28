<?php

namespace CallCenter\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Agent
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link -
 * @ORM\Table(name="agent")
 * @ORM\Entity(repositoryClass="CallCenter\Repository\AgentRepository")
 */
class Agent
{


    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"id", "description":"", "addon":""})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", length=0, unique=false, nullable=false, name="id")
     */
    public $id = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Tipo", "description":"", "addon":""})
     * @ORM\Column(type="string", length=40, unique=false, nullable=true, name="type")
     */
    public $type = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"number", "description":"", "addon":""})
     * @ORM\Column(type="string", length=40, unique=false, nullable=true,
     * name="number")
     */
    public $number = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Nombre", "description":"", "addon":""})
     * @ORM\Column(type="string", length=40, unique=false, nullable=true, name="name")
     */
    public $name = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Estado", "description":"", "addon":""})
     * @ORM\Column(type="string", length=1, unique=false, nullable=true,
     * name="estatus")
     */
    public $estatus = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAgent()
    {
        return $this->agent;
    }

    public function setAgent($agent)
    {
        $this->agent = $agent;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEstatus()
    {
        return $this->estatus;
    }

    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function __toString()
    {
return;
    }


}

