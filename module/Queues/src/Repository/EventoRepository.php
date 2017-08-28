<?php

namespace Queues\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EventoRepository
 *
 *
 *
 * @author
 * @license
 * @link
 */
class EventoRepository extends EntityRepository
{

    public function save(\Queues\Entity\Evento $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\Queues\Entity\Evento $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

