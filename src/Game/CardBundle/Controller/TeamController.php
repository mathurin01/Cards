<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TeamController extends Controller
{
    /**
     * [indexAction description]
     *
     * @return [type] [description]
     */
    public function indexAction()
    {
        return $this->render('GameCardBundle:Team:index.html.twig');
    }

    /**
     * [showAction description]
     *
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showAction($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $teamRepository = $manager->getRepository('GameCardBundle:Team');

        $games = $manager->getRepository('GameCardBundle:Game')->findAll();
        $teams = $teamRepository->findAll();
        $team  = $teamRepository->findById($id);

        $tabTeam  = [];
        $tabLow   = [];
        $tabOrder = [];
        $tabMain  = [];

        $jj          = 0;
        $totalA      = 0;
        $totalLooseA = 0;
        $totalB      = 0;
        $totalLooseB = 0;
        $nbGame      = 0;
        $nbGameLoose = 0;

        foreach ($teams as $t) {
            foreach ($games as $g) {
                if ($g->getTeamA()->getId() === $t->getId()) {
                    $totalA += $g->getScoreA();
                    if ($g->getScoreA()!= 3000) {
                        $totalLooseA += $g->getScoreA();
                        $nbGameLoose++;
                    }
                    $nbGame ++;
                }

                if ($g->getTeamB()->getId() === $t->getId()) {
                    $totalB += $g->getScoreB();
                    if($g->getScoreB()!= 3000) {
                        $totalLooseB += $g->getScoreB();
                        $nbGameLoose++;
                    }
                    $nbGame++;
                }
            }

            $tabTeam[$t->getId()]['name']          = ($t->getPlayer1()->getFirstname(). ' / ' .$t->getPlayer2()->getFirstname());
            $tabTeam[$t->getId()]['totalPts']      = $totalA + $totalB;
            $tabTeam[$t->getId()]['totalPtsLoose'] = $totalLooseA + $totalLooseB;
            $tabTeam[$t->getId()]['nbGame']        = $nbGame;
            $tabTeam[$t->getId()]['nbGameLoose']   = $nbGameLoose;
            $tabTeam[$t->getId()]['pourcent']      = ($nbGame-$nbGameLoose)*100 / $nbGame;

            $jj++;
            $totalA      = 0;
            $totalB      = 0;
            $totalLooseA = 0;
            $totalLooseB = 0;
            $nbGame      = 0;
            $nbGameLoose = 0;
        }

        $ii = 1;
        foreach ($tabTeam as $tab) {
            $tabLow['totalPts'][$ii]      = array($tab['totalPts'], $tab['name']);
            $tabLow['totalPtsLoose'][$ii] = array($tab['totalPtsLoose'], $tab['name']);
            $tabLow['nbGame'][$ii]        = array($tab['nbGame'], $tab['name']);
            $tabLow['nbGameLoose'][$ii]   = array($tab['nbGameLoose'], $tab['name']);
            $tabLow['pourcent'][$ii]      = array($tab['pourcent'], $tab['name']);
            $ii++;
        }

        $tabMain['totalPts']       = max($tabLow['totalPts']);
        $tabMain['totalPtsLoose']  = max($tabLow['totalPtsLoose']);
        $tabMain['nbGame']         = max($tabLow['nbGame']);
        $tabMain['nbGameLoose']    = max($tabLow['nbGameLoose']);
        $tabMain['pourcent']       = max($tabLow['pourcent']);

        $tabOrder['totalPts']      = arsort($tabLow['totalPts'], SORT_DESC);
        $tabOrder['totalPtsLoose'] = arsort($tabLow['totalPtsLoose'], SORT_DESC);
        $tabOrder['nbGame']        = arsort($tabLow['nbGame'], SORT_DESC);
        $tabOrder['nbGameLoose']   = arsort($tabLow['nbGameLoose'], SORT_DESC);
        $tabOrder['pourcent']      = arsort($tabLow['pourcent'], SORT_DESC);

        return $this->render('GameCardBundle:Team:show.html.twig', [
            'tabMain' => $tabMain,
            'tabTeam' => $tabTeam,
            'tabLow'  => $tabLow,
            'team'    => $team,
        ]);

    }

    /**
     * [menuAction description]
     *
     * @return [type] [description]
     */
    public function menuAction()
    {
        return $this->render('GameCardBundle:Team:menu.html.twig', [
            'teams' => $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Team')->myFindAll(),
        ]);
    }

}
