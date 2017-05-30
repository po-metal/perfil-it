<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CvRoleRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvRoleRepository extends EntityRepository
{

    public function save(\PI\Entity\CvRole $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\CvRole $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

