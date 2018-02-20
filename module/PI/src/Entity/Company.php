<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Company
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_company")
 * @ORM\Entity(repositoryClass="PI\Repository\CompanyRepository")
 */
class Company
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
     * @Annotation\Options({"label":"name", "description":"", "addon":""})
     * @ORM\Column(type="string", length=200, unique=true, nullable=false, name="name")
     */
    public $name = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"web", "description":"", "addon":""})
     * @ORM\Column(type="string", length=200, unique=false, nullable=true, name="web")
     */
    public $web = null;

    /**
     * @Annotation\Type("Zend\Form\Element\File")
     * @Annotation\Attributes({"type":"file"})
     * @Annotation\Options({"label":"logo","absolutepath":"C:\Users\crist\Documents\Proyectos\CDI\perfil-it\public\media\company\logo","webpath":"media/company/logo",
     * "description":""})
     * @Annotation\Filter({"name":"\ZfMetal\Security\Filter\RenameUpload",
     * "options":{"target":"C:\Users\crist\Documents\Proyectos\CDI\perfil-it\public\media\company\logo","use_upload_name":1,"overwrite":1}})
     * @ORM\Column(type="string", length=200, unique=false, nullable=true, name="logo")
     */
    public $logo = null;

    /**
     * @Annotation\Type("Zend\Form\Element\Textarea")
     * @Annotation\Attributes({"type":"textarea"})
     * @Annotation\Options({"label":"description", "description":""})
     * @ORM\Column(type="string", length=500, unique=false, nullable=true,
     * name="description")
     */
    public $description = null;

    /**
     * @Annotation\Exclude()
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", unique=false, nullable=true, name="created_at")
     */
    public $createdAt = null;

    /**
     * @Annotation\Exclude()
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", unique=false, nullable=true, name="updated_at")
     */
    public $updatedAt = null;

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

    public function getWeb()
    {
        return $this->web;
    }

    public function setWeb($web)
    {
        $this->web = $web;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getLogo_ap()
    {
        return "C:\Users\crist\Documents\Proyectos\CDI\perfil-it\public\media\company";
    }

    public function getLogo_wp()
    {
        return "media/company/logo";
    }

    public function getLogo_fp()
    {
        return "media/company/logo".$this->logo;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function __toString()
    {
        return  $this->name;
    }


}

