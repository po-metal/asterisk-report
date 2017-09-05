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
class QueueEventRepository extends EntityRepository
{

    protected $start = null;

    protected $end = null;

    public function save(\Queues\Entity\QueueEvent $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(\Queues\Entity\QueueEvent $entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }


}

