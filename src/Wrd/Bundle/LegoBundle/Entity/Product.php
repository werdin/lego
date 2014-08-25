<?php

namespace Wrd\Bundle\LegoBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Wrd\Bundle\LegoBundle\Repository\ProductRepository")
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $description;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=11, scale=2)
     */
    protected $price;

    /**
     * @var $category Category
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="product")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @var  Media $image
     *
     * @ORM\OneToMany(targetEntity="ProductMedia", mappedBy="product", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $media;

    /**
     * @var  Attributes $attributes
     *
     * @ORM\OneToMany(targetEntity="ProductAttributes", mappedBy="product", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $attributes;

    public function __construct()
    {
        $this->media = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return  Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return ArrayCollection
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param ProductMedia $productMedia
     * @return $this
     */
    public function addMedia(ProductMedia $productMedia)
    {
        $productMedia->setProduct($this);
        $this->media[] = $productMedia;

        return $this;
    }

    /**
     * @param $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * @return \Wrd\Bundle\LegoBundle\Entity\Attributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param \Wrd\Bundle\LegoBundle\Entity\Attributes $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    public function addAttributes(ProductAttributes $productAttributes)
    {
        $productAttributes->setProduct($this);
        $this->attributes[] = $productAttributes;

        return $this;
    }


}