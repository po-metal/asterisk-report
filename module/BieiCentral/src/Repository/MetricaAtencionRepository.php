<?php

namespace BieiCentral\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MetricaAtencionRepository
 *
 *
 *
 * @author Cristian Icnarnato
 * @license BSD
 * @link -
 */
class MetricaAtencionRepository extends EntityRepository
{

    public function save(\BieiCentral\Entity\MetricaAtencion $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\BieiCentral\Entity\MetricaAtencion $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

