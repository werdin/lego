<?php

namespace Wrd\Bundle\LegoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_attributes")
 */
class ProductAttributes {
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;

    /**
     * @var Product $product
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="attributes")
     */
    protected  $product;

    /**
     * @var Attributes $attributes
     *
     * @ORM\ManyToOne(targetEntity="Attributes")
     */
    protected  $attributes;

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return Attributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param Attributes $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }
} 