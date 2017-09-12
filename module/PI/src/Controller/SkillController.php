<?php

namespace PI\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * SkillController
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class SkillController extends AbstractActionController {

    const ENTITY = '\\PI\\Entity\\Skill';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $em = null;

    /**
     * @var \ZfMetal\Datagrid\Grid
     */
    public $grid = null;

    public function getEm() {
        return $this->em;
    }

    public function setEm(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function getEntityRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    public function __construct(\Doctrine\ORM\EntityManager $em, \ZfMetal\Datagrid\Grid $grid) {
        $this->em = $em;
        $this->grid = $grid;
    }

    public function getGrid() {
        return $this->grid;
    }

    public function setGrid(\ZfMetal\Datagrid\Grid $grid) {
        $this->grid = $grid;
    }

    public function gridAction() {
        $this->grid->prepare();
        return array("grid" => $this->grid);
    }

    public function searchAction() {
        $q = $this->getRequest()->getQuery("q");

        $query = $this->getEm()->createQueryBuilder()
                ->select('u')
                ->from('PI\Entity\Skill', 'u')
                ->where('u.name like :q ')
                ->setParameter('q', '%' . $q . '%');

        $skills = $query->getQuery()->getResult();
        $i = 0;
        foreach ($skills as $skill) {
            $a[$i]["id"] = $skill->getId();
            $a[$i]["name"] = $skill->getName();
            $a[$i]["category"] = $skill->getCategory()->getId();
            $a[$i]["categoryName"] = $skill->getCategory()->getName();
            $i++;
        }

        $result = new \Zend\View\Model\JsonModel($a);
        return $result;
    }

}
