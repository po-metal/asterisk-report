<?php

namespace Queues\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * StatsRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class StatsRepository extends EntityRepository
{

    public function save(\Queues\Entity\Stats $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Queues\Entity\Stats $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

