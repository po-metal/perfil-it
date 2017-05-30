<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CvPersonalInformationRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvPersonalInformationRepository extends EntityRepository
{

    public function save(\PI\Entity\CvPersonalInformation $entity)
    {
        $this->getEntityManager()->persist($entity); $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\CvPersonalInformation $entity)
    {
        $this->getEntityManager()->remove($entity); $this->getEntityManager()->flush();
    }


}

