<?php


namespace Wrd\Bundle\LegoBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wrd\Bundle\LegoBundle\Entity\Attributes;

class LoadAttributesData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {

        foreach (static::$attributes as $key => $attribute) {
            $attributeEntity = new Attributes();
            $attributeEntity->setName($attribute['name']);
            $attributeEntity->setValue($attribute['value']);
            $manager->persist($attributeEntity);
            $this->addReference('attr' . $key, $attributeEntity);
        }
        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 6;
    }

    private static $attributes = array(
        array('name' => 'Type', 'value' => 'LED TV'),
        array('name' => 'Resolution', 'value' => '1366 x 768'),
        array('name' => 'Connectivity', 'value' => '1 x HDMI & 1 x USB '),
        array('name' => 'Screen Size', 'value' => '32'),
        array('name' => 'InchRefresh Rate', 'value' => '60HzSUPC'),
        array('name' => 'Resolution', 'value' => '1920x1080'),
        array('name' => 'Refresh Rate', 'value' => '50HzSUPC'),
        array('name' => 'Refresh Rate', 'value' => '100HzSUPC'),
        array('name' => 'Resolution', 'value' => '100HzSUPC'),
    );
}