<?php

namespace MetricaAsterisk\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MetricsQueueRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class MetricsQueueRepository extends EntityRepository
{

    public function save(\MetricaAsterisk\Entity\MetricsQueue $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\MetricaAsterisk\Entity\MetricsQueue $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

