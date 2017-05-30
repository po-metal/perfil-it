<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CvExperienceRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvExperienceRepository extends EntityRepository
{

    public function save(\PI\Entity\CvExperience $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\CvExperience $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

