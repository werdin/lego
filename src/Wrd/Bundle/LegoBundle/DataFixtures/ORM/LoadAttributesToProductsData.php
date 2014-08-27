<?php


namespace Wrd\Bundle\LegoBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wrd\Bundle\LegoBundle\Entity\Attributes;
use Wrd\Bundle\LegoBundle\Entity\ProductAttributes;

class LoadAttributesToProductsData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {

        foreach (static::$attributesToProduct as  $relations) {
            $attribute = new ProductAttributes();
            $attribute->setProduct($this->getReference($relations[0]));
            $attribute->setAttributes($this->getReference($relations[1]));
            $manager->persist($attribute);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 7;
    }

    private static $attributesToProduct = array(
         array('pr7', 'attr0'),
         array('pr7', 'attr1'),
         array('pr7', 'attr2'),
         array('pr7', 'attr4'),
         array('pr8', 'attr0'),
         array('pr8', 'attr5'),
         array('pr8', 'attr2'),
         array('pr8', 'attr3'),
         array('pr8', 'attr6'),
         array('pr9', 'attr5'),
         array('pr9', 'attr0'),
         array('pr9', 'attr2'),
         array('pr9', 'attr7'),
         array('pr9', 'attr8'),
         array('pr10', 'attr0'),
         array('pr10', 'attr5'),
         array('pr10', 'attr2'),
         array('pr10', 'attr3'),
    );
}