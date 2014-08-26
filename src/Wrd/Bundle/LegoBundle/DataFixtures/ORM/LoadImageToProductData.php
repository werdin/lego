<?php


namespace Wrd\Bundle\LegoBundle\DataFixtures\ORM;


use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wrd\Bundle\LegoBundle\Entity\Category;
use Wrd\Bundle\LegoBundle\Entity\Product;
use Wrd\Bundle\LegoBundle\Entity\ProductMedia;

class LoadImageToProductData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        foreach (static::$relations as $media => $product) {
            /** @var $productEntity Product */
            $productEntity = $this->getReference($product);
            /** @var $mediaEntity Media */
            $mediaEntity = $this->getReference($media);
            $mediaToProduct = new ProductMedia();
            $mediaToProduct->setProduct($productEntity);
            $mediaToProduct->setMedia($mediaEntity);
            $manager->persist($mediaToProduct);
        }

        $manager->flush();


    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5;
    }

    private static $relations = array(
        'm1' => 'pr1',
        'm2' => 'pr2',
        'm3' => 'pr3',
        'm4' => 'pr4',
        'm5' => 'pr4',
        'm6' => 'pr4',
        'm7' => 'pr5',
        'm8' => 'pr5',
        'm9' => 'pr6',
        'm11' => 'pr8',
        'm12' => 'pr9',
        'm13' => 'pr10',
        'm14' => 'pr7',
    );
}