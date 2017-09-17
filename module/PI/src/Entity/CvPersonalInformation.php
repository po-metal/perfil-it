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
     * @ORM\Column(type="string", length=50, unique=false, nullable=true, name="name")
     */
    public $name = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Apellido", "description":"", "addon":"fa
     * fa-id-card"})
     * @ORM\Column(type="string", length=50, unique=false, nullable=true,
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

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    public function getYears()
    {
        if($this->getBirthdate() and is_a($this->getBirthdate(), "DateTime")){
        $now = new \DateTime();
        $diff = $this->getBirthdate()->diff($now);
        return $diff->y;    
        }
        return null;
    }

    public function __toString()
    {
return;
    }


}

