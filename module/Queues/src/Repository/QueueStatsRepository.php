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
class QueueStatsRepository extends EntityRepository
{

    public function save(\Queues\Entity\QueueStats $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Queues\Entity\QueueStats $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

