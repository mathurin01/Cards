<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TeamController extends Controller
{
    public function indexAction()
    {
        $team = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Team')->findAll();

        return $this->render('GameCardBundle:Team:index.html.twig', array('team' => $team));
    }
}
