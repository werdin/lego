<?php


namespace Wrd\Bundle\LegoBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wrd\Bundle\LegoBundle\Entity\Product;

class LoadProductData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {

        $pr1 = new Product();
        $pr1->setCategory($this->getReference('cat1'));
        $pr1->setTitle('The Book of Unknown American');
        $pr1->setPrice(15,78);
        $pr1->setDescription(static::$descr[1]);

        $pr2 = new Product();
        $pr2->setCategory($this->getReference('cat1'));
        $pr2->setTitle('Redeployment');
        $pr2->setPrice(16,15);
        $pr2->setDescription(static::$descr[2]);

        $pr3 = new Product();
        $pr3->setCategory($this->getReference('cat1'));
        $pr3->setTitle('Euphoria');
        $pr3->setPrice(15,80);
        $pr3->setDescription(static::$descr[3]);

        $pr4 = new Product();
        $pr4->setCategory($this->getReference('cat2'));
        $pr4->setTitle('Kindle Fire HDX 7');
        $pr4->setPrice(139);
        $pr4->setDescription(static::$descr[4]);

        $pr5 = new Product();
        $pr5->setCategory($this->getReference('cat2'));
        $pr5->setTitle('Kindle Fire 7" Tablet');
        $pr5->setPrice(229);
        $pr5->setDescription(static::$descr[5]);

        $pr6 = new Product();
        $pr6->setCategory($this->getReference('cat3'));
        $pr6->setTitle('SanDisk Sansa Clip+ 8 GB');
        $pr6->setPrice(46);
        $pr6->setDescription(static::$descr[6]);

        $pr7 = new Product();
        $pr7->setCategory($this->getReference('cat4'));
        $pr7->setTitle('Micromax 32T42ECHD 32');
        $pr7->setPrice(355);
        $pr7->setDescription(static::$descr[7]);

        $pr8 = new Product();
        $pr8->setCategory($this->getReference('cat4'));
        $pr8->setTitle('LG 32LB5820 32 Inches');
        $pr8->setPrice(450);
        $pr8->setDescription(static::$descr[8]);

        $pr9 = new Product();
        $pr9->setCategory($this->getReference('cat4'));
        $pr9->setTitle('Samsung 48H5100 48');
        $pr9->setPrice(460);
        $pr9->setDescription(static::$descr[9]);

        $pr10 = new Product();
        $pr10->setCategory($this->getReference('cat4'));
        $pr10->setTitle('Sony KDL-42W700B');
        $pr10->setPrice(499);
        $pr10->setDescription(static::$descr[10]);

        $manager->persist($pr1);
        $manager->persist($pr2);
        $manager->persist($pr3);
        $manager->persist($pr4);
        $manager->persist($pr5);
        $manager->persist($pr6);
        $manager->persist($pr7);
        $manager->persist($pr8);
        $manager->persist($pr9);
        $manager->persist($pr10);
        $manager->flush();

