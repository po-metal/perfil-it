<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * JobSearchRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class JobSearchRepository extends EntityRepository
{

    public function save(\PI\Entity\JobSearch $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\JobSearch $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

