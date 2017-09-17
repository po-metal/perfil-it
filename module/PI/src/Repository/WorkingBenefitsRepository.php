<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * WorkingBenefitsRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class WorkingBenefitsRepository extends EntityRepository
{

    public function save(\PI\Entity\WorkingBenefits $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\WorkingBenefits $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

