<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Game\CardBundle\Entity\Game;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $tabGame = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->findAll();
        $tabTeam = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Team')->findAll();
        $tabPlayer = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findAll();

        $mytab = $this->make($tabPlayer, $tabTeam, $tabGame);

        $lastGame = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->findLast();

        return $this->render('GameCardBundle:Default:index.html.twig', array('lastGame' => $lastGame));
    }

    public function ruleAction()
    {
        return $this->render('GameCardBundle:Default:rule.html.twig');
    }

    private function make($tabPlayer, $tabTeam, $tabGame){
        $myTab = array();
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

    public function menuTeam($mytab){
         return $this->render('GameCardBundle:Team:menu.html.twig', array('mytab' => $mytab));
    }
}
