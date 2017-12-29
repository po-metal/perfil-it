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
class CvExperience {

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
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"Cargo (Normalizado por Perfil IT)","empty_option": "",
     * "target_class":"\PI\Entity\Job", "description":""})
     * @ORM\ManyToOne(targetEntity="\PI\Entity\Job")
     * @ORM\JoinColumn(name="job_id", referencedColumnName="id", nullable=true)
     */
    public $job = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Attributes({"type":"date"})
     * @Annotation\Options({"label":"Desde", "description":"", "addon":""})
     * @ORM\Column(type="date", unique=false, nullable=true, name="date_from")
     */
    public $dateFrom = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Attributes({"type":"date"})
     * @Annotation\Options({"label":"Hasta", "description":"", "addon":""})
     * @ORM\Column(type="date", unique=false, nullable=true, name="date_to")
     */
    public $dateTo = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Resumen Breve (160 Caracteres)", "description":"",
     * "addon":""})
     * @ORM\Column(type="string", length=160, unique=false, nullable=true,
     * name="summary")
     */
    public $summary = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Attributes({"type":"checkbox", "autocomplete":"off"})
     * @Annotation\Options({"label":"Actualmente trabajo aquí", "description":""})
     * @Annotation\AllowEmpty({true})
     * @ORM\Column(type="boolean", nullable=true, name="currentjob")
     */
    public $currentJob = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Options({"label":"Cargo (Personalizado)","empty_option": "", "description":""})
     * @Annotation\Attributes({"type":"text"})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="custom_job")
     */
    public $customJob = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Textarea")
     * @Annotation\Attributes({"type":"textarea"})
     * @Annotation\Options({"label":"Descripción detallada (1000 Caraceteres)",
     * "description":""})
     * @ORM\Column(type="string", length=1000, unique=false, nullable=true,
     * name="description")
     */
    public $description = null;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCv() {
        return $this->cv;
    }

    public function setCv($cv) {
        $this->cv = $cv;
    }

    public function getCompany() {
        return $this->company;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function getJob() {
        return $this->job;
    }

    public function setJob($job) {
        $this->job = $job;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDateFrom() {
        return $this->dateFrom;
    }

    public function setDateFrom($dateFrom) {
        $this->dateFrom = $dateFrom;
    }

    public function getDateTo() {
        return $this->dateTo;
    }

    public function setDateTo($dateTo) {
        $this->dateTo = $dateTo;
    }

    public function getCurrentJob() {
        return $this->currentJob;
    }

    public function setCurrentJob($currentJob) {
        $this->currentJob = $currentJob;
    }

    public function getSummary() {
        return $this->summary;
    }

    public function setSummary($summary) {
        $this->summary = $summary;
    }

    public function getCustomJob() {
        return $this->customJob;
    }

    public function setCustomJob($customJob) {
        $this->customJob = $customJob;
    }

    public function __toString() {
        return $this->job;
    }

    public function toArray(){
        $a = array();
        $a["id"] = $this->getId();
        $a["company"] = $this->getCompany();
        if($this->getJob()) {
            $a["job"] = ["id" => $this->getJob()->getId(), "name" => $this->getJob()->getName()];
        }else{
            $a["job"] = ["id" => null, "name" => null];
        }
        $a["customJob"] = $this->getCustomJob();
        if($this->getDateFrom()) {
            $a["dateFrom"] = $this->getDateFrom()->format("Y-m-d");
        }
        if($this->getDateTo()) {
            $a["dateTo"] = $this->getDateTo()->format("Y-m-d");
        }

        $a["currentJob"] = $this->getCurrentJob();
        $a["summary"] = $this->getSummary();
        $a["description"] = $this->getDescription();
        $a["time"] = $this->getTime();
        return $a;

    }

    public function getTime() {

        if (is_a($this->getDateFrom(), "DateTime")) {

            if ($this->getCurrentJob()) {
                $dateTo = new \DateTime("now");
            } else if ($this->getDateTo()) {
                $dateTo = clone $this->getDateTo();
            }

            $diff = $dateTo->diff($this->getDateFrom());

            if ($diff->y >= 1) {
                return $diff->format('%yA %mM');
            } else {
                return $diff->format('%mM');
            }
        }

        return "-";
    }

}
