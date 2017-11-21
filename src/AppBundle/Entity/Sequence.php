<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpKernel\Tests\Controller\ArgumentResolverTest;

/**
 * Sequence
 *
 * @ORM\Table(name="sequence")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SequenceRepository")
 */
class Sequence
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
     * @ORM\Column(name="title", type="string", length=80)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text")
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Categorie",cascade={"persist"})
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Url", cascade={"persist"})
     */
    private $urls;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Niveau")
     * @ORM\JoinColumn(nullable=false)
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Etablissement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $institution;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->urls = new ArrayCollection();
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Sequence
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Sequence
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Sequence
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }


    public function addCategory(Categorie $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    public function removeCategory(Categorie $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * @return mixed
     */
    public function getUrls()
    {
        return $this->urls;
    }

    public function addUrl(Url $url)
    {
        $this->urls[] = $url;
        return $this;
    }

    public function removeUrl(Url $url)
    {
        $this->urls->removeElement($url);
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }


    public function setLevel(Niveau $level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * @param mixed $institution
     */
    public function setInstitution($institution)
    {
        $this->institution = $institution;
    }


}

