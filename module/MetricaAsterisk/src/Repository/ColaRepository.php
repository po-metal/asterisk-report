<?php

namespace MetricaAsterisk\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ColaRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class ColaRepository extends EntityRepository
{

    public function save(\MetricaAsterisk\Entity\Cola $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\MetricaAsterisk\Entity\Cola $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

