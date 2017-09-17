<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CvDesired
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_cv_desired")
 * @ORM\Entity(repositoryClass="PI\Repository\CvDesiredRepository")
 */
class CvDesired
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
     * @Annotation\Options({"label":"cv","empty_option": "",
     * "target_class":"\PI\Entity\Cv", "description":""})
     * @ORM\ManyToOne(targetEntity="\PI\Entity\Cv")
     * @ORM\JoinColumn(name="cv_id", referencedColumnName="id", nullable=true)
     */
    public $cv = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Salario Pretendido", "description":"",
     * "addon":""})
     * @ORM\Column(type="decimal", scale=2, precision=11, unique=false, nullable=true,
     * name="salary")
     */
    public $salary = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"Modalidad de Trabajo","empty_option": "",
     * "target_class":"\PI\Entity\WorkingMode", "description":""})
     * @ORM\ManyToOne(targetEntity="\PI\Entity\WorkingMode")
     * @ORM\JoinColumn(name="working_mode_id", referencedColumnName="id",
     * nullable=true)
     */
    public $workingMode = null;

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

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getWorkingMode()
    {
        return $this->workingMode;
    }

    public function setWorkingMode($workingMode)
    {
        $this->workingMode = $workingMode;
    }

    public function __toString()
    {
return;
    }


}