        $this->addReference('pr1', $pr1);
        $this->addReference('pr2', $pr2);
        $this->addReference('pr3', $pr3);
        $this->addReference('pr4', $pr4);
        $this->addReference('pr5', $pr5);
        $this->addReference('pr6', $pr6);
        $this->addReference('pr7', $pr7);
        $this->addReference('pr8', $pr8);
        $this->addReference('pr9', $pr9);
        $this->addReference('pr10', $pr10);

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }

    private static  $descr = array(
        1 => '“A triumph of storytelling. Henríquez pulls us into the lives of her characters with such mastery that we hang on to them just as fiercely as they hang on to one another and their dreams. This passionate, powerful novel will stay with you long after you’ve turned the final page.” —Ben Fountain, author of Billy Lynn’s Long Halftime Walk

A boy and a girl who fall in love. Two families whose hopes collide with destiny. An extraordinary novel that offers a resonant new definition of what it means to be American.',
        2 => 'Phil Klay\'s Redeployment takes readers to the frontlines of the wars in Iraq and Afghanistan, asking us to understand what happened there, and what happened to the soldiers who returned.  Interwoven with themes of brutality and faith, guilt and fear, helplessness and survival, the characters in these stories struggle to make meaning out of chaos.

In "Redeployment", a soldier who has had to shoot dogs because they were eating human corpses must learn what it is like to return to domestic life in suburbia, surrounded by people "who have no idea where Fallujah is, where three members of your platoon died."  In "After Action Report", a Lance Corporal seeks expiation for a killing he didn\'t commit, in order that his best friend will be unburdened.  A Morturary Affairs Marine tells about his experiences collecting remains—of U.S. and Iraqi soldiers',
        3=> 'From New England Book Award winner Lily King comes a breathtaking novel about three young anthropologists of the ‘30’s caught in a passionate love triangle that threatens their bonds, their careers, and, ultimately, their lives.
English anthropologist Andrew Bankson has been alone in the field for several years, studying the Kiona river tribe in the Territory of New Guinea. Haunted by the memory of his brothers’ deaths and increasingly frustrated and isolated by his research, Bankson is on the verge of suicide when a chance encounter with colleagues, the controversial Nell Stone and her wry and mercurial Australian husband Fen, pulls him back from the brink. Nell and Fen have just fled the bloodthirsty Mumbanyo and, in spite of Nell’s poor health, are hungry for a new discovery. When Bankson finds them a new tribe nearby, the artistic, female-dominated Tam, he ignites an intellectual and romantic firestorm between the three',
        4=>'Experience movies, TV, and games, and more on a stunning HD display (216 ppi / 1280x800)
Fast 1.5GHz dual-core processor—apps launch quickly, games and videos play smoothly
Create profiles and set time limits for children with Kindle FreeTime. Easy-to-use parental controls let everyone enjoy, worry-free
Ultra-fast web browsing over built-in Wi-Fi, plus updated e-mail and calendar support for Gmail, Outlook, and more
Instant access to over 100,000 apps and games in the Amazon Appstore, including a new paid app for free every day
 In addition to Free Two-Day Shipping, Prime members can stream tens of thousands of Prime Instant Video titles at no additional cost, over half of which can be downloaded to the latest generation of Kindle Fire tablets',
        5=>'Perfect-color HDX display, plus powerful quad-core processor for fast, fluid performance and immersive entertainment
Exclusive 7" HDX display (1920x1200), high pixel density (323 PPI), and perfect color accuracy (100% sRGB) for vivid, lifelike images that go beyond standard HD
Ultra-fast 2.2GHz quad-core processor—3x more powerful than previous generation—with 2GB of RAM and Adreno 330 GPU for fast, fluid gaming and video
Introducing the "Mayday" button—revolutionary, on-device tech support, exclusive to Kindle Fire HDX tablets. Connect for free to an Amazon expert 24x7, 365 days a year
Stay productive on the go with ultra-fast web browsing, built-in OfficeSuite, and updated e-mail and calendar support for Gmail, Outlook, and more
Immersive entertainment experience—see trivia and character backgrounds with X-Ray for Movies and TV, follow along with lyrics with new X-Ray for Music, fling videos to your TV with Second Screen, and more
Over 100,000 apps and games available in the Amazon Appstore, including a new paid app for free every day
 In addition to Free Two-Day Shipping, Prime members can stream tens of thousands of Prime Instant Video titles at no additional cost, over half of which can be downloaded to the latest generation of Kindle Fire tablets.',
        6 => 'Store up to 2000 songs
Memory card slot for pre-loaded cards
Digital FM tuner with 40 presets
Rechargeable battery lasts up to 15 hours
Built-in clip for easy carrying',
        7 => 'Type : LED TV Resolution:1366 x 768
Connectivity : 1 x HDMI & 1 x USB 1 Year Micromax India Warranty Screen
 Size : 32 InchRefresh Rate : 60HzSUPC: SDL700735485',
        8 => 'Type : LED TV Resolution : 1920x1080 Connectivity : 3 x HDMI & 3 x USB
 1 Year LG India Warranty Screen Size : 32 Inch Refresh Rate : 50HzSUPC: SDL694726947',
        9 => 'Type : LED TV Resolution : 1920x1080
Connectivity : 2 x HDMI & 2 x USB Warranty : 1 Year
 Samsung India Warranty Screen Size : 48 Inch Refresh Rate : 100HzSUPC: SDL234590164',
        10 => 'Type : LED TV Resolution : 1920x1080
 Connectivity : 4 x HDMI & 2 x USB Warranty : 1
 Year Sony India Warranty Screen Size : 42 Inch Refresh Rate : 200HzSUPC: SDL902806341'

    );


}