<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devoir
 *
 * @ORM\Table(name="devoir")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DevoirRepository")
 */
class Devoir
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var bool
     *
     * @ORM\Column(name="validation_automatique", type="boolean")
     */
    private $validationAutomatique;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Devoir
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set validationAutomatique
     *
     * @param boolean $validationAutomatique
     *
     * @return Devoir
     */
    public function setValidationAutomatique($validationAutomatique)
    {
        $this->validationAutomatique = $validationAutomatique;

        return $this;
    }

    /**
     * Get validationAutomatique
     *
     * @return bool
     */
    public function getValidationAutomatique()
    {
        return $this->validationAutomatique;
    }
}

