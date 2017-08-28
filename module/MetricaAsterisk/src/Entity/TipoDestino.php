<?php

namespace MetricaAsterisk\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TipoDestino
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 * @ORM\Table(name="ma_tipo_destino")
 * @ORM\Entity(repositoryClass="MetricaAsterisk\Repository\TipoDestinoRepository")
 */
class TipoDestino
{

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"ID", "description":"", "addon":""})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", length=11, unique=false, nullable=false, name="id")
     */
    public $id = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"nombre", "description":"", "addon":""})
     * @ORM\Column(type="string", length=50, unique=false, nullable=true,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Clase CSS", "description":"", "addon":""})
     * @ORM\Column(type="string", length=20, unique=false, nullable=true, name="class")
     */
    public $class = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"expresionRegular", "description":"", "addon":""})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="expresion_regular")
     */
    public $expresionRegular = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"prioridad", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=2, unique=false, nullable=true,
     * name="prioridad")
     */
    public $prioridad = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function setClass($class)
    {
        $this->class = $class;
    }

    public function getExpresionRegular()
    {
        return $this->expresionRegular;
    }

    public function setExpresionRegular($expresionRegular)
    {
        $this->expresionRegular = $expresionRegular;
    }

    public function getPrioridad()
    {
        return $this->prioridad;
    }

    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;
    }

    public function __toString()
    {
        return  $this->nombre;
    }


}

