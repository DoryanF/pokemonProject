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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test/teste', name: 'app_test')]
    public function index(CallApiService $callApiService, JeuxPkmnRepository $jeuxPkmnRepository, PokedexRepository $pokedexRepository, PokemonsRepository $pokemonsRepository): Response
    {
        // set_time_limit(0);
        // $pokedexesBdd = $pokedexRepository->findAll();

        // foreach ($pokedexesBdd as $pokedexBdd) {
        //     $pokemons = $callApiService->getPokemons("https://pokeapi.co/api/v2/pokedex/29/");
        //     foreach ($pokemons as $pokemon) {
        //         $pokemonBdd = $pokemonsRepository->findOneByName($pokemon["name"]);
        //         if ($pokemonBdd instanceof Pokemons) {
        //             $pokemonBdd->addPokedex($pokedexBdd);
        //             $this->getDoctrine()->getManager()->persist($pokemonBdd);
        //             $this->getDoctrine()->getManager()->flush();
        //         }
        //     }
        // }

        return $this->render("test.html.twig");
    }
}
