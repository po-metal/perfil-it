<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CvDesiredRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvDesiredRepository extends EntityRepository
{

    public function save(\PI\Entity\CvDesired $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\CvDesired $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

