<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CvEducation
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_cv_education")
 * @ORM\Entity(repositoryClass="PI\Repository\CvEducationRepository")
 */
class CvEducation
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
     * @ORM\OneToOne(targetEntity="\PI\Entity\Cv")
     * @ORM\JoinColumn(name="cv_id", referencedColumnName="id", nullable=false)
     */
    public $cv = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"Educación","empty_option": "",
     * "target_class":"\PI\Entity\Education", "description":""})
     * @ORM\ManyToOne(targetEntity="\PI\Entity\Education")
     * @ORM\JoinColumn(name="education_id", referencedColumnName="id", nullable=true)
     */
    public $education = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"Estado","empty_option": "",
     * "target_class":"\PI\Entity\EducationState", "description":""})
     * @ORM\ManyToOne(targetEntity="\PI\Entity\EducationState")
     * @ORM\JoinColumn(name="education_state_id", referencedColumnName="id",
     * nullable=true)
     */
    public $educationState = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Título (Opcional)", "description":"Ej: Ingeniero,
     * Licenciado, DBA, Programador, Consultor, Especialista IT, Etc", "addon":""})
     * @ORM\Column(type="string", length=50, unique=false, nullable=true, name="title")
     */
    public $title = null;

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

    public function getEducation()
    {
        return $this->education;
    }

    public function setEducation($education)
    {
        $this->education = $education;
    }

    public function getEducationState()
    {
        return $this->educationState;
    }

    public function setEducationState($educationState)
    {
        $this->educationState = $educationState;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function __toString()
    {
        return (String)$this->title;
    }

    public function toArray()
    {

        $a = array();

        $a = [
            "education" => [
                "id" => "",
                "name" => ""
            ],
            "state" => [
                "id" => "",
                "name" => ""
            ]
        ];

        if ($this->getEducation()) {
            $a["education"] = [
                "id" => $this->getEducation()->getId(),
                "name" => $this->getEducation()->getName()
            ];
        }

        if ($this->getEducation()) {
            $a["state"] = [
                "id" => $this->getEducationState()->getId(),
                "name" => $this->getEducationState()->getName()
            ];

        }
        $a["title"] = $this->getTitle();

        return $a;
    }

}

