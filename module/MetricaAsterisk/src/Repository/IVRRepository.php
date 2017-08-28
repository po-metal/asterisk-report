<?php

namespace MetricaAsterisk\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * IVRRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class IVRRepository extends EntityRepository
{

    public function save(\MetricaAsterisk\Entity\IVR $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\MetricaAsterisk\Entity\IVR $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

