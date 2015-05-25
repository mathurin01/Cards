<?php

namespace Game\CardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Game\CardBundle\Entity\Place;

class Places implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $place = new Place();
        $place->setName('Chateau de la Barre');
        $place->setTown('Chadefond-sur-Layon');

        $manager->persist($place);
        $manager->flush();

        $place = new Place();
        $place->setName('16, les Barres');
        $place->setTown('Saint-Aubin-de-Luigné');

        $manager->persist($place);
        $manager->flush();

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 3;
    }
}
