<?php

namespace MetricaAsterisk\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * InternoRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class InternoRepository extends EntityRepository
{

    public function save(\MetricaAsterisk\Entity\Interno $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\MetricaAsterisk\Entity\Interno $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

