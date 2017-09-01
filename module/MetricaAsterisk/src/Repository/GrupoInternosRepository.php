<?php

namespace MetricaAsterisk\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * GrupoInternosRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class GrupoInternosRepository extends EntityRepository
{

    public function save(\MetricaAsterisk\Entity\GrupoInternos $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\MetricaAsterisk\Entity\GrupoInternos $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

