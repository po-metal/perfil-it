<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CvEducationRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvEducationRepository extends EntityRepository
{

    public function save(\PI\Entity\CvEducation $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\CvEducation $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

