<?php

namespace Game\CardBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Game\CardBundle\Entity\Game;

class Games extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $games = array(
            1 => array( 2, 5, 3000, 1710, null, 2012, null, null, null),
            2 => array( 2, 5, 2580, 3000, null, 2012, null, null, null),
            3 => array( 2, 5, 3000, 2900, null, 2012, null, null, null),
            4 => array( 2, 5, 3000, 2400, null, 2012, null, null, null),
            5 => array( 2, 5, 3000, 1220, null, 2012, null, null, null),
            6 => array( 2, 5, 3000, 2130, null, 2012, null, null, null),
            7 => array( 2, 5, 3000, 1630, null, 2012, null, null, null),
            8 => array( 2, 5, 2460, 3000, null, 2012, null, null, null),
            9 => array( 4, 3, 3000, 2790, null, 2012, null, null, null),
            10 => array( 4, 3, 3000, 700, null, 2012, null, null, null),
            11 => array( 4, 3, 2100, 3000, null, 2012, null, null, null),
            12 => array( 2, 5, 3000, 2850, null, 2012, null, null, null),
            13 => array( 1, 6, 2990, 3000, null, 2012, null, null, null),
            14 => array( 1, 6, 3000, 2980, null, 2012, null, null, null),
            15 => array( 2, 5, 1390, 3000, null, 2012, null, null, null),
            16 => array( 2, 5, 1340, 3000, null, 2012, null, null, null),
            17 => array( 4, 3, 3000, 1340, null, 2012, null, null, null),
            18 => array( 4, 3, 2970, 3000, null, 2012, null, null, null),
            19 => array( 4, 3, 3000, 1740, null, 2012, null, null, null),

            20 => array( 4, 3, 2860, 3000, null, 2013, null, null, null),
            21 => array( 4, 3, 2970, 3000, null, 2013, null, null, null),
            22 => array( 4, 3, 2940, 3000, null, 2013, null, null, null),
            23 => array( 6, 1, 3000, 2970, null, 2013, null, null, null),
            24 => array( 6, 1, 3000, 2830, null, 2013, null, null, null),
            25 => array( 4, 3, 3000, 2320, null, 2013, null, null, null),
            26 => array( 2, 5, 3000, 1270, null, 2013, null, null, null),
            27 => array( 2, 5, 3000, 2520, null, 2013, null, null, null),
            28 => array( 1, 6, 3000, 2980, null, 2013, null, null, null),
            29 => array( 4, 3, 2440, 3000, null, 2013, null, null, null),

            30 => array( 2, 5, 2100, 3000, null, 2014, null, null, null),
            31 => array( 2, 5, 3000, 2800, null, 2014, null, null, null),
            32 => array( 2, 5, 1270, 3000, null, 2014, null, null, null),
            33 => array( 2, 5, 3000, 1900, null, 2014, null, null, null),
            34 => array( 2, 5, 3000, 2760, null, 2014, null, null, null),
            35 => array( 2, 5, 2100, 3000, null, 2014, null, null, null),
            36 => array( 4, 3, 2680, 3000, null, 2014, null, null, null),
            37 => array( 2, 5, 2470, 3000, null, 2014, null, null, null),
            38 => array( 6, 1, 2380, 3000, null, 2014, null, null, null),
            39 => array( 6, 1, 3000, 2430, null, 2014, null, null, null),

            40 => array( 2, 5, 2500, 3000, null, 2014, null, null, null),
            41 => array( 4, 3, 2980, 3000, null, 2014, null, null, null),
            42 => array( 4, 3, 3000, 2200, null, 2014, null, null, null),
            43 => array( 4, 3, 3000, 460, null, 2014, null, null, null),
            44 => array( 6, 1, 3000, 2500, null, 2014, null, null, null),
            45 => array( 6, 1, 2340, 3000, null, 2014, null, null, null),
            46 => array( 2, 5, 3000, 1170, null, 2014, null, null, null),
            47 => array( 2, 5, 3000, 1690, null, 2014, null, null, null),
            48 => array( 2, 5, 3000, 1380, null, 2014, null, null, null),
            49 => array( 2, 5, 3000, 1800, null, 2014, null, null, null),

            50 => array( 4, 3, 2380, 3000, null, 2014, null, null, null),
            51 => array( 4, 3, 1050, 3000, null, 2014, null, null, null),
            52 => array( 2, 5, 3000, 2460, null, 2014, null, null, null),
            53 => array( 2, 5, 3000, 1180, null, 2014, null, null, null),
            54 => array( 4, 3, 3000, 2770, null, 2014, null, null, null),
            55 => array( 4, 3, 3000, 2650, null, 2014, null, null, null),
            56 => array( 4, 3, 3000, 2960, null, 2014, null, null, null),
            57 => array( 4, 3, 1330, 3000, null, 2014, null, null, null),
            58 => array( 4, 3, 2090, 3000, null, 2014, null, null, null),
            59 => array( 4, 3, 3000, 1370, null, 2014, null, null, null),

            60 => array( 4, 3, 3000, 1000, null, 2014, null, null, null),
            61 => array( 4, 3, 2640, 3000, null, 2014, null, null, null),
            62 => array( 4, 3, 3000, 2930, null, 2014, null, null, null),
            63 => array( 4, 3, 3000, 2890, null, 2014, null, null, null),
            64 => array( 2, 5, 3000, 2050, null, 2014, null, null, null),
            65 => array( 2, 5, 3000, 2630, null, 2014, null, null, null),
            66 => array( 2, 5, 3000, 2550, null, 2014, null, null, null),
            67 => array( 2, 5, 2730, 3000, null, 2014, null, null, null),
            68 => array( 4, 3, 1800, 3000, null, 2014, null, null, null),
            69 => array( 4, 3, 3000, 2700, null, 2014, null, null, null),
            70 => array( 4, 3, 2220, 3000, null, 2014, null, null, null),
            71 => array( 4, 3, 3000, 2270, null, 2014, null, null, null),

            72 => array( 4, 3, 2500, 3000, null, 2015, null, null, null),
            73 => array( 4, 3, 3000, 2590, null, 2015, null, null, null),
            74 => array( 4, 3, 3000, 2240, null, 2015, null, null, null),
            75 => array( 4, 3, 1530, 3000, null, 2015, null, null, null),
            76 => array( 4, 3, 1730, 3000, null, 2015, null, null, null),
            77 => array( 4, 3, 2410, 3000, null, 2015, null, null, null),
            78 => array( 4, 3, 2610, 3000, null, 2015, null, null, null),
            79 => array( 4, 3, 3000, 2950, null, 2015, null, null, null),

            80 => array( 4, 3, 1420, 3000, null, 2015, null, null, null),
            81 => array( 6, 1, 2140, 3000, null, 2015, null, null, null),
            82 => array( 6, 1, 2240, 3000, null, 2015, null, null, null),
            83 => array( 6, 1, 3000, 2780, null, 2015, null, null, null),
            84 => array( 2, 5, 2000, 3000, null, 2015, null, null, null),
            85 => array( 2, 5, 2140, 3000, null, 2015, null, null, null),
            86 => array( 2, 5, 3000, 1850, null, 2015, null, null, null),
            87 => array( 2, 5, 2760, 3000, null, 2015, null, null, null),
            88 => array( 6, 1, 1670, 3000, null, 2015, null, null, null),
            89 => array( 6, 1, 1570, 3000, null, 2015, null, null, null),

            90 => array( 4, 3, 2710, 3000, null, 2015, null, null, null),
            91 => array( 4, 3, 1240, 3000, null, 2015, null, null, null),
            92 => array( 6, 1, 1230, 3000, null, 2015, null, null, null),
            93 => array( 6, 1, 2190, 3000, null, 2015, null, null, null),
            94 => array( 6, 1, 3000, 2590, null, 2015, null, null, null),
            95 => array( 6, 1, 3000, 980, null, 2015, null, null, null),
            96 => array( 6, 1, 2760, 3000, null, 2015, null, null, null),
            97 => array( 6, 1, 3000, 1840, null, 2015, null, null, null),
            98 => array( 6, 1, 3000, 1480, null, 2015, null, null, null),
            99 => array( 6, 1, 3000, 2550, null, 2015, null, null, null),

            100 => array( 2, 5, 3000, 2910, null, 2015, null, null, null),
            101 => array( 2, 5, 1850, 3000, null, 2015, null, null, null),
            102 => array( 2, 5, 1020, 3000, null, 2015, null, null, null),
            103 => array( 2, 5, 1800, 3000, null, 2015, null, null, null),
            104 => array( 2, 5, 2430, 2590, null, 2015, null, null, null),
            105 => array( 6, 1, 3000, 280, null, 2015, null, null, null),
            106 => array( 6, 1, 1860, 3000, null, 2015, null, null, null),
            107 => array( 6, 1, 3000, 770, null, 2015, null, null, null),
            108 => array( 2, 5, 3000, 2410, null, 2015, null, null, null),
            109 => array( 2, 5, 3000, 2210, null, 2015, null, null, null),
            110 => array( 2, 5, 3000, 2800, null, 2015, null, null, null),
            111 => array( 2, 5, 2490, 3000, null, 2015, null, null, null),
        );

        foreach($games as $i => $g)
        {
            $game = new Game();
            $game->setTeamA($manager->getRepository('GameCardBundle:Team')->find($g[0]));
            $game->setTeamB($manager->getRepository('GameCardBundle:Team')->find($g[1]));

            $game->setScoreA($g[2]);
            $game->setScoreB($g[3]);
            $game->setDate($g[4]);
            $game->setYear($g[5]);
            $game->setPlace($g[6]);
            $game->setHits($g[7]);
            $game->setStory($g[8]);

            $manager->persist($game);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 4;
    }
}
