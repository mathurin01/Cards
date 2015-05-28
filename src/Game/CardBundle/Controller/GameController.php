<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{
    public function indexAction()
    {
        $lastGame = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->findLast();

        return $this->render('GameCardBundle:Game:index.html.twig', array('lastGame' => $lastGame));
    }
}
