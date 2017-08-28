<?php

namespace BieiCentral\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MetricaAtencion
 *
 *
 *
 * @author Cristian Icnarnato
 * @license BSD
 * @link -
 * @ORM\Table(name="_metrica_atencion")
 * @ORM\Entity(repositoryClass="BieiCentral\Repository\MetricaAtencionRepository")
 */
class MetricaAtencion
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
     * @Annotation\Options({"label":"objeto", "description":"", "addon":""})
     * @ORM\Column(type="string", length=20, unique=false, nullable=false,
     * name="objeto")
     */
    public $objeto = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"estado", "description":"", "addon":""})
     * @ORM\Column(type="string", length=20, unique=false, nullable=true,
     * name="estado")
     */
    public $estado = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"cantidad", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="cantidad")
     */
    public $cantidad = null;

    /**
     * @Annotation\Type("Zend\Form\Element\DateTime")
     * @Annotation\Attributes({"type":"datetime"})
     * @Annotation\Options({"label":"fecha", "description":"", "addon":""})
     * @ORM\Column(type="datetime", unique=false, nullable=true, name="fecha")
     */
    public $fecha = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getObjeto()
    {
        return $this->objeto;
    }

    public function setObjeto($objeto)
    {
        $this->objeto = $objeto;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function __toString()
    {
        return  $this->objeto;
    }


}

