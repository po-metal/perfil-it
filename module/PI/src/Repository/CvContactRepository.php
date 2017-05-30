<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CvContactRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvContactRepository extends EntityRepository
{

    public function save(\PI\Entity\CvContact $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\CvContact $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

