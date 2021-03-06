<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CvPersonalInformation
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_cv_personal_information")
 * @ORM\Entity(repositoryClass="PI\Repository\CvPersonalInformationRepository")
 */
class CvPersonalInformation
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
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Nombre", "description":"", "addon":"fa
     * fa-id-card-o"})
     * @ORM\Column(type="string", length=50, unique=false, nullable=false, name="name")
     */
    public $name = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Apellido", "description":"", "addon":"fa
     * fa-id-card"})
     * @ORM\Column(type="string", length=50, unique=false, nullable=false,
     * name="lastname")
     */
    public $lastname = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Attributes({"type":"date"})
     * @Annotation\Options({"label":"Fecha de Nacimiento", "description":"",
     * "addon":"fa fa-birthday-cake"})
     * @ORM\Column(type="date", unique=false, nullable=true, name="birthdate")
     */
    public $birthdate = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"Nacionalidad","empty_option": "",
     * "target_class":"\PI\Entity\Country", "description":""})
     * @ORM\ManyToOne(targetEntity="\PI\Entity\Country")
     * @ORM\JoinColumn(name="nationality_id", referencedColumnName="id", nullable=true)
     */
    public $nationality = null;

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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function getFormatBirthdate()
    {
        if ($this->getBirthdate()) {
            return $this->getBirthdate()->format("Y-m-d");
        }
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    public function getYears()
    {
        if ($this->getBirthdate() and is_a($this->getBirthdate(), "DateTime")) {
            $now = new \DateTime();
            $diff = $this->getBirthdate()->diff($now);
            return $diff->y;
        }
        return null;
    }

    public function toArray()
    {

        $a = array();
        $a = [
            "name" => null,
            "lastname" => null,
            "birthdate" => null,
            "years" => null,
            "nationality" => ["id" => null, "name" => null, "icon" => null]
        ];


        if ($this->getName()) {
            $a["name"] = $this->name;
        }

        if ($this->getBirthdate()) {
            $a["lastname"] = $this->lastname;
        }

        if ($this->getBirthdate()) {
            $a["birthdate"] = $this->getFormatBirthdate();
        }

        if ($this->getYears()) {
            $a["years"] = $this->getYears();
        }

        if ($this->getNationality()) {
            $a["nationality"] = ["id" => $this->getNationality()->getId(), "name" => $this->getNationality()->getName(), "icon" => $this->getNationality()->getIcon()];
        }

        return $a;
    }

    public function getNationality()
    {
        return $this->nationality;
    }

    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    public function __toString()
    {
        return $this->name . " " . $this->lastname;
    }


}

