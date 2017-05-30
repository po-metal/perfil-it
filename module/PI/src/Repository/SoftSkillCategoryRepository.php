<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SoftSkillCategoryRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class SoftSkillCategoryRepository extends EntityRepository
{

    public function save(\PI\Entity\SoftSkillCategory $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\SoftSkillCategory $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

