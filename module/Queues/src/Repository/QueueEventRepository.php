<?php

namespace Queues\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * QueueEventRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class QueueEventRepository extends EntityRepository {

    protected $start;
    protected $end;

    public function save(\Queues\Entity\QueueEvent $entity) {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(\Queues\Entity\QueueEvent $entity) {
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

    public function getReceived($start = null, $end = null) {
        $this->setStart($start);
        $this->setEnd($end);
        $stmt = $this->getConnection()->prepare($this->SqlReceived());
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function SqlReceived() {
        $sql = 'select count(u.*) as received, date_format(datetime,"%Y-%m-%d %H"), u.qname '
                . 'FROM queue_stats as u '
                . 'where '
                . 'u.datetime > "' . $this->getStart() . '" and '
                . 'u.datetime < "' . $this->getEnd() . '" and '
                . 'qevent = 15 '
                . 'group by 2,3 ;';

        return $sql;
    }

}
