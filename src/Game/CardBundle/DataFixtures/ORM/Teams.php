<?php

namespace Game\CardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Game\CardBundle\Entity\Team;

class Teams extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $team = new Team();
        $team->setPlayer1($manager->getRepository('GameCardBundle:Player')->find(1));
        $team->setPlayer2($manager->getRepository('GameCardBundle:Player')->find(2));

        $manager->persist($team);
        $manager->flush();

        $team = new Team();
        $team->setPlayer1($manager->getRepository('GameCardBundle:Player')->find(1));
        $team->setPlayer2($manager->getRepository('GameCardBundle:Player')->find(3));

        $manager->persist($team);
        $manager->flush();

        $team = new Team();
        $team->setPlayer1($manager->getRepository('GameCardBundle:Player')->find(1));
        $team->setPlayer2($manager->getRepository('GameCardBundle:Player')->find(4));

        $manager->persist($team);
        $manager->flush();

        $team = new Team();
        $team->setPlayer1($manager->getRepository('GameCardBundle:Player')->find(2));
        $team->setPlayer2($manager->getRepository('GameCardBundle:Player')->find(3));

        $manager->persist($team);
        $manager->flush();

        $team = new Team();
        $team->setPlayer1($manager->getRepository('GameCardBundle:Player')->find(2));
        $team->setPlayer2($manager->getRepository('GameCardBundle:Player')->find(4));

        $manager->persist($team);
        $manager->flush();

        $team = new Team();
        $team->setPlayer1($manager->getRepository('GameCardBundle:Player')->find(3));
        $team->setPlayer2($manager->getRepository('GameCardBundle:Player')->find(4));

        $manager->persist($team);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 2;
    }
}
