<?php


namespace Wrd\Bundle\LegoBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Wrd\Bundle\LegoBundle\Entity\User;

class LoadUserData implements FixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        /** @var $user User */
        $user = $userManager->createUser();
        $user->setUsername('admin');
        $user->setEmail('email@domain.com');
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_ADMIN'));

        $userManager->updateUser($user, true);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}