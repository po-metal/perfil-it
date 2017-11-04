<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CvSkill
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_cv_skills")
 * @ORM\Entity(repositoryClass="PI\Repository\CvSkillRepository")
 */
class CvSkill
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
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"CV","empty_option": "",
     * "target_class":"\PI\Entity\Cv", "description":""})
     * @ORM\ManyToOne(targetEntity="\PI\Entity\Cv")
     * @ORM\JoinColumn(name="cv_id", referencedColumnName="id", nullable=false)
     */
    public $cv = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"skill","empty_option": "",
     * "target_class":"\PI\Entity\Skill", "description":""})
     * @ORM\ManyToOne(targetEntity="\PI\Entity\Skill")
     * @ORM\JoinColumn(name="skill_id", referencedColumnName="id", nullable=false)
     */
    public $skill = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"lvl", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=1, unique=false, nullable=true, name="lvl")
     */
    public $lvl = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"priority", "description":"", "addon":""})
     * @ORM\Column(type="integer", length=4, unique=false, nullable=true,
     * name="priority")
     */
    public $priority = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCv()
    {
        return $this->cv;
    }

    public function setCv($cv)
    {
        $this->cv = $cv;
    }

    public function getSkill()
    {
        return $this->skill;
    }

    public function setSkill($skill)
    {
        $this->skill = $skill;
    }

    public function getLvl()
    {
        return $this->lvl;
    }

    public function setLvl($lvl)
    {
        $this->lvl = $lvl;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    public function __toString()
    {
        return $this->getSkill()->getName();
    }

    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'lvl' => $this->getLvl(),
            'priority' => $this->getPriority(),
            'skill' => ['id' => $this->getSkill()->getId(), 'name' => $this->getSkill()->getName()]
        ];
    }


}

