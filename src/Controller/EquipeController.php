<?php

namespace App\Controller;

use App\Entity\Equipes;
use App\Form\EquipesType;
use App\Repository\EquipesRepository;
use App\Repository\PokemonsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EquipeController extends AbstractController{

    #[Route('/equipe/creation', name: 'creation_equipe')]
    public function equipe(Request $request, PokemonsRepository $pokemonsRepository, EquipesRepository $equipesRepository): Response
    {
        $equipesRepository = $equipesRepository->findAll();


        $equipes = new Equipes();
        $form = $this->createForm(EquipesType::class, $equipes);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            //Récuperation du Pokémon fraichement ajouter dans le formulaire

            $pokemonRepository1 = $pokemonsRepository->findOneBy(['name'=>$equipes->getPokemon1()]);
            $pokemonRepository2 = $pokemonsRepository->findOneBy(['name'=>$equipes->getPokemon2()]);
            $pokemonRepository3 = $pokemonsRepository->findOneBy(['name'=>$equipes->getPokemon3()]);
            $pokemonRepository4 = $pokemonsRepository->findOneBy(['name'=>$equipes->getPokemon4()]);
            $pokemonRepository5 = $pokemonsRepository->findOneBy(['name'=>$equipes->getPokemon5()]);
            $pokemonRepository6 = $pokemonsRepository->findOneBy(['name'=>$equipes->getPokemon6()]);

            
            //Ajout du lien du sprite des pokemons ajouté au formulaire
            $equipes->setPokemon1Sprite($pokemonRepository1->getSprites());
            $equipes->setPokemon2Sprite($pokemonRepository2->getSprites());
            $equipes->setPokemon3Sprite($pokemonRepository3->getSprites());
            $equipes->setPokemon4Sprite($pokemonRepository4->getSprites());
            $equipes->setPokemon5Sprite($pokemonRepository5->getSprites());
            $equipes->setPokemon6Sprite($pokemonRepository6->getSprites());
            
            $this->getDoctrine()->getManager()->persist($equipes);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("liste_equipe");
        }

        return $this->render('equipe.html.twig',[
            'formEquipes' => $form->createView(),
        ]);
    }

    #[Route('/equipe/listEquipes', name: 'liste_equipe')]
    public function listEquipes(EquipesRepository $equipesRepository, PokemonsRepository $pokemonsRepository)
    {
        // dd($equipesRepository->findAll());
        $equipeRepo = $equipesRepository->findAll();

        // dd($equipeRepo);
        // $tableauSprite = [];
        // $i = 1;
        foreach ($equipeRepo as $repo) {
            
            // $pokemonRepo1 = $pokemonsRepository->findOneBy(['name'=>$repo->getPokemon1()]);
            // $tableauSprite[] = $pokemonRepo1;

            // $pokemonRepo2 = $pokemonsRepository->findOneBy(['name'=>$repo->getPokemon2()]);
            // $tableauSprite[] = $pokemonRepo2;
            // $pokemonRepo3 = $pokemonsRepository->findOneBy(['name'=>$repo->getPokemon3()]);
            // $tableauSprite[] = $pokemonRepo3;
            // $pokemonRepo4 = $pokemonsRepository->findOneBy(['name'=>$repo->getPokemon4()]);
            // $tableauSprite[] = $pokemonRepo4;
            // $pokemonRepo5 = $pokemonsRepository->findOneBy(['name'=>$repo->getPokemon5()]);
            // $tableauSprite[] = $pokemonRepo5;
            // $pokemonRepo6 = $pokemonsRepository->findOneBy(['name'=>$repo->getPokemon6()]);
            // $tableauSprite[] = $pokemonRepo6;
            // dd($pokemonRepo3);
            // dd($repo);
        //    dd($pokemonRepo->getSprites());
            
            // return $pokemonRepo;
        }
        // dd($pkmnSprite->getSprites());
        // dd($tableauSprite);
        // dd($equipes);
        // dd($pokemonsRepository->findBy(["name"=>]), $equipesRepository);
        return $this->render('listEquipes.html.twig',[
            "listEquipes" => $equipesRepository->findAll()
        ]);
    }
}