<?php

namespace MetricaAsterisk\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MetricaQueue
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 * @ORM\Table(name="ma_metrica_queue")
 * @ORM\Entity(repositoryClass="MetricaAsterisk\Repository\MetricaQueueRepository")
 */
class MetricaQueue
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
     * @Annotation\Options({"label":"Queue", "description":"", "addon":""})
     * @ORM\Column(type="string", length=10, unique=false, nullable=true, name="queue")
     */
    public $queue = null;

    /**
     * @Annotation\Type("Zend\Form\Element\DateTime")
     * @Annotation\Attributes({"type":"datetime"})
     * @Annotation\Options({"label":"date", "description":"", "addon":""})
     * @ORM\Column(type="datetime", unique=false, nullable=true, name="date")
     */
    public $date = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Recibidas", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="received")
     */
    public $received = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Atendidas", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="attended")
     */
    public $attended = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Abandonadas", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="abandoned")
     */
    public $abandoned = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Abandonadas SL", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="abandoned_sl")
     */
    public $abandonedSl = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Ofrecida No Atendida", "description":"",
     * "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="unattended_offered")
     */
    public $unattendedOffered = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Tiempo de Espera", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="wait_time")
     */
    public $waitTime = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Tiempo de Espera Promedio", "description":"",
     * "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="avg_wait_time")
     */
    public $avgWaitTime = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Tiempo de Conversación", "description":"",
     * "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="talk_time")
     */
    public $talkTime = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Promedio Tiempo de Conversación",
     * "description":"", "addon":""})
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="avg_talk_time")
     */
    public $avgTalkTime = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Atencion", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=3, unique=false, nullable=true,
     * name="attention")
     */
    public $attention = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Nivel de Servicio", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=3, unique=false, nullable=true,
     * name="service_level")
     */
    public $serviceLevel = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getQueue()
    {
        return $this->queue;
    }

    public function setQueue($queue)
    {
        $this->queue = $queue;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getReceived()
    {
        return $this->received;
    }

    public function setReceived($received)
    {
        $this->received = $received;
    }

    public function getAttended()
    {
        return $this->attended;
    }

    public function setAttended($attended)
    {
        $this->attended = $attended;
    }

    public function getAbandoned()
    {
        return $this->abandoned;
    }

    public function setAbandoned($abandoned)
    {
        $this->abandoned = $abandoned;
    }

    public function getAbandonedSl()
    {
        return $this->abandonedSl;
    }

    public function setAbandonedSl($abandonedSl)
    {
        $this->abandonedSl = $abandonedSl;
    }

    public function getUnattendedOffered()
    {
        return $this->unattendedOffered;
    }

    public function setUnattendedOffered($unattendedOffered)
    {
        $this->unattendedOffered = $unattendedOffered;
    }

    public function getWaitTime()
    {
        return $this->waitTime;
    }

    public function setWaitTime($waitTime)
    {
        $this->waitTime = $waitTime;
    }

    public function getAvgWaitTime()
    {
        return $this->avgWaitTime;
    }

    public function setAvgWaitTime($avgWaitTime)
    {
        $this->avgWaitTime = $avgWaitTime;
    }

    public function getTalkTime()
    {
        return $this->talkTime;
    }

    public function setTalkTime($talkTime)
    {
        $this->talkTime = $talkTime;
    }

    public function getAvgTalkTime()
    {
        return $this->avgTalkTime;
    }

    public function setAvgTalkTime($avgTalkTime)
    {
        $this->avgTalkTime = $avgTalkTime;
    }

    public function getAttention()
    {
        return $this->attention;
    }

    public function setAttention($attention)
    {
        $this->attention = $attention;
    }

    public function getServiceLevel()
    {
        return $this->serviceLevel;
    }

    public function setServiceLevel($serviceLevel)
    {
        $this->serviceLevel = $serviceLevel;
    }

    public function __toString()
    {
        return  $this->queue;
    }


}

