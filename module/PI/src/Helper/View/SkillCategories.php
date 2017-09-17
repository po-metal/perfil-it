<?php

namespace PI\Helper\View;

/**
 * SkillCategories
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class SkillCategories extends \Zend\View\Helper\AbstractHelper {

    const ENTITY = '\\PI\\Entity\\SkillCategory';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em = null;
    protected $categories = null;

    function getEm() {
        return $this->em;
    }

    function getCategories() {
        return $this->categories;
    }

    function setCategories($categories) {
        $this->categories = $categories;
    }

    /**
     * 
     * @return \PI\Repository\SkillCategoryRepository
     */
    public function getSkillCategoryRepository() {
        return $this->getEm()->getRepository(self::ENTITY);
    }

    function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function __invoke() {
        if (!$this->categories) {
            $this->categories = $this->getSkillCategoryRepository()->findAll();
        } 
        return $this->categories;
    }

}
