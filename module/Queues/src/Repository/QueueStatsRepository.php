<?php

namespace Queues\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * QueueStatsRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class QueueStatsRepository extends EntityRepository {

    public function getConnection() {
        return $this->getEntityManager()->getConnection();
    }

    protected $start;
    protected $end;

    public function save(\Queues\Entity\QueueStats $entity) {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(\Queues\Entity\QueueStats $entity) {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    function getStart() {
        return $this->start;
    }

    function getEnd() {
        return $this->end;
    }

    function setStart($start) {
        if (!$start) {
            $this->start = 'date_format(now() - interval 2 hour, "%Y-%m-%d %H:00:00")';
        } else {
            $this->start = $start;
        }
    }

    function setEnd($end) {
        if (!$end) {
            $this->end = 'now()';
        } else {
            $this->end = $end;
        }
    }

    #BASE (received-attended-abandoned-rejected)

    public function getBase($start = null, $end = null) {
        $this->setStart($start);
        $this->setEnd($end);
        $stmt = $this->getConnection()->prepare($this->SqlBase());
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function SqlBase() {
        $sql = 'select '
                . 'date_format(u.datetime,"%Y-%m-%d %H") as date, '
                . 'q.queue as queue, '
                . 'sum(if(u.qevent = 15,1,0)) as received, '
                . 'sum(if(u.qevent = 12,1,0)) as attended, '
                . 'sum(if(u.qevent = 1,1,0)) as abandoned, '
                . 'sum(if(u.qevent = 25,1,0)) as rejected '
                . 'FROM queue_stats as u '
                . 'LEFT JOIN qname as q on u.qname = q.queue_id '
                . 'where '
                . 'u.datetime > "' . $this->getStart() . '" and '
                . 'u.datetime < "' . $this->getEnd() . '" and '
                . '(u.qevent = 15 or u.qevent = 12 or u.qevent = 1 or u.qevent = 25) '
                . 'group by 1,2 ;';
        echo $sql;
        return $sql;
    }

    #RECEIVED

    public function getReceived($start = null, $end = null) {
        $this->setStart($start);
        $this->setEnd($end);
        $stmt = $this->getConnection()->prepare($this->SqlReceived());
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function SqlReceived() {
        $sql = 'select count(*) as received, date_format(u.datetime,"%Y-%m-%d %H") as date, q.queue as queue '
                . 'FROM queue_stats as u '
                . 'LEFT JOIN qname as q on u.qname = q.queue_id '
                . 'where '
                . 'u.datetime > "' . $this->getStart() . '" and '
                . 'u.datetime < "' . $this->getEnd() . '" and '
                . 'qevent = 15 '
                . 'group by 2,3 ;';
        echo $sql;
        return $sql;
    }

    #ATTENDED

    public function getAttended($start = null, $end = null) {
        $this->setStart($start);
        $this->setEnd($end);
        $stmt = $this->getConnection()->prepare($this->SqlReceived());
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function SqlAttended() {
        $sql = 'select count(*) as received, date_format(u.datetime,"%Y-%m-%d %H") as date, q.queue as queue '
                . 'FROM queue_stats as u '
                . 'LEFT JOIN qname as q on u.qname = q.queue_id '
                . 'where '
                . 'u.datetime > "' . $this->getStart() . '" and '
                . 'u.datetime < "' . $this->getEnd() . '" and '
                . 'qevent = 12 '
                . 'group by 2,3 ;';
        echo $sql;
        return $sql;
    }

}
