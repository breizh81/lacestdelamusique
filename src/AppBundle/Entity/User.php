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
        $this->institutions = new ArrayCollection();
    }
    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Etablissement",inversedBy="users")
     *
     */
    private $institutions;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Niveau")
     * @ORM\JoinColumn(nullable=false)
     */
    private $level;
    /**
     * @return mixed
     */
    public function getInstitutions()
    {
        return $this->institutions;
    }


    public function addInstitution(Etablissement $institution)
    {
        $this->institutions[] = $institution;
        return $this;
    }

    public function removeInstitution($institution)
    {
        $this->institutions->removeElement($institution);
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

}