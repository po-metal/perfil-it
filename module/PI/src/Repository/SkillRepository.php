<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SkillRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class SkillRepository extends EntityRepository
{

    public function save(\PI\Entity\Skill $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\Skill $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

