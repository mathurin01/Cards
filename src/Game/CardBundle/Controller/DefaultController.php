<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Game\CardBundle\Entity\Game;

class DefaultController extends Controller
{
    /**
     * [indexAction description]
     *
     * @return [type] [description]
     */
    public function indexAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $gameRepository = $manager->getRepository('GameCardBundle:Game');

        $tabGame   = $gameRepository->findAll();
        $lastGame  = $gameRepository->findLast();

        $tabTeam   = $manager->getRepository('GameCardBundle:Team')->findAll();
        $tabPlayer = $manager->getRepository('GameCardBundle:Player')->findAll();

        $mytab = $this->make($tabPlayer, $tabTeam, $tabGame); // @todo

        return $this->render('GameCardBundle:Default:index.html.twig', [
            'lastGame' => $lastGame
        ]);
    }

    /**
     * [ruleAction description]
     *
     * @return [type] [description]
     */
    public function ruleAction()
    {
        return $this->render('GameCardBundle:Default:rule.html.twig');
    }

    /**
     * [make description]
     *
     * @todo
     *
     * @param  [type] $tabPlayer [description]
     * @param  [type] $tabTeam   [description]
     * @param  [type] $tabGame   [description]
     * @return [type]            [description]
     */
    private function make($tabPlayer, $tabTeam, $tabGame)
    {
        $myTab = [];
       /* foreach ($tabPlayer as $player) {
            foreach ($tabTeam as $team) {
                $myTab['id'] = $team->getId();
                if ($team->getPlayer1() == $player->getId()) {
                    $myTab['player1'] = $player->getFirstname();
                } elseif ($team->getPlayer2() == $player->getId()) {
                    $myTab['player2'] = $player->getFirstname();
                }
            }
        }*/
    }

    /**
     * [menuTeam description]
     *
     * @param  [type] $mytab [description]
     * @return [type]        [description]
     */
    public function menuTeam($mytab)
    {
        return $this->render('GameCardBundle:Team:menu.html.twig', [
            'mytab' => $mytab
        ]);
    }
}
