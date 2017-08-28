<?php

namespace MetricaAsterisk\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CostoLlamadas
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 * @ORM\Table(name="ma_costo_llamadas")
 * @ORM\Entity(repositoryClass="MetricaAsterisk\Repository\CostoLlamadasRepository")
 */
class CostoLlamadas
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
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"troncal","empty_option": "",
     * "target_class":"\MetricaAsterisk\Entity\Troncal", "description":""})
     * @ORM\ManyToOne(targetEntity="\MetricaAsterisk\Entity\Troncal")
     * @ORM\JoinColumn(name="troncal_id", referencedColumnName="id", nullable=true)
     */
    public $troncal = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"tipoDestino","empty_option": "",
     * "target_class":"\MetricaAsterisk\Entity\TipoDestino", "description":""})
     * @ORM\ManyToOne(targetEntity="\MetricaAsterisk\Entity\TipoDestino")
     * @ORM\JoinColumn(name="tipo_destino_id", referencedColumnName="id",
     * nullable=true)
     */
    public $tipoDestino = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"costo", "description":"", "addon":""})
     * @ORM\Column(type="decimal", scale=2, precision=11, unique=false, nullable=true,
     * name="costo")
     */
    public $costo = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTroncal()
    {
        return $this->troncal;
    }

    public function setTroncal($troncal)
    {
        $this->troncal = $troncal;
    }

    public function getTipoDestino()
    {
        return $this->tipoDestino;
    }

    public function setTipoDestino($tipoDestino)
    {
        $this->tipoDestino = $tipoDestino;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function __toString()
    {
return;
    }


}

