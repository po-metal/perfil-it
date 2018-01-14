<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * JobRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class JobRepository extends EntityRepository
{

    public function save(\PI\Entity\Job $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\Job $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


    public function search($search){
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('u')
            ->from('PI\Entity\Job', 'u')
            ->where('u.name LIKE :search')
            ->setParameter('search', '%'.$search.'%');

        return $query->getQuery()->getArrayResult();
    }



}

