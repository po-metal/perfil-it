<?php

namespace PI\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * CvExperienceController
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvExperienceController extends AbstractActionController
{

    const ENTITY = '\\PI\\Entity\\CvExperience';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    public function getEm()
    {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getEntityRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function mainAction()
    {
        return [];
    }

    public function viewAction()
    {
        return [];
    }

    public function saveAction()
    {
        return [];
    }

    public function loadAction()
    {
        return [];
    }


}

