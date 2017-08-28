<?php

namespace MetricaAsterisk\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MetricaSalientes
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 * @ORM\Table(name="ma_metrica_salientes",uniqueConstraints={@UniqueConstraint(name="unico",
 * columns={"fecha", "origen","tipo_destino", "estado","troncal"})})
 * @ORM\Entity(repositoryClass="MetricaAsterisk\Repository\MetricaSalientesRepository")
 */
class MetricaSalientes
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
     * @Annotation\Options({"label":"origen", "description":"", "addon":""})
     * @ORM\Column(type="string", length=50, unique=false, nullable=true,
     * name="origen")
     */
    public $origen = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"tipoDestino", "description":"", "addon":""})
     * @ORM\Column(type="string", length=20, unique=false, nullable=true,
     * name="tipo_destino")
     */
    public $tipoDestino = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"estado", "description":"", "addon":""})
     * @ORM\Column(type="string", length=50, unique=false, nullable=true,
     * name="estado")
     */
    public $estado = null;

    /**
     * @Annotation\Type("Zend\Form\Element\DateTime")
     * @Annotation\Attributes({"type":"datetime"})
     * @Annotation\Options({"label":"fecha", "description":"", "addon":""})
     * @ORM\Column(type="datetime", unique=false, nullable=true, name="fecha")
     */
    public $fecha = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"troncal", "description":"", "addon":""})
     * @ORM\Column(type="string", length=20, unique=false, nullable=true,
     * name="troncal")
     */
    public $troncal = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"cantidad", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="cantidad")
     */
    public $cantidad = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getOrigen()
    {
        return $this->origen;
    }

    public function setOrigen($origen)
    {
        $this->origen = $origen;
    }

    public function getTipoDestino()
    {
        return $this->tipoDestino;
    }

    public function setTipoDestino($tipoDestino)
    {
        $this->tipoDestino = $tipoDestino;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getTroncal()
    {
        return $this->troncal;
    }

    public function setTroncal($troncal)
    {
        $this->troncal = $troncal;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function __toString()
    {
return;
    }


}

