<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * UserCompany
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_user_company")
 * @ORM\Entity(repositoryClass="PI\Repository\UserCompanyRepository")
 */
class UserCompany
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
     * @Annotation\Options({"label":"user","empty_option": "",
     * "target_class":"\ZfMetal\Security\Entity\User", "description":""})
     * @ORM\ManyToOne(targetEntity="\ZfMetal\Security\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    public $user = null;

    /**
     * @Annotation\Type("DoctrineModule\Form\Element\ObjectSelect")
     * @Annotation\Options({"label":"company","empty_option": "",
     * "target_class":"\PI\Entity\Company", "description":""})
     * @ORM\ManyToOne(targetEntity="\PI\Entity\Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
     */
    public $company = null;

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

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function __toString()
    {
return;
    }


}

