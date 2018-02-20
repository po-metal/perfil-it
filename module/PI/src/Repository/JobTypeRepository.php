<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * JobTypeRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class JobTypeRepository extends EntityRepository
{

    public function save(\PI\Entity\JobType $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\JobType $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

