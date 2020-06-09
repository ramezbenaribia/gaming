<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GamesController extends AbstractController
{
    /**
     * @Route("/games/{name}", name="games")
     */
    public function index(Request $request ,$name)
    {
        return $this->render('games/game.html.twig', [
            'game_name' => $name,
        ]);
    }
}
