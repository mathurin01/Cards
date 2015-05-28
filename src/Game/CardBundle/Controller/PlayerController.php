<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{
    public function indexAction()
    {
        $player = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findAll();

        return $this->render('GameCardBundle:Player:index.html.twig', array('player' => $player));
    }
}
