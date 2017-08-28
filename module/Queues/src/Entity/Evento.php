<?php

namespace Queues\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Evento
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="q_qevent")
 * @ORM\Entity(repositoryClass="Queues\Repository\EventoRepository")
 */
class Evento
{

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"eventId", "description":"", "addon":""})
     * @ORM\Id
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="event_id")
     */
    public $eventId = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"event", "description":"", "addon":""})
     * @ORM\Column(type="string", length=50, unique=false, nullable=true, name="event")
     */
    public $event = null;

    public function getEventId()
    {
        return $this->eventId;
    }

    public function setEventId($eventId)
    {
        $this->eventId = $eventId;
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function setEvent($event)
    {
        $this->event = $event;
    }

    public function __toString()
    {
        return  $this->event;
    }


}

