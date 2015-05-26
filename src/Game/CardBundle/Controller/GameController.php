<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GameCardBundle:Game:index.html.twig', array('name' => $name));
    }
}
