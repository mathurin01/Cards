<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{

    public $t_Main  = array();
    public $t_Low   = array();
    public $t_Order = array();
    public $t_Team  = array();

    public function indexAction()
    {

        $tabMain = $this->loadTeamMain();
        $tabLow = $this->loadTeamLow();
        $tabTeam = $this->loadTeamTeam();
        return $this->render('GameCardBundle:Player:index.html.twig', array(
            'tabMain'   => $tabMain,
            'tabTeam'   => $tabTeam,
            'tabLow'    => $tabLow,
        ));
        /*if(!$players = $this->getRequest()->getSession()->get('players')){
            $players = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findAll();
            $session = $this->getRequest()->getSession();
            $session->set('players', $players);
        }

        return $this->render('GameCardBundle:Player:index.html.twig', array('players' => $players));*/
    }

    public function loadTeamTeam()
    {
        if($this->t_Team == null)
            $this->load();

        return $this->t_Team;
    }

    public function loadTeamMain()
    {
        if($this->t_Main == null)
            $this->load();

        return $this->t_Main;
    }

    public function loadTeamLow()
    {
        if($this->t_Low == null)
            $this->load();

        return $this->t_Low;
    }

    public function loadTeamOrder()
    {
        if($this->t_Order == null)
            $this->load();

        return $this->t_Order;
    }
    public function showAction($id)
    {
        $player = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findById($id);

        return $this->render('GameCardBundle:Player:show.html.twig', array('player' => $player));

    }



    public function load()
    {
        $games = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->findAll();
        $teams = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Team')->findAll();
        $players = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findAll();

        $tabTeam = array();
        $tabLow = array();
        $tabOrder = array();
        $tabMain = array();
        $jj = 0;
        $totalA = 0;
        $totalLooseA = 0;
        $totalB = 0;
        $totalLooseB = 0;
        $nbGame = 0;
        $nbGameLoose = 0;


        foreach($players as $p)
        {
            foreach($teams as $t)
            {
                    foreach($games as $g)
                    {
                        //var_dump($p->getId());
                        if(($g->getTeamA()->getId() === $t->getId()) and ($t->getPlayer1()->getId() === $p->getId()))
                        {
                            $totalA += $g->getScoreA();
                            if($g->getScoreA()!= 3000)
                            {
                                $totalLooseA += $g->getScoreA();
                                $nbGameLoose++;
                            }
                            $nbGame ++;
                        }

                        if(($g->getTeamA()->getId() === $t->getId()) and ($t->getPlayer2()->getId() === $p->getId()))
                        {
                            $totalA += $g->getScoreA();
                            if($g->getScoreA()!= 3000)
                            {
                                $totalLooseA += $g->getScoreA();
                                $nbGameLoose++;
                            }
                            $nbGame++;
                        }
                        if(($g->getTeamB()->getId() === $t->getId()) and ($t->getPlayer1()->getId() === $p->getId()))
                        {
                            $totalB += $g->getScoreB();
                            if($g->getScoreB()!= 3000)
                            {
                                $totalLooseB += $g->getScoreB();
                                $nbGameLoose++;
                            }
                            $nbGame ++;
                        }


                        if(($g->getTeamB()->getId() === $t->getId()) and ($t->getPlayer2()->getId() === $p->getId()))
                        {
                            $totalB += $g->getScoreB();
                            if($g->getScoreB()!= 3000)
                            {
                                $totalLooseB += $g->getScoreB();
                                $nbGameLoose++;
                            }
                            $nbGame++;
                        }
                    }
                }

            $tabTeam[$p->getId()]['name'] = $p->getFirstname();
            $tabTeam[$p->getId()]['totalPts'] = $totalA + $totalB;
            $tabTeam[$p->getId()]['totalPtsLoose'] = $totalLooseA + $totalLooseB;
            $tabTeam[$p->getId()]['nbGame'] = $nbGame;
            $tabTeam[$p->getId()]['nbGameLoose'] = $nbGameLoose;
             $tabTeam[$p->getId()]['pourcent'] = ($nbGame-$nbGameLoose)*100 / $nbGame;
            $tabTeam[$p->getId()]['id'] = $p->getId();

           // var_dump($tabTeam[$p->getId()]);
            $jj++;
            $totalA = 0;
            $totalB = 0;
            $totalLooseA = 0;
            $totalLooseB = 0;
            $nbGame = 0;
            $nbGameLoose = 0;
        }

        var_dump($tabTeam);
        $ii = 1;
        foreach($tabTeam as $tab){
            $tabLow['totalPts'][$ii]       = array($tab['totalPts'], $tab['name']);
            $tabLow['totalPtsLoose'][$ii]  = array($tab['totalPtsLoose'], $tab['name']);
            $tabLow['nbGame'][$ii]         = array($tab['nbGame'], $tab['name']);
            $tabLow['nbGameLoose'][$ii]    = array($tab['nbGameLoose'], $tab['name']);
            $tabLow['pourcent'][$ii]       = array($tab['pourcent'], $tab['name']);
            $ii++;

        }

        $tabMain['totalPts']        = max($tabLow['totalPts']);
        $tabMain['totalPtsLoose']   = max($tabLow['totalPtsLoose']);
        $tabMain['nbGame']          = max($tabLow['nbGame']);
        $tabMain['nbGameLoose']     = max($tabLow['nbGameLoose']);
        $tabMain['pourcent']        = max($tabLow['pourcent']);

        $tabOrder['totalPts']       = arsort($tabLow['totalPts'], SORT_DESC);
        $tabOrder['totalPtsLoose']  = arsort($tabLow['totalPtsLoose'], SORT_DESC);
        $tabOrder['nbGame']         = arsort($tabLow['nbGame'], SORT_DESC);
        $tabOrder['nbGameLoose']    = arsort($tabLow['nbGameLoose'], SORT_DESC);
        $tabOrder['pourcent']       = arsort($tabLow['pourcent'], SORT_DESC);

        $this->t_Main   = $tabMain;
        $this->t_Order  = $tabOrder;
        $this->t_Low    = $tabLow;
        $this->t_Team   = $tabTeam;
        /*return $this->render('GameCardBundle:Team:show.html.twig', array(
            'tabMain'   => $tabMain,
            'tabTeam'   => $tabTeam,
            'tabLow'    => $tabLow,
            //'team'      => $team,
        ));*/

    }
    public function menuAction()
    {
        if(!$players = $this->getRequest()->getSession()->get('players'))
            $players = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findAll();

        return $this->render('GameCardBundle:Player:menu.html.twig', array('players' => $players));
    }
}
