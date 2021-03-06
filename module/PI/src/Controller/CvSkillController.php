<?php

namespace PI\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * CvSkillController
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvSkillController extends AbstractActionController
{

    const ENTITY = '\\PI\\Entity\\CvSkill';

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

    public function mainAction()
    {
        $cv = $this->pICv();

        foreach ($cv->getSkills() as $cvSkill) {
            $cvSkills[$cvSkill->getSkill()->getId()] = $cvSkill;
        }

        //Debo remplazar por join completo
        $skillCategories = $this->getEm()->getRepository('PI\Entity\SkillCategory')->findAll();

        $view = new \Zend\View\Model\ViewModel(array('skillCategories' => $skillCategories, 'cvSkills' => $cvSkills));
        $view->setTerminal(true);
        return $view;
    }

    public function viewAction()
    {
        return [];
    }

    public function loadAction()
    {
        $skills = $this->getEm()->getRepository('PI\Entity\CvSkill')->findByCv($this->pICv());
        $r = array();
        foreach ($skills as $s) {
            $r[] = ['id' => $s->getSkill()->getId(), 'name' => $s->getSkill()->getName(), 'lvl' => $s->getLvl()];
        }
        $response = $this->getResponse();
        $view = new \Zend\View\Model\JsonModel($r);
        $response->getHeaders()->addHeaderLine('Content-Type', 'application/json');
        $response->setContent($view->serialize());
        return $response;
    }

    public function saveAction()
    {
        $id = $this->getRequest()->getPost("id");
        $skill = $this->getEm()->getRepository("\PI\Entity\Skill")->find($id);

        $lvl = $this->getRequest()->getPost("lvl");

        $cv = $this->pICv();
        $cvSkill = $this->getEm()->getRepository('PI\Entity\CvSkill')->findBySkillAndCv($cv, $skill);
        if ($cvSkill) {

            if ($lvl == 0) {
                $r["status"] = "delete";
                $this->getEm()->remove($cvSkill);
            } else {
                $r["status"] = "change";
                $cvSkill->setLvl($lvl);
                $this->getEm()->persist($cvSkill);
            }
        } else {
            $cvSkill = new \PI\Entity\CvSkill();
            $cvSkill->setCv($cv);
            $cvSkill->setSkill($skill);
            $cvSkill->setLvl($lvl);
            $r["status"] = "new";
            $this->getEm()->persist($cvSkill);
        }

        try {

            $this->getEm()->flush();
            $r["success"] = true;
        } catch (Exception $ex) {
            $r["success"] = false;
        }


        return new \Zend\View\Model\JsonModel($r);
    }

    public function listAction()
    {
        $skills = $this->getEm()->getRepository('PI\Entity\CvSkill')->findByCv($this->pICv());
        $r = array();
        foreach ($skills as $s) {
            $r[$s->getSkill()->getId()] = $s->getLvl();
        }

        $skillCategories = $this->getEm()->getRepository('PI\Entity\SkillCategory')->skillList();

        $a = array();

        foreach ($skillCategories as $category) {

            foreach ($category->getSkills() as $skill) {

                if ($r[$skill->getId()]) {
                    $lvl = $r[$skill->getId()];
                } else {
                    $lvl = 0;
                }


                $a[] = [
                    "id" => $skill->getId(),
                    "name" => $skill->getName(),
                    "category" => $category->getName(),
                    "lvl" => $lvl
                ];
            }
        }

        return new \Zend\View\Model\JsonModel($a);
    }

    public function saveSkillAction()
    {
        $r = array();
        $r["status"] = false;

        try {

            $id = $this->getRequest()->getPost("id");
            $lvl = $this->getRequest()->getPost("lvl");

            $skill = $this->getEm()->getRepository("\PI\Entity\Skill")->find($id);

            $cv = $this->pICv();
            $cvSkill = $this->getEm()->getRepository('PI\Entity\CvSkill')->findBySkillAndCv($cv, $skill);

            //REMOVE
            if ($lvl == 0 && $cvSkill) {
                $r["cvSkillId"] = $cvSkill->getId();
                $this->getEm()->remove($cvSkill);
                $this->getEm()->flush();
                $r["status"] = true;
                $r["lvl"] = 0;
            }

            //EDIT
            if ($cvSkill && $lvl > 0) {
                $cvSkill->setLvl($lvl);
                $this->getEm()->persist($cvSkill);
                $this->getEm()->flush();
                $r["status"] = true;
                $r["cvSkillId"] = $cvSkill->getId();
                $r["lvl"] = $cvSkill->getLvl();
            }

            //ADD
            if (!$cvSkill && $lvl > 0) {
                $cvSkill = new \PI\Entity\CvSkill();
                $cvSkill->setCv($cv);
                $cvSkill->setSkill($skill);
                $cvSkill->setLvl($lvl);
                $this->getEm()->persist($cvSkill);
                $this->getEm()->flush();
                $r["status"] = true;
                $r["cvSkillId"] = $cvSkill->getId();
                $r["lvl"] = $cvSkill->getLvl();
            }

        } catch (Exception $ex) {
            $r["error"] = $ex->getMessage();
        }


        return new \Zend\View\Model\JsonModel($r);
    }


}

