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
     * @todo : $teamsStatistics must be in index and $teamStatistic in this controller. So the show view must be expurged and the index view completed
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showAction($id)
    {
        $teamsStatistics = $this->get('manager.statistic')->getTeamsStatistics();

        return $this->render('GameCardBundle:Team:show.html.twig', [
            'tabMain' => $teamsStatistics['tabMain'],
            'tabTeam' => $teamsStatistics['tabTeam'],
            'tabLow'  => $teamsStatistics['tabLow'],
            'team'    => $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Team')->findById($id),
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
            'teams' => $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Team')->findAll(),
        ]);
    }
}
