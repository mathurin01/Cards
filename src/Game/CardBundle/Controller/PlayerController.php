<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GameCardBundle:Player:index.html.twig', array('name' => $name));
    }
}
