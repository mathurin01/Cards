<?php

namespace Game\CardBundle\Manager;

use Doctrine\ORM\EntityManager;

/**
 * Gestion des calculs statistiques des parties, équipes, etc.
 */
class StatisticManager
{
    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Get teams stats
     *
     * @todo: serious refactor in 3 or 4 sub-methods for each "tab" type
     * @todo: rename $tab... vars. We clearly understand that's an array by looking at it ! Maybe topTeam, teamPodium, etc.
     * @todo: unused $tabOrder !
     *
     * @return array
     */
    public function getTeamsStatistics()
    {
        // init vars
        $tabTeam = $tabLow = $tabOrder = $tabMain = [];
        $jj = $totalA = $totalLooseA = $totalB = $totalLooseB = $nbGame = $nbGameLoose = 0;

        $games = $this->findAllGames();
        $teams = $this->findAllTeams();

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

            $tabTeam[$t->getId()]['name']          = ($t->getPlayer1()->getFirstname(). ' & ' .$t->getPlayer2()->getFirstname());
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

        // @todo: unused $tabOrder !
        $tabOrder['totalPts']      = arsort($tabLow['totalPts'], SORT_DESC);
        $tabOrder['totalPtsLoose'] = arsort($tabLow['totalPtsLoose'], SORT_DESC);
        $tabOrder['nbGame']        = arsort($tabLow['nbGame'], SORT_DESC);
        $tabOrder['nbGameLoose']   = arsort($tabLow['nbGameLoose'], SORT_DESC);
        $tabOrder['pourcent']      = arsort($tabLow['pourcent'], SORT_DESC);

        return [
            'tabLow'   => $tabLow,
            'tabOrder' => $tabOrder,
            'tabMain'  => $tabMain,
            'tabTeam'  => $tabTeam,
        ];
    }

    /**
     * {@inheritDoc}
     */
    protected function findAllGames()
    {
        return $this->em->getRepository('GameCardBundle:Game')->findAll();
    }

    /**
     * {@inheritDoc}
     */
    protected function findAllTeams()
    {
        return $this->em->getRepository('GameCardBundle:Team')->findAll();
    }
}
