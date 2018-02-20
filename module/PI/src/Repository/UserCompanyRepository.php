<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UserCompanyRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class UserCompanyRepository extends EntityRepository
{

    public function save(\PI\Entity\UserCompany $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\UserCompany $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

