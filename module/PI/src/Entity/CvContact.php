<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CvContact
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_cv_contact")
 * @ORM\Entity(repositoryClass="PI\Repository\CvContactRepository")
 */
class CvContact
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
     * @ORM\OneToOne(targetEntity="\PI\Entity\Cv")
     * @ORM\JoinColumn(name="cv_id", referencedColumnName="id", nullable=false)
     */
    public $cv = null;

    /**
     * @Annotation\Type("\Zend\Form\Element\Email")
     * @Annotation\Options({"label":"Email", "description":"", "addon":"fa fa-at"})
     * @ORM\Column(type="string", length=100, unique=false, nullable=true,
     * name="email")
     */
    public $email = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Teléfono", "description":"", "addon":"fa
     * fa-phone"})
     * @ORM\Column(type="string", length=20, unique=false, nullable=true, name="phone")
     */
    public $phone = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"skype", "description":"", "addon":"fa fa-skype"})
     * @ORM\Column(type="string", length=30, unique=false, nullable=true, name="skype")
     */
    public $skype = null;

    /**
     * @Annotation\Exclude()
     * @Annotation\Options({"label":"Email Publico", "description":""})
     * @ORM\Column(type="boolean", nullable=true, name="publicemail")
     */
    public $publicEmail = null;

    /**
     * @Annotation\Exclude()
     * @Annotation\Options({"label":"Teléfono Publico", "description":""})
     * @ORM\Column(type="boolean", nullable=true, name="publicphone")
     */
    public $publicPhone = null;

    /**
     * @Annotation\Exclude()
     * @Annotation\Options({"label":"Skype Publico", "description":""})
     * @ORM\Column(type="boolean", nullable=true, name="publicskype")
     */
    public $publicSkype = null;

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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getSkype()
    {
        return $this->skype;
    }

    public function setSkype($skype)
    {
        $this->skype = $skype;
    }

    public function getPublicEmail()
    {
        return $this->publicEmail;
    }

    public function setPublicEmail($publicEmail)
    {
        $this->publicEmail = $publicEmail;
    }

    public function getPublicPhone()
    {
        return $this->publicPhone;
    }

    public function setPublicPhone($publicPhone)
    {
        $this->publicPhone = $publicPhone;
    }

    public function getPublicSkype()
    {
        return $this->publicSkype;
    }

    public function setPublicSkype($publicSkype)
    {
        $this->publicSkype = $publicSkype;
    }

    public function __toString()
    {
        return $this->getEmail();
    }

    public function toArray(){
        return ["email" => $this->getEmail(),"phone" => $this->getPhone(),"skype" => $this->getSkype()];
    }

}

