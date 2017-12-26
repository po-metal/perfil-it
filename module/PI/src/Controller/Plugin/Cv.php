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


            $personalInformation = new \PI\Entity\CvPersonalInformation();
            $personalInformation->setCv($cv);
            $personalInformation->setName($this->getUser()->getName());
            $personalInformation->setLastname("");
            $cv->setPersonalInformation($personalInformation);
            $this->getEm()->persist($personalInformation);

            $picture = new \PI\Entity\CvPicture();
            $picture->setCv($cv);
            $cv->setPicture($picture);
            $this->getEm()->persist($picture);

            $education = new \PI\Entity\CvEducation();
            $education->setCv($cv);
            $cv->setEducation($education);
            $this->getEm()->persist($education);


            $contact = new \PI\Entity\CvContact();
            $contact->setCv($cv);
            $cv->setContact($contact);
            $this->getEm()->persist($contact);

            //SAVE
            $this->getCvRepository()->save($cv);
        }
        return $cv;
    }

}
