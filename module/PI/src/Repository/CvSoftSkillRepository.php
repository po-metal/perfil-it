<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CvSoftSkillRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvSoftSkillRepository extends EntityRepository
{

    public function save(\PI\Entity\CvSoftSkill $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\CvSoftSkill $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

