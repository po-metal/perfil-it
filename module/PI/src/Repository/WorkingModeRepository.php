<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * WorkingModeRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class WorkingModeRepository extends EntityRepository
{

    public function save(\PI\Entity\WorkingMode $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\WorkingMode $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

