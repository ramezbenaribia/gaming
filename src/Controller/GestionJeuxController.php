<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Game;
use App\Form\GameType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GestionJeuxController
 * @package App\Controller
 * @Route("admin/gestion/jeux")
 */
class GestionJeuxController extends AbstractController
{
    /**
     * @Route("", name="gestion_jeux")
     */
    public function index(Request $request)
    {$page=$request->query->get('page') ?? 1;
    $repository = $this ->getDoctrine()->getRepository(Game::class);
    $nbEnregistrements = $repository ->count(array());
    $nbpage=($nbEnregistrements%10)?(intdiv($nbEnregistrements,10))+1:(intdiv($nbEnregistrements,10));
    $games=$repository->findBy( array(), ['id'=>'asc'], 10, ($page-1)*10);
        return $this->render('Admin/gestion_jeux.html.twig', [
            'controller_name' => 'GestionJeuxController',
            'games'=>$games,
            'nbpage'=>$nbpage
        ]);
    }

    /**
     * @param EntityManagerInterface $manager
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/add", name="game.add")
     */
    public function addGame(EntityManagerInterface $manager, Request $request){
        $game= new Game();
        $form_game = $this->createForm(GameType::class, $game);
        $form_game->handleRequest($request);

        if ($form_game->isSubmitted()) {
            $manager->persist($game);
            $manager->flush();
        }
        return $this->render('Admin/form_game.html.twig', array(
            'form_game' => $form_game->createView()
        ));
    }


    /**
     * @param $id
     * @Route("/delete/{id}", name="game.delete")
     */
    public function deleteGame($id){
$repository=$this->getDoctrine()->getRepository(Game::class);
$game=$repository->find($id);
if(!$game){
    $this->addFlash('error', 'Suppression échouée, jeu inexistant');
}
else{
    $manager=$this->getDoctrine()->getManager();
    $manager->remove($game);
    $manager->flush();
    $this->addFlash('success', 'Jeu supprimé avec succés');
}
return $this->redirectToRoute('gestion_jeux');
    }
}

