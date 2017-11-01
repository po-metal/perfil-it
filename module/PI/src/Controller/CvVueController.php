<?php

namespace PI\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * CvVueController
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvVueController extends AbstractActionController
{

    const ENTITY = '\\PI\\Entity\\Cv';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    public function indexAction()
    {
        return [];
    }

    public function mainAction()
    {
        return new \Zend\View\Model\ViewModel(
            ["cv" => $this->pICv(), "cvLoad" => \Zend\Json\Encoder::encode($this->pICv()->toArray())
            ]
        );
    }

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

    /**
     *
     * @return \PI\Repository\CvRepository
     */
    public function getCvRepository()
    {
        return $this->getEm()->getRepository(self::ENTITY);
    }


    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }


}

