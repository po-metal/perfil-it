<?php

namespace PI\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * CvPictureController
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvPictureController extends AbstractActionController {

    const ENTITY = '\\PI\\Entity\\CvPicture';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    public function getEm() {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function getCvPictureRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function formAction() {
        $form = new \PI\Form\CvPicture();
        $view = new \Zend\View\Model\ViewModel(array("form" => $form));
        $view->setTerminal(true);
        return $view;
    }

    protected function getPicture() {
        //Get Object
        $CV = $this->pICv();
        $picture = $CV->getPicture();
        if (!$picture) {
            $picture = new \PI\Entity\CvPicture();
            $picture->setCv($CV);
            $CV->setPicture($picture);
            $this->getEm()->persist($CV);
            $this->getCvPictureRepository()->save($picture);
        }
        return $picture;
    }

    public function mainAction() {

        $picture = $this->getPicture();

        $form = new \PI\Form\CvPicture();
        $form->setHydrator(new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($this->getEm()));
        $form->bind($picture);

        $form->setAttribute('action', $this->url()->fromRoute("PI/CvPicture/Main"));

        //ImgPath
        $path = __dir__ . "/../../../../public/cv/img/";
        $form->setInputFilter(new \PI\Form\InputFilter\CvPicture($path));


        if ($this->getRequest()->isPost()) {

            $data = array_merge_recursive(
                    $this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray()
            );

            $form->setData($data);

            if ($form->isValid()) {
                $this->getCvPictureRepository()->save($picture);

                return $this->forward()->dispatch(\PI\Controller\CvPictureController::class, ["action" => "picture", "picture" => $picture]);
            } else {

                $dataError = $form->getMessages();
                $error = array();
                foreach ($dataError as $key => $row) {
                    $error[] = $row;
                }
            }
        }
        $view = new \Zend\View\Model\ViewModel(array("form" => $form));
        $view->setTerminal(true);
        return $view;
    }

    public function pictureAction() {
        $picture = $this->params("picture");
        $view = new \Zend\View\Model\ViewModel(array("picture" => $picture));
        $view->setTerminal(true);
        return $view;
    }

    public function getEntityRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

}
