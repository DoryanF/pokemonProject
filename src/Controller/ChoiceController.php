<?php

namespace App\Controller;

use App\Entity\JeuxPkmn;
use App\Entity\Pokedex;
use App\Entity\Pokemons;
use App\Repository\JeuxPkmnRepository;
use App\Repository\PokedexRepository;
use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChoiceController extends AbstractController
{
    #[Route('/{id}', name: 'choice')]
    public function listPokemon($id,JeuxPkmnRepository $jeuxPkmnRepository, CallApiService $callApiService, Pokedex $pokedex, Pokemons $pokemons)
    {
        $jeu = $jeuxPkmnRepository->findOneBy(["id"=>$id]);
        $pokedexJeu = $jeu->getPokedex();
        $pokemonss = $pokedex->getPokemons()->getValues();
        $tabSprite = [];
        foreach ($pokemonss as $pokemon) {
           $tabSprite[] = $callApiService->getSpritePokemons($pokemon->getApiUrl());
        }
        
        $urlVersionGroup = $callApiService->getVersionGroup($jeu->getApiUrl());

        return $this->render('choice.html.twig',[
            "jeux" => $jeuxPkmnRepository->findOneBy(["id"=>$id]),
            "pokemons" => $pokedex->getPokemons()->getValues(),
            "sprites" => $tabSprite
        ]);
    }

}