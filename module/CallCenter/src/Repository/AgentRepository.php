<?php

namespace CallCenter\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AgentRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license BSD
 * @link -
 */
class AgentRepository extends EntityRepository
{

    public function save(\CallCenter\Entity\Agent $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\CallCenter\Entity\Agent $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

