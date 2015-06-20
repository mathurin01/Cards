<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{
    /*public function indexAction()
    {
        $lastGame = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->findLast();

        return $this->render('GameCardBundle:Game:index.html.twig', array('lastGame' => $lastGame));
    }*/
    public $t_Main  = array();
    public $t_Low   = array();
    public $t_Order = array();
    public $t_Team  = array();

    public function indexAction()
    {
        $tabMain = $this->loadTeamMain();
        $tabLow = $this->loadTeamLow();
        $tabTeam = $this->loadTeamTeam();
        $lastGame = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->findLast();

        return $this->render('GameCardBundle:Game:index.html.twig', array(
            'tabMain'   => $tabMain,
            'tabTeam'   => $tabTeam,
            'tabLow'    => $tabLow,
            'lastGame' => $lastGame,
        ));
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

    public function load()
    {
        $games = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->findAll();
        $teams = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Team')->findAll();

        //$team = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Team')->findById($id);

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
        $totalA2012 = 0;
        $totalLooseA2012 = 0;
        $totalB2012 = 0;
        $totalLooseB2012 = 0;
        $nbGame2012 = 0;
        $nbGameLoose2012 = 0;
        $totalA2013 = 0;
        $totalLooseA2013 = 0;
        $totalB2013 = 0;
        $totalLooseB2013 = 0;
        $nbGame2013 = 0;
        $nbGameLoose2013 = 0;
        $totalA2014 = 0;
        $totalLooseA2014 = 0;
        $totalB2014 = 0;
        $totalLooseB2014 = 0;
        $nbGame2014 = 0;
        $nbGameLoose2014 = 0;
        $totalA2015 = 0;
        $totalLooseA2015 = 0;
        $totalB2015 = 0;
        $totalLooseB2015 = 0;
        $nbGame2015 = 0;
        $nbGameLoose2015 = 0;

        foreach($teams as $t)
        {
            foreach($games as $g)
            {
                if($g->getTeamA()->getId() === $t->getId())
                {
                    $totalA += $g->getScoreA();
                    if($g->getScoreA()!= 3000)
                    {
                        $totalLooseA += $g->getScoreA();
                        $nbGameLoose++;
                    }
                    $nbGame ++;
                }

                if($g->getTeamB()->getId() === $t->getId())
                {
                    $totalB += $g->getScoreB();
                    if($g->getScoreB()!= 3000)
                    {
                        $totalLooseB += $g->getScoreB();
                        $nbGameLoose++;
                    }
                    $nbGame++;
                }
                if($g->getYear() == '2012')
                {
                    if($g->getTeamA()->getId() === $t->getId())
                    {
                        $totalA2012 += $g->getScoreA();
                        if($g->getScoreA()!= 3000)
                        {
                            $totalLooseA2012 += $g->getScoreA();
                            $nbGameLoose2012++;
                        }
                        $nbGame2012 ++;
                    }

                    if($g->getTeamB()->getId() === $t->getId())
                    {
                        $totalB2012 += $g->getScoreB();
                        if($g->getScoreB()!= 3000)
                        {
                            $totalLooseB2012 += $g->getScoreB();
                            $nbGameLoose2012++;
                        }
                        $nbGame2012++;
                    }
                }
                if($g->getYear() == '2013')
                {
                    if($g->getTeamA()->getId() === $t->getId())
                    {
                        $totalA2013 += $g->getScoreA();
                        if($g->getScoreA()!= 3000)
                        {
                            $totalLooseA2013 += $g->getScoreA();
                            $nbGameLoose2013++;
                        }
                        $nbGame2013 ++;
                    }

                    if($g->getTeamB()->getId() === $t->getId())
                    {
                        $totalB2013 += $g->getScoreB();
                        if($g->getScoreB()!= 3000)
                        {
                            $totalLooseB2013 += $g->getScoreB();
                            $nbGameLoose2013++;
                        }
                        $nbGame2013++;
                    }
                }
                if($g->getYear() == '2014')
                {
                    if($g->getTeamA()->getId() === $t->getId())
                    {
                        $totalA2014 += $g->getScoreA();
                        if($g->getScoreA()!= 3000)
                        {
                            $totalLooseA2014 += $g->getScoreA();
                            $nbGameLoose2014++;
                        }
                        $nbGame2014 ++;
                    }

                    if($g->getTeamB()->getId() === $t->getId())
                    {
                        $totalB2014 += $g->getScoreB();
                        if($g->getScoreB()!= 3000)
                        {
                            $totalLooseB2014 += $g->getScoreB();
                            $nbGameLoose2014++;
                        }
                        $nbGame2014++;
                    }
                }
                if($g->getYear() == '2015')
                {
                    if($g->getTeamA()->getId() === $t->getId())
                    {
                        $totalA2015 += $g->getScoreA();
                        if($g->getScoreA()!= 3000)
                        {
                            $totalLooseA2015 += $g->getScoreA();
                            $nbGameLoose2015++;
                        }
                        $nbGame2015 ++;
                    }

                    if($g->getTeamB()->getId() === $t->getId())
                    {
                        $totalB2015 += $g->getScoreB();
                        if($g->getScoreB()!= 3000)
                        {
                            $totalLooseB2015 += $g->getScoreB();
                            $nbGameLoose2015++;
                        }
                        $nbGame2015++;
                    }
                }
            }
            $tabTeam[$t->getId()]['name'] = ($t->getPlayer1()->getFirstname(). ' / ' .$t->getPlayer2()->getFirstname());
            $tabTeam[$t->getId()]['totalPts'] = $totalA + $totalB;
            $tabTeam[$t->getId()]['totalPtsLoose'] = $totalLooseA + $totalLooseB;
            $tabTeam[$t->getId()]['nbGame'] = $nbGame;
            $tabTeam[$t->getId()]['nbGameLoose'] = $nbGameLoose;
            $tabTeam[$t->getId()]['pourcent'] = ($nbGame-$nbGameLoose)*100 / $nbGame;
            $tabTeam[$t->getId()]['id'] = $t->getId();

            $tabTeam[$t->getId()]['2012']['name'] = ($t->getPlayer1()->getFirstname(). ' / ' .$t->getPlayer2()->getFirstname());
            $tabTeam[$t->getId()]['2012']['totalPts'] = $totalA + $totalB;
            $tabTeam[$t->getId()]['2012']['totalPtsLoose'] = $totalLooseA + $totalLooseB;
            $tabTeam[$t->getId()]['2012']['nbGame'] = $nbGame;
            $tabTeam[$t->getId()]['2012']['nbGameLoose'] = $nbGameLoose;
            $tabTeam[$t->getId()]['2012']['pourcent'] = ($nbGame-$nbGameLoose)*100 / $nbGame;
            $tabTeam[$t->getId()]['2012']['id'] = $t->getId();

            $tabTeam[$t->getId()]['2013']['name'] = ($t->getPlayer1()->getFirstname(). ' / ' .$t->getPlayer2()->getFirstname());
            $tabTeam[$t->getId()]['2013']['totalPts'] = $totalA + $totalB;
            $tabTeam[$t->getId()]['2013']['totalPtsLoose'] = $totalLooseA + $totalLooseB;
            $tabTeam[$t->getId()]['2013']['nbGame'] = $nbGame;
            $tabTeam[$t->getId()]['2013']['nbGameLoose'] = $nbGameLoose;
            $tabTeam[$t->getId()]['2013']['pourcent'] = ($nbGame-$nbGameLoose)*100 / $nbGame;
            $tabTeam[$t->getId()]['2013']['id'] = $t->getId();

            $tabTeam[$t->getId()]['2014']['name'] = ($t->getPlayer1()->getFirstname(). ' / ' .$t->getPlayer2()->getFirstname());
            $tabTeam[$t->getId()]['2014']['totalPts'] = $totalA + $totalB;
            $tabTeam[$t->getId()]['2014']['totalPtsLoose'] = $totalLooseA + $totalLooseB;
            $tabTeam[$t->getId()]['2014']['nbGame'] = $nbGame;
            $tabTeam[$t->getId()]['2014']['nbGameLoose'] = $nbGameLoose;
            $tabTeam[$t->getId()]['2014']['pourcent'] = ($nbGame-$nbGameLoose)*100 / $nbGame;
            $tabTeam[$t->getId()]['2014']['id'] = $t->getId();

            $tabTeam[$t->getId()]['2015']['name'] = ($t->getPlayer1()->getFirstname(). ' / ' .$t->getPlayer2()->getFirstname());
            $tabTeam[$t->getId()]['2015']['totalPts'] = $totalA + $totalB;
            $tabTeam[$t->getId()]['2015']['totalPtsLoose'] = $totalLooseA + $totalLooseB;
            $tabTeam[$t->getId()]['2015']['nbGame'] = $nbGame;
            $tabTeam[$t->getId()]['2015']['nbGameLoose'] = $nbGameLoose;
            $tabTeam[$t->getId()]['2015']['pourcent'] = ($nbGame-$nbGameLoose)*100 / $nbGame;
            $tabTeam[$t->getId()]['2015']['id'] = $t->getId();

            $jj++;
            $totalA = 0;
            $totalB = 0;
            $totalLooseA = 0;
            $totalLooseB = 0;
            $nbGame = 0;
            $nbGameLoose = 0;
            $totalA2012 = 0;
            $totalB2012 = 0;
            $totalLooseA2012 = 0;
            $totalLooseB2012 = 0;
            $nbGame2012 = 0;
            $nbGameLoose2012 = 0;
            $totalA2013 = 0;
            $totalB2013 = 0;
            $totalLooseA2013 = 0;
            $totalLooseB2013 = 0;
            $nbGame2013 = 0;
            $nbGameLoose2013 = 0;
            $totalA2014 = 0;
            $totalB2014 = 0;
            $totalLooseA2014 = 0;
            $totalLooseB2014 = 0;
            $nbGame2014 = 0;
            $nbGameLoose2014 = 0;
            $totalA2015 = 0;
            $totalB2015 = 0;
            $totalLooseA2015 = 0;
            $totalLooseB2015 = 0;
            $nbGame2015 = 0;
            $nbGameLoose2015 = 0;
        }

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
}
