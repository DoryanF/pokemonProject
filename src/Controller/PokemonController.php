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

        $response = $callApiService->getMovesPokemon($pkmn->getApiUrl());
        

        return $this->render('pokemon-details.html.twig',[
            'pokemon' => $pkmn
        ]);
    }
}