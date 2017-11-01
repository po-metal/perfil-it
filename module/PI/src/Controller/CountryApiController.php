<?php

namespace PI\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * CountryApiController
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CountryApiController extends AbstractActionController
{

    const ENTITY = '\\PI\\Entity\\Country';

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

    public function listAction()
    {
        $countries = $this->getEntityRepository()->findAll();
        $a = array();
        foreach ($countries as $country ){
            $a[$country->getId()] = $country->getName();
        }
        return new \Zend\View\Model\JsonModel( $a );
    }


}

