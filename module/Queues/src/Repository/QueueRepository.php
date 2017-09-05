<?php

namespace Queues\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * QueueRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class QueueRepository extends EntityRepository
{

    public function save(\Queues\Entity\Queue $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Queues\Entity\Queue $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

