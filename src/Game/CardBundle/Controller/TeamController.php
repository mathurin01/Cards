<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TeamController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GameCardBundle:Team:index.html.twig', array('name' => $name));
    }
}
