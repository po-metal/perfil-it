<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EducationStateRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class EducationStateRepository extends EntityRepository
{

    public function save(\PI\Entity\EducationState $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\EducationState $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

