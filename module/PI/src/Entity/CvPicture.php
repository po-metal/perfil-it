<?php

namespace PI\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Zend\Form\Annotation as Annotation;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint as UniqueConstraint;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CvPicture
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 * @ORM\Table(name="pi_cv_picture")
 * @ORM\Entity(repositoryClass="PI\Repository\CvPictureRepository")
 */
class CvPicture
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
     * @Annotation\Type("Zend\Form\Element\File")
     * @Annotation\Attributes({"type":"file"})
     * @Annotation\Attributes({"class":"hidden"})
     * @Annotation\Options({"label":"Foto","absolutepath":"/var/www/perfil-it/public/cv/img/","webpath":"/cv/img/",
     * "description":""})
     * @Annotation\Filter({"name":"filerenameupload",
     * "options":{"target":"/var/www/perfil-it/public/cv/img/","use_upload_name":1,"overwrite":1}})
     * @ORM\Column(type="string", length=120, unique=false, nullable=true,
     * name="picture")
     */
    public $picture = null;

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

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getPicture_ap()
    {
        return "/var/www/perfil-it/public/cv/img/";
    }

    public function getPicture_wp()
    {
        return "/cv/img/";
    }

    public function getPicture_fp()
    {
        $fp = "";
        if($this->picture){
            $fp = "/cv/img/" . $this->picture;
        }
        return $fp;
    }

    public function __toString()
    {
        return $this->getPicture_wp();
    }

    public function toArray()
    {
        return ["src" => $this->getPicture_fp(),"picture" => $this->getPicture()];
    }

}

