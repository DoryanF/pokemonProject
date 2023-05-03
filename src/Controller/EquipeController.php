<?php

namespace App\Controller;

use App\Entity\Equipes;
use App\Form\CreateEquipeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipeController extends AbstractController{

    #[Route('/equipe/creation', name: 'creation_equipe')]
    public function equipe(Request $request): Response
    {
        // $pokemon = $pokemonsRepository->findOneBy(['id' => $id]);

        // $equipes = new Equipes();
        // $equipes->addPkmn1($pokemon);
        // $this->getDoctrine()->getManager()->persist($equipes);
        // $this->getDoctrine()->getManager()->flush();

        $equipes = new Equipes();

        $form = $this->createForm(CreateEquipeType::class, $equipes);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($equipes);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("index");
        }

        return $this->render('equipe.html.twig',[
            'form' => $form->createView()
        ]);
    }
}