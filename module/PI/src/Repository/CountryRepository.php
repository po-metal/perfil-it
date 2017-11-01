<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CountryRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CountryRepository extends EntityRepository
{

    public function save(\PI\Entity\Country $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\Country $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

