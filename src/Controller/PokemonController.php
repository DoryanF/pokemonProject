<?php

namespace App\Controller;

use App\Entity\Type;
use App\Repository\PokemonsRepository;
use App\Repository\TypeRepository;
use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    #[Route('/pokemon/{id}', name: 'pokemon_details')]
    public function PokemonDetails($id, PokemonsRepository $pokemonsRepository, CallApiService $callApiService, TypeRepository $typeRepository)
    {
        $pkmn = $pokemonsRepository->findOneBy(["id"=>$id]);


        $typeResponse = $callApiService->getTypePokemon($pkmn->getApiUrl());
        // dd($typeRepository->findAll());
        $imgType = [];
        foreach($typeResponse as $type)
        {
            $img = $typeRepository->findOneBy(["name"=>$type["type"]["name"]]);
            $imgType[] = $img->getImg();
        }

        // dd($imgType);

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
            'type' => $imgType
        ]);
    }
}