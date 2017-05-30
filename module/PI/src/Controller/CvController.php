<?php

namespace PI\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * CvController
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvController extends AbstractActionController {

    const ENTITY = '\\PI\\Entity\\Cv';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em = null;

    /**
     * @var \ZfMetal\Security\Entity\User
     */
    protected $user = null;

    public function getEm() {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function getEntityRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    /**
     * 
     * @return \PI\Repository\CvRepository
     */
    public function getCvRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }


    public function indexAction() {


        return new \Zend\View\Model\ViewModel(
                ["cv" => $this->pICv()
                ]
        );
    }

}
