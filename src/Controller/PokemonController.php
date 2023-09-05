<?php

namespace App\Controller;

use App\Entity\Type;
use App\Repository\PokemonsRepository;
use App\Repository\TypeRepository;
use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Length;

class PokemonController extends AbstractController
{
    #[Route('/pokemon/{id}', name: 'pokemon_details')]
    public function PokemonDetails($id, PokemonsRepository $pokemonsRepository, CallApiService $callApiService, TypeRepository $typeRepository)
    {
        $pkmn = $pokemonsRepository->findOneBy(["id"=>$id]);

        //Récupération des types du pokemon
        $typeResponse = $callApiService->getTypePokemon($pkmn->getApiUrl());

        //création d'un tableau pour stocker les images des types du pkmn
        $imgType = [];
        //Boucle pour récuperer et stocker les images en fonction du type du pkmn
        foreach($typeResponse as $type)
        {
            $img = $typeRepository->findOneBy(["name"=>$type["type"]["name"]]);
            $imgType[] = $img->getImg();
        }


        //Recupération des Attaques du Pokémon dans l'API
        $response = $callApiService->getMovesPokemon($pkmn->getApiUrl());
        //Recupération des Stats du Pokémon dans l'API
        $responseStat = $callApiService->getStatesPokemon($pkmn->getApiUrl());

        $tableauBaseStats = [];
        foreach ($responseStat as $state) {
            $tableauBaseStats[] = $state['base_stat'];
        }


        $abilitiesResponse = $callApiService->getAbilitiesPokemon($pkmn->getApiUrl());

        $tabAbilities = [];

        $tabEffectAbilities = [];
        $i = 0;
        foreach ($abilitiesResponse as $abilities)
        {

            $tabAbilities[$i]["name"] = $abilities["ability"]["name"];
            $tabAbilities[$i]["effect_ability"] = $callApiService->getEffectAbility($abilities["ability"]["url"]);

            $i++;
        }

        // dd($tabAbilities);

        return $this->render('pokemon-details.html.twig',[
            'pokemon' => $pkmn,
            'tabMove' => $response,
            'tabStat' => $tableauBaseStats,
            'type' => $imgType,
            'tabAbilities' => $tabAbilities,
        ]);
    }
}