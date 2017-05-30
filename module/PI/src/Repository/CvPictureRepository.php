<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CvPictureRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvPictureRepository extends EntityRepository
{

    public function save(\PI\Entity\CvPicture $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\CvPicture $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

