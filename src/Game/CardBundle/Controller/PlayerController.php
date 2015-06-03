<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{
    public function indexAction()
    {
        if(!$players = $this->getRequest()->getSession()->get('players')){
            $players = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findAll();
            $session = $this->getRequest()->getSession();
            $session->set('players', $players);
        }

        return $this->render('GameCardBundle:Player:index.html.twig', array('players' => $players));
    }

    public function showAction($id)
    {
        $player = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findById($id);

        return $this->render('GameCardBundle:Player:show.html.twig', array('player' => $player));

    }

    public function menuAction()
    {
        $players = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findAll();

        return $this->render('GameCardBundle:Player:menu.html.twig', array('players' => $players));
    }
}
