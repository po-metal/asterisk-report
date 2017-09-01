<?php

namespace Cdr\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Cdr
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link -
 * @ORM\Table(name="cdr")
 * @ORM\Entity(repositoryClass="Cdr\Repository\CdrRepository")
 */
class Cdr
{

    /**
     * @Annotation\Type("Zend\Form\Element\DateTime")
     * @Annotation\Attributes({"type":"datetime"})
     * @Annotation\Options({"label":"Fecha", "description":"", "addon":""})
     * @ORM\Column(type="datetime", unique=false, nullable=true, name="calldate")
     */
    public $calldate = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"uniqueid", "description":"", "addon":""})
     * @ORM\Id
     * @ORM\Column(type="string", length=32, unique=false, nullable=false,
     * name="uniqueid")
     */
    public $uniqueid = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Origen", "description":"", "addon":""})
     * @ORM\Column(type="string", length=32, unique=false, nullable=true, name="src")
     */
    public $src = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Destino", "description":"", "addon":""})
     * @ORM\Column(type="string", length=32, unique=false, nullable=true, name="dst")
     */
    public $dst = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Resultado", "description":"", "addon":""})
     * @ORM\Column(type="string", length=32, unique=false, nullable=true,
     * name="disposition")
     */
    public $disposition = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Duración Total", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="duration")
     */
    public $duration = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Tiempo Tarifado", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="billsec")
     */
    public $billsec = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Contexto Destino", "description":"", "addon":""})
     * @ORM\Column(type="string", length=32, unique=false, nullable=true,
     * name="dcontext")
     */
    public $dcontext = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"dstchannel", "description":"", "addon":""})
     * @ORM\Column(type="string", length=32, unique=false, nullable=true,
     * name="dstchannel")
     */
    public $dstchannel = null;

    public function getCalldate()
    {
        return $this->calldate;
    }

    public function setCalldate($calldate)
    {
        $this->calldate = $calldate;
    }

    public function getUniqueid()
    {
        return $this->uniqueid;
    }

    public function setUniqueid($uniqueid)
    {
        $this->uniqueid = $uniqueid;
    }

    public function getSrc()
    {
        return $this->src;
    }

    public function setSrc($src)
    {
        $this->src = $src;
    }

    public function getDst()
    {
        return $this->dst;
    }

    public function setDst($dst)
    {
        $this->dst = $dst;
    }

    public function getDisposition()
    {
        return $this->disposition;
    }

    public function setDisposition($disposition)
    {
        $this->disposition = $disposition;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    public function getBillsec()
    {
        return $this->billsec;
    }

    public function setBillsec($billsec)
    {
        $this->billsec = $billsec;
    }

    public function getDcontext()
    {
        return $this->dcontext;
    }

    public function setDcontext($dcontext)
    {
        $this->dcontext = $dcontext;
    }

    public function getDstchannel()
    {
        return $this->dstchannel;
    }

    public function setDstchannel($dstchannel)
    {
        $this->dstchannel = $dstchannel;
    }

    public function __toString()
    {
return;
    }


}

