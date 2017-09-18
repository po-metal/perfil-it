<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Cv
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_cv")
 * @ORM\Entity(repositoryClass="PI\Repository\CvRepository")
 */
class Cv
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
     * @Annotation\Options({"label":"User","empty_option": "",
     * "target_class":"\ZfMetal\Security\Entity\User", "description":""})
     * @ORM\ManyToOne(targetEntity="\ZfMetal\Security\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    public $user = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"Picture","empty_option": "",
     * "target_class":"\PI\Entity\CvPicture", "description":""})
     * @ORM\OneToOne(targetEntity="\PI\Entity\CvPicture", mappedBy="cv")
     */
    public $picture = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"personalInformation","empty_option": "",
     * "target_class":"\PI\Entity\CvPersonalInformation", "description":""})
     * @ORM\OneToOne(targetEntity="\PI\Entity\CvPersonalInformation", mappedBy="cv")
     */
    public $personalInformation = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"contact","empty_option": "",
     * "target_class":"\PI\Entity\CvContact", "description":""})
     * @ORM\OneToOne(targetEntity="\PI\Entity\CvContact", mappedBy="cv")
     */
    public $contact = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectMultiCheckbox")
     * @Annotation\Options({"label":"skills","target_class":"\PI\Entity\CvSkill",
     * "description":""})
     * @ORM\OneToMany(targetEntity="\PI\Entity\CvSkill", mappedBy="cv")
     */
    public $skills = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"education","empty_option": "",
     * "target_class":"\PI\Entity\CvEducation", "description":""})
     * @ORM\OneToOne(targetEntity="\PI\Entity\CvEducation")
     * @ORM\JoinColumn(name="education_id", referencedColumnName="id", nullable=true)
     */
    public $education = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectMultiCheckbox")
     * @Annotation\Options({"label":"Experiencia","target_class":"\PI\Entity\CvExperience",
     * "description":""})
     * @ORM\OneToMany(targetEntity="\PI\Entity\CvExperience", mappedBy="cv")
     */
    public $experiences = null;

    public function __construct()
    {
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getPersonalInformation()
    {
        return $this->personalInformation;
    }

    public function setPersonalInformation($personalInformation)
    {
        $this->personalInformation = $personalInformation;
    }

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    public function getSkills()
    {
        return $this->skills;
    }

    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    public function getEducation()
    {
        return $this->education;
    }

    public function setEducation($education)
    {
        $this->education = $education;
    }


    public function getExperiences()
    {
        return $this->experiences;
    }

    public function setExperiences($experiences)
    {
        $this->experiences = $experiences;
    }

    public function __toString()
    {
return;
    }


}

