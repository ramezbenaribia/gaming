<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Form\PersonneType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    /**
     * @Route("/personne", name="personne")
     */
    public function index()
    {
        return $this->render('personne/index.html.twig', [
            'controller_name' => 'PersonneController',
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/personne/connected/{name}/{firstname}" , name="personne.connected")
     */
    public function ProfilePersonne(Request $request, $name, $firstname) {
        return $this->render('personne/connected.html.twig',[
            'name'=> $name ,
            'firsname'=> $firstname,
        ]);
    }


    /**
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @Route("/personne/login", name="personne.login")
     */
    public function loginPersonne(EntityManagerInterface $manager , Request $request) {
        return $this->render('personne/login.html.twig' );

    }

    /**
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @Route("/personne/signin", name="personne.signin")
     */
    public function addPersonne(EntityManagerInterface $manager, Request $request){
        $personne= new Personne();
        $form=$this->createForm(PersonneType::class, $personne);

        $form->remove('image');
        $form->handleRequest($request) ;
        if ($form->isSubmitted() ){
//            if($form['image']) {
//                $image = $form['image']->getData();
//                dd($image->getClientOriginalName());
//                $imagePath = md5(uniqid()).$image->getClientOriginalName();
//                $destination = __DIR__.'/../../public/assets/uploads';
//                try {
//                    $image->move($destination,$imagePath);
//                    $personne->setPath('assets/uploads/'.$imagePath);
//                } catch (FileException $fe) {
//                    echo $fe;
//                }
//            }

            $manager->persist($personne);
            $manager->flush();
            $name=$personne->getName();
            $firstname=$personne->getFirstname();
            return $this->redirect('/personne/connected/'.$name.'/'.$firstname);
        }
        return $this->render('personne/signin.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/personne/edit/{name}/{firstname}" , name="personne.edit")
     */
    public function EditPersonne(Request $request, $name, $firstname) {
        $personne= new Personne();
        $form=$this->createForm(PersonneType::class, $personne);

        $form->remove('image');
        $form->handleRequest($request) ;
        return $this->render('personne/edit.html.twig',[
            'name'=> $name ,
            'firsname'=> $firstname,
            'form' => $form->createView(),
        ]);
    }

}
