<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CvExperience
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_cv_experience")
 * @ORM\Entity(repositoryClass="PI\Repository\CvExperienceRepository")
 */
class CvExperience
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
     * @ORM\JoinColumn(name="cv_id", referencedColumnName="id", nullable=true)
     */
    public $cv = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Compañia", "description":"", "addon":""})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="company")
     */
    public $company = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Puesto", "description":"", "addon":""})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true, name="job")
     */
    public $job = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Attributes({"type":"date"})
     * @Annotation\Options({"label":"Desde", "description":"", "addon":""})
     * @ORM\Column(type="date", unique=false, nullable=true, name="from")
     */
    public $from = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Attributes({"type":"date"})
     * @Annotation\Options({"label":"Hasta", "description":"", "addon":""})
     * @ORM\Column(type="date", unique=false, nullable=true, name="to")
     */
    public $to = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Textarea")
     * @Annotation\Attributes({"type":"textarea"})
     * @Annotation\Options({"label":"Descripción", "description":""})
     * @ORM\Column(type="string", length=300, unique=false, nullable=true,
     * name="description")
     */
    public $description = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Attributes({"type":"checkbox"})
     * @Annotation\Options({"label":"Actual", "description":""})
     * @ORM\Column(type="boolean", nullable=true, name="current")
     */
    public $current = null;

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

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function getJob()
    {
        return $this->job;
    }

    public function setJob($job)
    {
        $this->job = $job;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCurrent()
    {
        return $this->current;
    }

    public function setCurrent($current)
    {
        $this->current = $current;
    }

    public function __toString()
    {
        return  $this->job;
    }


}

