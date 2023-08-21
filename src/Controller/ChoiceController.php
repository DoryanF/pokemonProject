<?php

namespace App\Controller;

use App\Entity\JeuxPkmn;
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
    public function listPokemon($id,JeuxPkmnRepository $jeuxPkmnRepository, CallApiService $callApiService)
    {
        
        $jeu = $jeuxPkmnRepository->findOneBy(["id"=>$id]);
        $pokedexJeu = $jeu->getPokedex()->getPokemons()->getValues();

        // dd($pokedexJeu);
        // $pokemonss = $pokedex->getPokemons()->getValues();
        // foreach ($pokemons as $pokemon) {
        //     if($pokemon->getSprites() === null) {
        //         $pokemon->setSprites($callApiService->getSpritePokemons($pokemon->getApiUrl()));
        //         $this->getDoctrine()->getManager()->persist($pokemon);
        //         $this->getDoctrine()->getManager()->flush();
        //     }
        // }
        // dd();

        return $this->render('choice.html.twig',[
            "jeux" => $jeu,
            "pokemons" => $pokedexJeu,
        ]);
    }

}