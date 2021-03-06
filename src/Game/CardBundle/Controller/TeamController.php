<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Game\CardBundle\Entity\Functions;

class TeamController extends Controller
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
        $tabOrder = $this->loadTeamOrder();
        return $this->render('GameCardBundle:Team:index.html.twig', array(
            'tabMain'   => $tabMain,
            'tabTeam'   => $tabTeam,
            'tabLow'    => $tabLow,
            'tabOrder'    => $tabOrder,
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
        $total = array();
        $totalYear = 0;
        $totalYearL = 0;
        $totalYearNb = 0;
        $totalYearNbL = 0;
        $totalA = 0;
        $totalLooseA = 0;
        $totalB = 0;
        $totalLooseB = 0;
        $nbGame = 0;
        $nbGameLoose = 0;
        $year = null;

        foreach($teams as $t)
        {
            foreach($games as $g)
            {
                if($g->getTeamA()->getId() === $t->getId())
                {
                    if($g->getYear() === null){
                        $year = date_format($g->getDate(), 'Y');
                    }
                    if(!$year or $year == 0 or ($year != $g->getYear() and $g->getYear() != null)) {
                        $year = $g->getYear();
                        $totalYear = 0;
                        $totalYearL = 0;
                        $totalYearNb = 0;
                        $totalYearNbL = 0;
                    }

                    $totalYear += $g->getScoreA();
                    $totalA += $g->getScoreA();
                    if($g->getScoreA()!= 3000)
                    {
                        $totalYearL += $g->getScoreA();
                        $totalLooseA += $g->getScoreA();
                        $totalYearNbL++;
                        $nbGameLoose++;
                    }
                    $totalYearNb++;
                    $nbGame ++;
                }

                if($g->getTeamB()->getId() === $t->getId())
                {
                    if($g->getYear() === null){
                        $year = date_format($g->getDate(), 'Y');
                    }
                    if(!$year or $year == 0 or $year != $g->getYear() and $g->getYear() != null) {
                        $year = $g->getYear();

                        $totalYear = 0;
                        $totalYearL = 0;
                        $totalYearNb = 0;
                        $totalYearNbL = 0;
                    }
                    $totalYear += $g->getScoreB();
                    $totalB += $g->getScoreB();
                    if($g->getScoreB()!= 3000)
                    {
                        $totalYearL += $g->getScoreB();
                        $totalLooseB += $g->getScoreB();
                        $totalYearNbL++;
                        $nbGameLoose++;
                    }
                    $totalYearNb++;
                    $nbGame ++;
                }

                if($year){
                    $total[$year][$t->getId()]['score'] = $totalYear;
                    $total[$year][$t->getId()]['loose'] = $totalYearL;
                    $total[$year][$t->getId()]['nbGame'] = $totalYearNb;
                    $total[$year][$t->getId()]['nbGameLoose'] = $totalYearNbL;
                }

            }


            $tabTeam[$t->getId()]['name'] = ($t->getPlayer1()->getFirstname(). ' / ' .$t->getPlayer2()->getFirstname());
            $tabTeam[$t->getId()]['totalPts'] = $totalA + $totalB;
            $tabTeam[$t->getId()]['totalPtsLoose'] = $totalLooseA + $totalLooseB;
            $tabTeam[$t->getId()]['nbGame'] = $nbGame;
            $tabTeam[$t->getId()]['nbGameLoose'] = $nbGameLoose;
            $tabTeam[$t->getId()]['pourcent'] = ($nbGame-$nbGameLoose)*100 / $nbGame;
            $tabTeam[$t->getId()]['id'] = $t->getId();

            $jj++;
            $totalA = 0;
            $totalB = 0;
            $totalLooseA = 0;
            $totalLooseB = 0;
            $nbGame = 1;
            $nbGameLoose = 1;
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
        var_dump($tabLow);

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
        $teams = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Team')->myFindAll();

        return $this->render('GameCardBundle:Team:menu.html.twig', array('teams' => $teams));
    }

}
