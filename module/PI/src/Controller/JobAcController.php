<?php

namespace PI\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * JobAcController
 *
 * Job AutoComplete
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class JobAcController extends AbstractActionController
{

    const ENTITY = '\\PI\\Entity\\Job';

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

    public function getJobRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function searchAction()
    {
        $q = $this->getRequest()->getQuery("q");
        $r = $this->getJobRepository()->search($q);
        if(!$r){
            $r = array();
        }
        return new \Zend\View\Model\JsonModel($r);
    }


}

