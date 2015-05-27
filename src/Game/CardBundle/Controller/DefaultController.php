<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Game\CardBundle\Entity\Game;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $lastGame = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->findLast();

        return $this->render('GameCardBundle:Default:index.html.twig', array('lastGame' => $lastGame));
    }
}
