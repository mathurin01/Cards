<?php

namespace Game\CardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Game\CardBundle\Entity\Categorie;
use Game\CardBundle\Entity\Team;

class Teams implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $team = new Team();
        $team->setPlayer1(1);
        $team->setPlayer2(2);

        $manager->persist($team);
        $manager->flush();

        $team = new Team();
        $team->setPlayer1(1);
        $team->setPlayer2(3);

        $manager->persist($team);
        $manager->flush();

        $team = new Team();
        $team->setPlayer1(1);
        $team->setPlayer2(4);

        $manager->persist($team);
        $manager->flush();

        $team = new Team();
        $team->setPlayer1(2);
        $team->setPlayer2(3);

        $manager->persist($team);
        $manager->flush();

        $team = new Team();
        $team->setPlayer1(2);
        $team->setPlayer2(4);

        $manager->persist($team);
        $manager->flush();

        $team = new Team();
        $team->setPlayer1(3);
        $team->setPlayer2(4);

        $manager->persist($team);
        $manager->flush();
    }
}
