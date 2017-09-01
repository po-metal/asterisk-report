<?php

namespace MetricaAsterisk\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CostoLlamadasRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class CostoLlamadasRepository extends EntityRepository
{

    public function save(\MetricaAsterisk\Entity\CostoLlamadas $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\MetricaAsterisk\Entity\CostoLlamadas $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

