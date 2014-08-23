<?php


namespace Wrd\Bundle\LegoBundle\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Product {
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
}