<?php

namespace MetricaAsterisk\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TipoDestinoRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link
 */
class TipoDestinoRepository extends EntityRepository
{

    public function save(\MetricaAsterisk\Entity\TipoDestino $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(\MetricaAsterisk\Entity\TipoDestino $entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    public function obtenerPorPrioridad()
    {
        return $this->getEntityManager()
                        ->createQueryBuilder()->select('u')->from('MetricaAsterisk\Entity\TipoDestino', 'u')
                        ->orderBy("u.prioridad", "ASC")
                        ->getQuery()
                        ->getResult();
    }


}

