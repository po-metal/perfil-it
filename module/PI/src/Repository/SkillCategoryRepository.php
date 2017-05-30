<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SkillCategoryRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class SkillCategoryRepository extends EntityRepository
{

    public function save(\PI\Entity\SkillCategory $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\SkillCategory $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

