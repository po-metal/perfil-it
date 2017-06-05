<?php

namespace PI\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * CvContactController
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvContactController extends AbstractActionController
{

    const ENTITY = '\\PI\\Entity\\CvContact';

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

    protected function getContact()
    {
        //Get Object
        $CV = $this->pICv();
        $contact = $CV->getContact();
        if (!$contact) {

            $contact = new \PI\Entity\CvContact();
            $contact->setCv($CV);
            $CV->setContact($contact);
            $this->getEm()->persist($CV);
            $this->getEntityRepository()->save($contact);
        }
        return $contact;
    }

    public function mainAction()
    {
        $contact = $this->getContact();

        //Generate Form
        $form = $this->formBuilder($this->getEm(), 'PI\Entity\CvContact');
        $form->setAttribute('action', $this->url()->fromRoute("PI/CvContact/Main"));
        //BIND:
        $form->bind($contact);

        //Custom Form
        $form->remove('cv');
        $hcv = new \Zend\Form\Element\Hidden("cv");
        $hcv->setValue($this->pICv()->getId());
        $form->add($hcv);



        //Process Form
        $service = $this->formProcess($this->getEm(), $form);
        if ($service->getStatus()) {
            return $this->forward()->dispatch(\PI\Controller\CvContactController::class, ["action" => "view", "contact" => $contact]);
        }

        $view = new \Zend\View\Model\ViewModel(array('form' => $form));
        $view->setTerminal(true);
        return $view;
    }

    public function viewAction()
    {
         $contact = $this->params("contact");
        $view = new \Zend\View\Model\ViewModel(array("contact" => $contact));
        $view->setTerminal(true);
        return $view;
    }


}

