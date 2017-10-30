<?php

namespace PI\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * CvPersonalInformationController
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvPersonalInformationController extends AbstractActionController
{

    const ENTITY = '\\PI\\Entity\\CvPersonalInformation';

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

    protected function getPersonalInformation() : \PI\Entity\CvPersonalInformation
    {
        //Get Object
        $CV = $this->pICv();
        $personalInformation = $CV->getPersonalInformation();
        if (!$personalInformation) {

            $personalInformation = new \PI\Entity\CvPersonalInformation();
            $personalInformation->setCv($CV);
            $CV->setPersonalInformation($personalInformation);
            $this->getEm()->persist($CV);
            $this->getEntityRepository()->save($personalInformation);
        }
        return $personalInformation;
    }

    public function mainAction()
    {
        $personalInformation = $this->getPersonalInformation();

        //Generate Form
        $form = $this->formBuilder($this->getEm(), 'PI\Entity\CvPersonalInformation');
        $form->setAttribute('action', $this->url()->fromRoute("PI/CvPersonalInformation/Main"));
        //BIND:
        $form->bind($personalInformation);

        //Custom Form
        $form->remove('cv');
        $hcv = new \Zend\Form\Element\Hidden("cv");
        $hcv->setValue($this->pICv()->getId());
        $form->add($hcv);

        //Process Form
        $service = $this->formProcess($this->getEm(), $form);
        if ($service->getStatus()) {
            return $this->forward()->dispatch(\PI\Controller\CvPersonalInformationController::class, ["action" => "view", "personalInformation" => $personalInformation]);
        }

        $view = new \Zend\View\Model\ViewModel(array('form' => $form));
        $view->setTerminal(true);
        return $view;
    }

    public function viewAction()
    {
        $personalInformation = $this->params("personalInformation");
        $view = new \Zend\View\Model\ViewModel(array("personalInformation" => $personalInformation));
        $view->setTerminal(true);
        return $view;
    }

    public function getAction()
    {
        $a = $this->getPersonalInformation()->toArray();

        return new \Zend\View\Model\JsonModel( $a );
    }

    public function saveAction()
    {
        $personalInformation = $this->getPersonalInformation();

        //Generate Form
        $form = $this->formBuilder($this->getEm(), 'PI\Entity\CvPersonalInformation');
        $form->bind($personalInformation);
        $form->getInputFilter()->remove('cv');

        //Process Form
        $service = $this->formProcess($this->getEm(), $form);
        if ($service->getStatus()) {
        $result = ["status" => $service->getStatus(),"data" => $this->getPersonalInformation()->toArray()];
        }else{
            $result = ["status" => $service->getStatus(),"errors" => $form->getMessages(),"data" => $this->getPersonalInformation()->toArray()];
            $this->getResponse()->setStatusCode(\Zend\Http\Response::STATUS_CODE_422);
        }
        return new \Zend\View\Model\JsonModel( $result );
    }


}

