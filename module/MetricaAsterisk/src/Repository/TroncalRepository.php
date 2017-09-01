<?php

namespace MetricaAsterisk\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TroncalRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class TroncalRepository extends EntityRepository
{

    public function save(\MetricaAsterisk\Entity\Troncal $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\MetricaAsterisk\Entity\Troncal $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

