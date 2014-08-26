<?php


namespace Wrd\Bundle\LegoBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wrd\Bundle\LegoBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $cat1 = new Category();
        $cat1->setName('Books');

        $cat2 = new Category();
        $cat2->setName('Kindle Fire');

        $cat3 = new Category();
        $cat3->setName('MP3 Players');

        $cat4 = new Category();
        $cat4->setName('Televisions');

        $manager->persist($cat1);
        $manager->persist($cat2);
        $manager->persist($cat3);
        $manager->persist($cat4);
        $manager->flush();

        $this->addReference('cat1', $cat1);
        $this->addReference('cat2', $cat2);
        $this->addReference('cat3', $cat3);
        $this->addReference('cat4', $cat4);

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}