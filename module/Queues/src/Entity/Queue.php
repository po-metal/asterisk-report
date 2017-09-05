<?php

namespace Queues\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Queue
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="q_qname")
 * @ORM\Entity(repositoryClass="Queues\Repository\QueueRepository")
 */
class Queue
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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function __toString()
    {
return;
    }


}

