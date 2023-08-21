<?php

namespace App\Controller;

use App\Repository\PokemonsRepository;
use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    #[Route('/pokemon/{id}', name: 'pokemon_details')]
    public function PokemonDetails($id, PokemonsRepository $pokemonsRepository, CallApiService $callApiService)
    {
        $pkmn = $pokemonsRepository->findOneBy(["id"=>$id]);
        // dd($pkmn);
        
        //Recupération des Attaques du Pokémon dans l'API
        $response = $callApiService->getMovesPokemon($pkmn->getApiUrl());
        //Recupération des Stats du Pokémon dans l'API
        $responseStat = $callApiService->getStatesPokemon($pkmn->getApiUrl());

        $tableauBaseStats = [];
        foreach ($responseStat as $state) {
            $tableauBaseStats[] = $state['base_stat'];
        }
        // dd($_ENV);
        return $this->render('pokemon-details.html.twig',[
            'pokemon' => $pkmn,
            'tabMove' => $response,
            'tabStat' => $tableauBaseStats,
        ]);
    }
}