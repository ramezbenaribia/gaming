<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class JeuBriquesController extends AbstractController
{
    /**
     * @Route("/jeu/briques", name="jeu_briques")
     */
    public function index()
    {
        return $this->render('jeu_briques/brique.html.twig', [
            'controller_name' => 'JeuBriquesController',
        ]);
    }
}
