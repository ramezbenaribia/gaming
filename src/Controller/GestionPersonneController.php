<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GestionPersonneController extends AbstractController
{
    /**
     * @Route("/admin/gestion/personne", name="gestion_personne")
     */
    public function index()
    {
        return $this->render('Admin/gestion_personne.html.twig', [
            'controller_name' => 'GestionPersonneController',
        ]);
    }
}
