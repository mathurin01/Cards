<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TeamController extends Controller
{
    public function indexAction()
    {
        return $this->render('GameCardBundle:Team:index.html.twig');
    }

    public function showAction($id)
    {
        $team = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Team')->findById($id);
        $nbLoose = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->nbLoose($id);
        $nbGame = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->nbGame($id);
        $nbWin = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->nbWin($id);

        /*
         * A déporter dans une fonction pour effectuer le calcul
         * Voir s'il ne serait pas plus rapide d'avoir les résultats précédents dans cette fonction...
         * $nbPtsLoose = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->nbPtsLoose($id);
         */

        return $this->render('GameCardBundle:Team:show.html.twig', array(
            'team' => $team,
            'nbWin' => $nbWin,
            'nbGame' => $nbGame,
            'nbLoose' => $nbLoose
            /*'nbPtsLoose' => $nbPtsLoose*/
        ));

    }

    public function menuAction()
    {
        $teams = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Team')->findAll();

        return $this->render('GameCardBundle:Team:menu.html.twig', array('teams' => $teams));
    }
}
