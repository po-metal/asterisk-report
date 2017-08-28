<?php

namespace Queues\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Stats
 *
 *
 *
 * @author
 * @license
 * @link
 * @ORM\Table(name="q_queue_stats")
 * @ORM\Entity(repositoryClass="Queues\Repository\StatsRepository")
 */
class Stats
{

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"queueStatsId", "description":"", "addon":""})
     * @ORM\Id
     * @ORM\Column(type="integer", length=11, unique=false, nullable=true,
     * name="queue_stats_id")
     */
    public $queueStatsId = null;

    public function getQueueStatsId()
    {
        return $this->queueStatsId;
    }

    public function setQueueStatsId($queueStatsId)
    {
        $this->queueStatsId = $queueStatsId;
    }

    public function __toString()
    {
return;
    }


}

