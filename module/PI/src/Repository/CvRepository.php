<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CvRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvRepository extends EntityRepository
{

    public function save(\PI\Entity\Cv $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\Cv $entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    public function getByUser(\ZfMetal\Security\Entity\User $user)
    {
        $query = $this->getEntityManager()->createQueryBuilder()
                ->select('u')
                ->from('PI\Entity\CV', 'u')
                ->where('u.user = :user')
                ->setParameter('user', $user);

        return  $query->getQuery()->getOneOrNullResult();
    }


}

