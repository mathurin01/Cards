<?php

namespace Game\CardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Game\CardBundle\Entity\Categorie;
use Game\CardBundle\Entity\Player;

class Players implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $player = new Player();
        $player->setFirstName('Colas');
        $player->setLastName('Blanc');
        $player->setBirth(new \DateTime("1969-06-19"));
        $player->setLogo(null);

        $manager->persist($player);
        $manager->flush();

        $player = new Player();
        $player->setFirstName('Bettina');
        $player->setLastName('Djerroud');
        $player->setBirth(new \DateTime("1971-11-02"));
        $player->setLogo(null);

        $manager->persist($player);
        $manager->flush();

        $player = new Player();
        $player->setFirstName('Jeanne');
        $player->setLastName('Thireau');
        $player->setBirth(new \DateTime("1970-12-28"));
        $player->setLogo(null);

        $manager->persist($player);
        $manager->flush();

        $player = new Player();
        $player->setFirstName('Jérôme');
        $player->setLastName('Petiteau');
        $player->setBirth(new \DateTime("1969-07-23"));
        $player->setLogo(null);

        $manager->persist($player);
        $manager->flush();
    }
}
