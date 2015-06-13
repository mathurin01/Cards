<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GameController extends Controller
{
    /**
     * [indexAction description]
     *
     * @return [type] [description]
     */
    public function indexAction()
    {
        return $this->render('GameCardBundle:Game:index.html.twig', [
            'lastGame' => $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Game')->findLast(),
        ]);
    }
}
