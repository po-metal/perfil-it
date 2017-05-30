<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SoftSkillRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class SoftSkillRepository extends EntityRepository
{

    public function save(\PI\Entity\SoftSkill $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\SoftSkill $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

