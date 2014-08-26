<?php


namespace Wrd\Bundle\LegoBundle\DataFixtures\ORM;


use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadMediaData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $dfPath = __DIR__ . '/../Image';

        foreach (static::$imgPath as $key => $img) {
            $media = new Media();
            $media->setContext('default');
            $media->setProviderName('sonata.media.provider.image');
            $media->setBinaryContent($dfPath . '/' . $img);
            $manager->persist($media);
            $manager->flush();
            $this->addReference('m' . $key, $media);

        }


    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4;
    }

    private static $imgPath = array(
        1 => 'download.jpg',
        2 => 'download (1).jpg',
        3 => 'download (2).jpg',
        4 => 'ks-slate-04-lg.jpg',
        5 => 'ks-slate-03-lg._V357380635_.jpg',
        6 => 'ks-slate-05-lg._V356062407_.jpg',
        7 => 'kt-slate-02-lg._V355704200_.jpg',
        8 => 'kt-slate-01-lg-hover.jpg',
        9 => '31+ksxnJ5ML._SX425_.jpg',
        10 => '7G Black.300x300.jpg',
        11 => 'Micromax-32T42ECHD-32-Inches-HD-SDL700735485-1-4ffdd.jpg',
        12 => 'LG-32LB5820-32-Inches-Fully-SDL694726947-1-7b4f5.jpg',
        13 => 'Samsung-48H5100-48-Inches-Full-SDL234590164-1-15514.jpg',
        14 => 'Sony-KDL-42W700B-42-Inches-SDL902806341-1-44111.jpg',
    );
}