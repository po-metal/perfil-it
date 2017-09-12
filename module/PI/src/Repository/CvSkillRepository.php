<?php

namespace PI\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CvSkillRepository
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvSkillRepository extends EntityRepository {

    public function save(\PI\Entity\CvSkill $entity) {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    public function remove(\PI\Entity\CvSkill $entity) {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    public function findBySkillAndCv(\PI\Entity\Cv $cv, \PI\Entity\Skill $skill) {
        $query = $this->getEntityManager()->createQueryBuilder()
                ->select('u')
                ->from('PI\Entity\CvSkill', 'u')
                ->where('u.cv = :cv')
                ->andWhere('u.skill = :skill')
                ->setParameter('cv', $cv)
                ->setParameter('skill', $skill);

        return $query->getQuery()->getOneOrNullResult();
    }

}
