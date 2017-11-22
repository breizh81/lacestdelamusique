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
     * @ORM\Column(name="label", type="string", length=255)
     */
    private $label;

    /**
     * @var bool
     *
     * @ORM\Column(name="automatic_validation", type="boolean")
     */
    private $automaticValidation;


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
     * Set label
     *
     * @param string $label
     *
     * @return Devoir
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set automaticValidation
     *
     * @param boolean $automaticValidation
     *
     * @return Devoir
     */
    public function setAutomaticValidation($automaticValidation)
    {
        $this->automaticValidation = $automaticValidation;

        return $this;
    }

    /**
     * Get automaticValidation
     *
     * @return bool
     */
    public function getAutomaticValidation()
    {
        return $this->automaticValidation;
    }
}

