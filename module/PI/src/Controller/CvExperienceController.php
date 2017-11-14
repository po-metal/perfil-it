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

    protected function getExperience($id = null)
    {
        if ($id) {
            $experience = $this->getEm()->getRepository(self::ENTITY)->find($id);
        } else {
            //Get Object
            $CV = $this->pICv();
            $experience = new \PI\Entity\CvExperience();
            $experience->setCv($CV);
        }
        return $experience;
    }

    public function mainAction()
    {
        $id = $this->params("id");

        if ($this->getRequest()->isPost()) {
            $id = $this->getRequest()->getPost("id");
        }

        $new = false;

        $experience = $this->getExperience($id);

        if (!$experience->getId()) {
            $new = true;
        }


        //Generate Form
        $form = $this->formBuilder($this->getEm(), 'PI\Entity\CvExperience');
        $form->setAttribute('action', $this->url()->fromRoute("PI/CvExperience/Main"));
        //BIND:
        $form->bind($experience);

        //Custom Form
        $form->remove('cv');
        $hcv = new \Zend\Form\Element\Hidden("cv");
        $hcv->setValue($this->pICv()->getId());
        $form->add($hcv);

        //ID
        $hid = new \Zend\Form\Element\Hidden("id");
        $hid->setValue($id);
        $form->add($hid);


        //Process Form
        $service = $this->formProcess($this->getEm(), $form);
        $rview = null;
        if ($service->getStatus()) {
            $rview = $this->renderView($experience);
        }

        $vform = $this->renderForm($form);
        $view = new \Zend\View\Model\JsonModel(array('status' => $service->getStatus(), 'id' => $id, 'new' => $new, 'form' => $vform, 'view' => $rview));
        // $view->setTerminal(true);
        return $view;
    }

    public function renderForm($form)
    {
        $htmlViewPart = new \Zend\View\Model\ViewModel();
        $htmlViewPart
            ->setTerminal(true)
            ->setTemplate('pi/cv-experience/form')
            ->setVariables(array('form' => $form));

        return $this->renderer->render($htmlViewPart);
    }

    public function renderView($experience)
    {
        $htmlViewPart = new \Zend\View\Model\ViewModel();
        $htmlViewPart
            ->setTerminal(true)
            ->setTemplate('pi/cv-experience/view')
            ->setVariables(array('experience' => $experience));

        return $this->renderer->render($htmlViewPart);
    }

    public function viewAction()
    {
        $experience = $this->params("experience");
        $view = new \Zend\View\Model\ViewModel(array("experience" => $experience));
        $view->setTerminal(true);
        return $view;
    }

    public function saveAction()
    {
        if ($this->getRequest()->isPost()) {
            $id = $this->getRequest()->getPost("id");
        }

        $experience = $this->getExperience($id);

        //Generate Form
        $form = $this->formBuilder($this->getEm(), 'PI\Entity\CvExperience');
        $form->bind($experience);


        //Remove CV
        $form->getInputFilter()->remove('cv');
        $form->remove('cv');

        //ID
        $hid = new \Zend\Form\Element\Hidden("id");
        $hid->setValue($id);
        $form->add($hid);


        //Process Form
        $service = $this->formProcess($this->getEm(), $form);
        $rview = null;
        if ($service->getStatus()) {
            $result = ["status" => $service->getStatus(), "data" => $experience->toArray()];
        } else {
            $result = ["status" => $service->getStatus(), "errors" => $form->getMessages(), "data" => $experience->toArray()];
            $this->getResponse()->setStatusCode(\Zend\Http\Response::STATUS_CODE_422);
        }
        return new \Zend\View\Model\JsonModel($result);
    }

    public function loadAction()
    {
        $a = $this->pICv()->toArray();

        return new \Zend\View\Model\JsonModel($a["CvExperiences"]);
    }

    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getPost("id");
            $exp = $this->getEntityRepository()->find($id);
            $this->getEm()->remove($exp);
            $this->getEm()->flush();
            $result = ["status" => true];
        } catch (\Exception $e) {
            $result = ["status" => true, "errors" => $e->getMessage()];
        }

        return new \Zend\View\Model\JsonModel($result);
    }


}

