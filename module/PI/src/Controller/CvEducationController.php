<?php

namespace PI\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * CvEducationController
 * 
 * 
 * 
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvEducationController extends AbstractActionController
{

    const ENTITY = '\\PI\\Entity\\CvEducation';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    public $renderer = null;

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

    public function __construct(\Doctrine\ORM\EntityManager $em, $renderer)
    {
        $this->em = $em;
        $this->renderer = $renderer;
    }

    protected function getEducation()
    {
        //Get Object
        $CV = $this->pICv();
        $education = $CV->getEducation();
        if (!$education) {
            $education = new \PI\Entity\CvEducation();
            $education->setCv($CV);
            $CV->setEducation($education);
            $this->getEm()->persist($CV);
            $this->getEntityRepository()->save($education);
        }
        return $education;
    }

    public function mainAction()
    {
        $education = $this->getEducation();

        //Generate Form
        $form = $this->formBuilder($this->getEm(), 'PI\Entity\CvEducation');
        $form->setAttribute('action', $this->url()->fromRoute("PI/CvEducation/Main"));
        //BIND:
        $form->bind($education);

        //Custom Form
        $form->remove('cv');
        $hcv = new \Zend\Form\Element\Hidden("cv");
        $hcv->setValue($this->pICv()->getId());
        $form->add($hcv);



        //Process Form
        $service = $this->formProcess($this->getEm(), $form);
        $vcontact = null;
        if ($service->getStatus()) {
            $vcontact = $this->renderView($education);
        }

        $vform = $this->renderForm($form);
        $view = new \Zend\View\Model\JsonModel(array('status' => $service->getStatus(), 'form' => $vform, 'view' => $vcontact));
        // $view->setTerminal(true);
        return $view;
    }

    public function renderForm($form)
    {
        $htmlViewPart = new \Zend\View\Model\ViewModel();
        $htmlViewPart
                ->setTerminal(true)
                ->setTemplate('pi/cv-education/form')
                ->setVariables(array('form' => $form));

        return $this->renderer->render($htmlViewPart);
    }

    public function renderView($education)
    {
        $htmlViewPart = new \Zend\View\Model\ViewModel();
        $htmlViewPart
                ->setTerminal(true)
                ->setTemplate('pi/cv-education/view')
                ->setVariables(array('education' => $education));

        return $this->renderer->render($htmlViewPart);
    }

    public function getAction()
    {
        $a = $this->getEducation()->toArray();

        return new \Zend\View\Model\JsonModel( $a );
    }

    public function saveAction()
    {
        $education = $this->getEducation();

        //Generate Form
        $form = $this->formBuilder($this->getEm(), 'PI\Entity\CvEducation');
        //BIND:
        $form->bind($education);
        $form->getInputFilter()->remove('cv');

        //Process Form
        $service = $this->formProcess($this->getEm(), $form);
        if ($service->getStatus()) {
            $result = ["status" => $service->getStatus(),"data" => $education->toArray()];
        }else{
            $result = ["status" => $service->getStatus(),"errors" => $form->getMessages(),"data" => $education->toArray()];
            $this->getResponse()->setStatusCode(\Zend\Http\Response::STATUS_CODE_422);
        }
        return new \Zend\View\Model\JsonModel( $result );
    }


}

