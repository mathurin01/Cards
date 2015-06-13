<?php

namespace Game\CardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class PlayerController extends Controller
{
    /**
     * [indexAction description]
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function indexAction(Request $request)
    {
        if (!$players = $request->getSession()->get('players')) {
            $players = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findAll();
            $session = $request->getSession();
            $session->set('players', $players);
        }

        return $this->render('GameCardBundle:Player:index.html.twig', [
            'players' => $players
        ]);
    }

    /**
     * [showAction description]
     *
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showAction($id)
    {
        return $this->render('GameCardBundle:Player:show.html.twig', [
            'player' => $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findById($id)
        ]);

    }

    /**
     * [menuAction description]
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function menuAction(Request $request)
    {
        if (!$players = $request->getSession()->get('players')) {
            $players = $this->getDoctrine()->getManager()->getRepository('GameCardBundle:Player')->findAll();
        }

        return $this->render('GameCardBundle:Player:menu.html.twig', [
            'players' => $players
        ]);
    }
}
