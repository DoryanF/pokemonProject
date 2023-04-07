<?php

namespace App\Controller;

use App\Entity\JeuxPkmn;
use App\Entity\Pokedex;
use App\Entity\Pokemons;
use App\Repository\JeuxPkmnRepository;
use App\Repository\PokedexRepository;
use App\Repository\PokemonsRepository;
use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChoiceController extends AbstractController
{
    #[Route('/{id}', name: 'choice')]
    public function listPokemon($id,JeuxPkmnRepository $jeuxPkmnRepository, CallApiService $callApiService, Pokedex $pokedex, Pokemons $pokemons)
    {
        
        $jeu = $jeuxPkmnRepository->findOneBy(["id"=>$id]);
        // dd($pokedex->getPokemons()->getValues());
        $pokedexJeu = $jeu->getPokedex();

        // dd($pokedexJeu);
        // $pokemonss = $pokedex->getPokemons()->getValues();
        // foreach ($pokemons as $pokemon) {
        //     if($pokemon->getSprites() === null) {
        //         $pokemon->setSprites($callApiService->getSpritePokemons($pokemon->getApiUrl()));
        //         $this->getDoctrine()->getManager()->persist($pokemon);
        //         $this->getDoctrine()->getManager()->flush();
        //     }
        // }
        $urlVersionGroup = $callApiService->getVersionGroup($jeu->getApiUrl());
        $pokedexTest = $callApiService->getPokedex($urlVersionGroup);
        // dd($pokedexTest);
        // dd($urlVersionGroup);

        return $this->render('choice.html.twig',[
            "jeux" => $jeuxPkmnRepository->findOneBy(["id"=>$id]),
            "pokemons" => $pokedex->getPokemons()->getValues(),
        ]);
    }

    // #[Route('/equipe/{id}', name: 'equipe')]
    // public function equipePokemon($id)
    // {
    //      dd('coucou');


    //     return $this->render('equipe.html.twig',[]);
    // }
}