<?php

namespace MetricaAsterisk\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Troncal
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 * @ORM\Table(name="ma_troncal")
 * @ORM\Entity(repositoryClass="MetricaAsterisk\Repository\TroncalRepository")
 */
class Troncal
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
     * @ORM\Column(type="string", length=20, unique=false, nullable=true,
     * name="nombre")
     */
    public $nombre = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"prefijo", "description":"", "addon":""})
     * @ORM\Column(type="string", length=10, unique=false, nullable=true,
     * name="prefijo")
     */
    public $prefijo = null;

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

    public function getPrefijo()
    {
        return $this->prefijo;
    }

    public function setPrefijo($prefijo)
    {
        $this->prefijo = $prefijo;
    }

    public function __toString()
    {
        return  $this->nombre;
    }


}

