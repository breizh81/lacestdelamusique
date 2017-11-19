<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->etablissements = new ArrayCollection();
    }
    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Etablissement",inversedBy="users")
     *
     */
    private $etablissements;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Niveau")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau;
    /**
     * @return mixed
     */
    public function getEtablissements()
    {
        return $this->etablissements;
    }


    public function addEtablissement(Etablissement $etablissement)
    {
        $this->etablissements[] = $etablissement;
        return $this;
    }

    public function removeEtablissement($etablissement)
    {
        $this->etablissements->removeElement($etablissement);
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

}