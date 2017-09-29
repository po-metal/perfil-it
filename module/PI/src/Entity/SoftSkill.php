<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * SoftSkill
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_soft_skill")
 * @ORM\Entity(repositoryClass="PI\Repository\SoftSkillRepository")
 */
class SoftSkill
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
     * @Annotation\Options({"label":"Habilidades Blandas", "description":"",
     * "addon":""})
     * @ORM\Column(type="string", length=50, unique=false, nullable=true, name="name")
     */
    public $name = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"Categoria","empty_option": "",
     * "target_class":"\PI\Entity\SoftSkillCategory", "description":""})
     * @ORM\ManyToOne(targetEntity="\PI\Entity\SoftSkillCategory")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=true)
     */
    public $category = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Textarea")
     * @Annotation\Attributes({"type":"textarea"})
     * @Annotation\Options({"label":"Descripción", "description":""})
     * @ORM\Column(type="string", length=300, unique=false, nullable=true,
     * name="description")
     */
    public $description = null;

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

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function __toString()
    {
        return  $this->name;
    }


}

