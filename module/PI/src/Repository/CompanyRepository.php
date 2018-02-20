<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CompanyRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CompanyRepository extends EntityRepository
{

    public function save(\PI\Entity\Company $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\Company $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

