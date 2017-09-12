<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * SkillCategory
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_skill_category")
 * @ORM\Entity(repositoryClass="PI\Repository\SkillCategoryRepository")
 */
class SkillCategory
{

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"ID", "description":"", "addon":""})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", length=11, unique=false, nullable=false, name="id")
     */
    public $id = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Categoria", "description":"", "addon":""})
     * @ORM\Column(type="string", length=30, unique=false, nullable=true, name="name")
     */
    public $name = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectMultiCheckbox")
     * @Annotation\Options({"label":"skills","target_class":"\PI\Entity\Skill",
     * "description":""})
     * @ORM\OneToMany(targetEntity="\PI\Entity\Skill", mappedBy="category")
     */
    public $skills = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSkills()
    {
        return $this->skills;
    }

    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    public function __toString()
    {
        return  $this->name;
    }


}

