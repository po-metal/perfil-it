<?php

namespace PI\Controller\Plugin;

/**
 * Cv
 *
 * GET USER CV
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class Cv extends \Zend\Mvc\Controller\Plugin\AbstractPlugin {

    const ENTITY = '\\PI\\Entity\\Cv';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em = null;
    protected $user = null;

    function getEm(){
        return $this->em;
    }

    /**
     * 
     * @return \PI\Repository\CvRepository
     */
    public function getCvRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function __invoke() {
        return $this->getCv();
    }

    protected function getUser() {
        if (!$this->user) {
            $identity = $this->getController()->identity();
            if (!$identity) {
                throw new \Exception("Identidy not found");
            }
            $this->user = $this->getEm()->merge($identity);
        }
        return $this->user;
    }

    protected function getCv() {
        $cv = $this->getCvRepository()->getByUser($this->getUser());
        if (!$cv) {
            //CV
            $cv = new \PI\Entity\Cv();
            $cv->setUser($this->getUser());
            

            
            //SAVE
            $this->getCvRepository()->save($cv);
        }
        return $cv;
    }

}
